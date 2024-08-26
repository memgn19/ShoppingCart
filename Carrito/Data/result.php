<?php
require('conexion.inc');
include '../Clases/Customer.php';

// @session_start(); quitado porque siempre salta warning. En caso de error de session quitar comentario

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($username, $password)) {
        $query = "SELECT * FROM customers WHERE name ='".$username."'";
        $sqlResponse = mysqli_query($conn, $query , $sqlResponse = MYSQLI_STORE_RESULT) or die('Username not found');
        $customer = mysqli_fetch_assoc($sqlResponse);
        if (empty($customer)){
            $msj = "Username or password doesn't exist.";
            header("Location:../views/index.php?message= " . $msj);
            die();
        }
        else if($password == $customer['password']){ 

            $_SESSION['customer'] = $customer;

            header("Location:../views/index.php");
            die();
        }
    }
    else{
        $msj = "Username or password is empty";
        header("Location:../views/index.php?message=" . urlencode($msj));
        die();
    }

    mysqli_close($conn);
    $msj = "Username or password is empty";
    header("Location:../views/index.php?message=" . urlencode($msj));
    die();
}
