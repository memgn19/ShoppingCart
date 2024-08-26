<?php
include 'conexion.inc';
include '../Clases/Product.php';

switch ($_POST['action']) {
    case 'insert':
        foreach ($_POST as $item) {
            if (!isset($item) || empty($item)) {
                header('Location: ../views/index.php');
                die();
            }
        }

        $nameProduct = $_POST['nameProduct'];
        $price = $_POST['price'];
        $tmp_foto = $_FILES['foto']['tmp_name'];
        $description = $_POST['description'];

        //file handling
        if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
            $directoryname = "imgs/";

            $idUnique = time();

            $filename = $idUnique . "-" . $_FILES['foto']['name'];

            $file_extension = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));

            $allowed_extension = array("jpeg", "jpg", "png");

            if (in_array($file_extension, $allowed_extension)) {
                move_uploaded_file($_FILES['foto']['tmp_name'], $directoryname . $filename);
            }
        } else {
            header('Location:../views/index.php');
            die();
        }

        $url = $directoryname . $filename;

        // mysqli_query($conn , "INSERT INTO products VALUES ('$nameProduct', '$price', '$filename', '$description')") or die('Ha habido un problema');

        $pdo = new PDO("mysql:host=$host;dbname=$nombreDB;charset=utf8", $usuario, $password);
        
        $_SESSION['producto'] = $producto;

        $insertion = $pdo->prepare("INSERT INTO products(name, price, foto, description)" . "VALUES(:name, :price, :foto, :description)");
        $insertion->bindParam(':name', $nameProduct);
        $insertion->bindParam(':price', $price);
        $insertion->bindParam(':foto', $url);
        $insertion->bindParam(':description', $description);
        $insertion->execute() or die('Algo ha salido mal');

        mysqli_close($conn);

        header("Location:../views/index.php");
        die();
        break;

    case 'delete':
        //Para eliminar los productos del carrito
        if (isset($_POST['action'])) {
            //delete from databsae
            $did = $_POST['id'];
            $queryDelete = "DELETE FROM products WHERE idProduct=" . $did;
            $result = mysqli_query($conn, $queryDelete);

            //delete image
            unlink($_POST['foto']);

            if ($result) {
                mysqli_close($conn);
                header("Location:../views/index.php");
                die();
            } else {
                echo "<h3 class='text-danger'>Error deleting record</h3>";
            }
        } else {
            header("Location:../views/index.php");
            die();
        }
        break;

    case 'update':
        echo 'aun no esta jeje';
        break;

    default:
        return false;
        break;
}
