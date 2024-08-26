<?php
    $host = "localhost";
    $nombreDB = "carrito";
    $usuario = "root";
    $password = "";

    $conn = mysqli_connect($host, $usuario, $password, $nombreDB);
        if (!$conn) {
            header("Location:../views/index.php");
            die("Connection failed: " . mysqli_connect_error());
        }
?>