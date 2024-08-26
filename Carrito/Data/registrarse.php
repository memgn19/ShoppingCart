<?php
include 'conexion.inc';
include '../Clases/Customer.php';
@session_start();

if(!isset($_POST['username'], $_POST['email'], $_POST['phone'], $_POST['password'])){
    header('Location: ../views/index.php');
    die();
}

$name = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$passwords = $_POST['password'];

$insertion = mysqli_prepare($conn, "INSERT INTO customers(name, email, phone, password) VALUES(?, ?, ?, ?)");
mysqli_stmt_bind_param($insertion, 'ssss', $name, $email, $phone, $passwords);
mysqli_stmt_execute($insertion) or die('Something went wrong: ' . mysqli_error($conn));
mysqli_stmt_close($insertion);

$id = mysqli_prepare($conn, "SELECT customerId FROM `customers` ORDER BY customerId DESC LIMIT 1");
mysqli_stmt_execute($id) or die('Something went wrong: ' . mysqli_error($conn));
$result = mysqli_stmt_get_result($id);
$row = mysqli_fetch_assoc($result);
mysqli_stmt_close($id);

mysqli_close($conn);

$customer = [
    'id' => $row['customerId'],
    'name' => $name, 
    'email' => $email, 
    'phone' => $phone, 
    'password' => $passwords
];

$_SESSION['customer'] = $customer;
header("Refresh: 0.1; url=../views/index.php");
die();
