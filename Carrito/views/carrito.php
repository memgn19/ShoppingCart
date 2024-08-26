<!DOCTYPE html>
<html lang="en">
<?php include '../Data/conexion.inc';
session_start(); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link rel="stylesheet" href="css/styles2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- iconos -->
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="bootstrap" viewBox="0 0 118 94">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z"></path>
        </symbol>
        <symbol id="home" viewBox="0 0 16 16" style="color: white;">
            <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"></path>
        </symbol>
        <symbol id="people-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"></path>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"></path>
        </symbol>
        <symbol id="grid" viewBox="0 0 16 16">
            <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"></path>
        </symbol>
        <svg id="cart" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
    </svg>
    <!-- ajax -->
    <script src="JS/ajaxCart.js"></script>
        <title>Shopping Cart</title>
</head>

<body>
    <!-- Inicio de navbar-->
    <div class="px-3 py-2 text-bg-dark border-bottom border-dark">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="index.php" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                    <img src="imgs/logo.png" alt="logo" height="100">
                </a>
                <h1 class="text-start me-5">Shopping Cart</h1>
                <ul id="header" class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                    <li>
                        <a href="index.php" class="nav-link text-secondary">
                            <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                                <use xlink:href="#grid"></use>
                            </svg>
                            Products
                        </a>
                    </li>
                    <li>
                        <a href="carrito.php" class="nav-link text-white">
                            <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                                <use xlink:href="#cart"></use>
                            </svg>
                            Cart
                        </a>
                    </li>
                    <li>
                        <a href="" class="nav-link text-secondary">
                            <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                                <use xlink:href="#people-circle"></use>
                            </svg>
                            <?php echo isset($_SESSION['customer']['name']) ? $_SESSION['customer']['name'] : 'user'; ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Final nav bar  -->
    <h2 class="m-4">Shopping cart</h2>
    <?php


    /*  if (empty($_SESSION['customer'])) {
        $msj = "Para acceder al carrito tienes que estar registrado.";
        header("Location:products.php?message=" . $msj);
    }
*/
    //echo "<h1> Hola " . $_SESSION['customer']['name'] . "</h1>";


    ?>
    <!-- Inicio PRODUCTOS  -->
    <div class="my-3 p-3 bg-body rounded shadow-sm m-5" id="cart_product">
        <!-- A partir de este se borra cuando se haga el foreach  -->
        <?php
            if(isset($_SESSION['cart'])){
                foreach ($_SESSION['cart'] as $columns){
                    if(is_int($columns) or is_float($columns)){
                        continue;
                    }
                    ?>
                        <div id="<?='prod' . $columns['id']?>" class="d-flex text-body-secondary pt-3">
                            <img src="<?='../Data/' . $columns['img'] ?>" alt='product image' width='80' height='80' class="bd-placeholder-img flex-shrink-0 me-2 mt-2 rounded">
                            <div class="pb-2 mb-0 lh-sm border-bottom w-100">
                                <div class="d-flex justify-content-between">
                                    <strong class="text-dark fs-3"><?= $columns['name'] ?></strong>
                                    <p class="fs-5 mt-1"><?= $columns['price'] ?></p>
                                </div>
                                <div class="btn-group float-start ">
                                    <form action="" method="POST" class="add_substract">
                                        <button id="<?= $columns['id']?>" value="add" class="btn btn-dark me-2 rounded-5 plus">+</button>
                                        <button id="<?= $columns['id']?>" value="delete" class="btn btn-dark ms-1 rounded-5 pe-3 ps-3 subtract">-</button>
                                    </form>
                                </div>
                                <div class="d-flex pt-4 mt-5 fs-4 justify-content-between">
                                    <p id="<?='qty' . $columns['id']?>" class="qty"><?= $columns['qty'] ?></p>
                                    <p id="<?='sub' . $columns['id']?>" class="subtotal" class="fs-5 mt-1"><?= $columns['subtotal'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php
                }
            }
        ?>
        
    </div>
    <?php
        //Para eliminar los productos del carrito
        if (isset($_GET['delete'])) {
            echo $did = $_GET['id'];
            $queryDelete = "DELETE FROM order_items WHERE id=" . $did;
            $result = mysqli_query($conn, $queryDelete);

            if ($result) {
                mysqli_close($conn);
                header("location:carrito.php");
                die();
            } else {
                echo "<h3 class='text-danger'>Error deleting record</h3>";
            }
        }

        //VISUALIZAR LOS PRODUCTOS DEL CARRITO
        /*    $query = "SELECT * FROM order_items";
                $product_array =  $conn->query($query);
                if (!empty($product_array)) {
                    foreach ($product_array as $row) {
                ?>
                <!-- Continuación producto del carro -->
                        <!-- <div class="d-flex text-body-secondary pt-3">
                        <img src='<?php echo '../Data/' . $row['foto']; ?>' alt='product image' width='50' height='50' class="bd-placeholder-img flex-shrink-0 me-2 rounded">
                            <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                                <div class="d-flex justify-content-between">
                                    <strong class="text-gray-dark">Name<?php echo $row['name'] ?></strong>
                                    <p>Precio<?php echo $row['price'] ?></p>
                                </div>
                                <span class="d-block">Cantidad<?php echo $row['quantity'] ?></span>
                            </div> -->
                    <?php
                    }
                }
                */ 
    ?>
    <!-- DIVS de cerrado de las de arriba </div>
    </div> -->


    <div class="container float-end">
        <div class="float-end text-end my-5 me-5">
            <p class="fs-3">Total</p>
            <p id="total"><?= !empty($_SESSION['cart']['total'])? $_SESSION['cart']['total'] . ' €' : 0 ?></p>
            <hr>
            <div class="btn-group">
                <button name="action" id="pay" value="Complete Purchase" type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#complete">Complete Purchase </button>
                 <!-- Button trigger modal -->
                    <div class="modal" id="complete" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-body text-center">
                           Your purchase has been completed! Thanks! 💗
                          <div class="modal-footer">               
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Ok</button>
                          </div>
                        </div>
                      </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="JS/ajaxCart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>