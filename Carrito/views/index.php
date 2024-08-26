<?php
require '../Data/conexion.inc';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<!-- Inicio head  -->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles2.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <!-- icons -->
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
    <svg id="out" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
      <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
    </svg>
    <title>Shop</title>
</head>
<!-- Final head  -->
<body>
  <header>
    <!-- Inicio de navbar-->
    <div class="py-2 text-bg-dark border-bottom border-dark">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a href="index.php" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
            <img src="imgs/logo.png" alt="logo" height="100">
          </a>
          <div class="d-flex justify-content-start">
          <h1 class="me-5">ONLINE SHOP</h1>
          </div>
          <ul id="header" class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
            <li>
              <a href="index.php" class="nav-link text-white pt-4">
                <svg class="bi d-block mx-auto mb-2" width="24" height="24">
                  <use xlink:href="#grid"></use>
                </svg>
                Products
              </a>
            </li>
            <li>
              <a href="carrito.php" class="nav-link text-secondary pt-4">
                <svg class="bi d-block mx-auto mb-2" width="24" height="24">
                  <use xlink:href="#cart"></use>
                </svg>
                Cart
              </a>
            </li>
            <li>
              <a href="" class="nav-link text-secondary pt-4">
                <svg class="bi d-block mx-auto mb-2" width="24" height="24">
                  <use xlink:href="#people-circle"></use>
                </svg>
                  <?php
                    if (@ $_POST['action'] == 'sessionDestroy') {
                      session_unset(); 
                      session_destroy(); 
                    }
                    echo isset($_SESSION['customer']['name']) ? $_SESSION['customer']['name'] : 'user';
                  ?>
              </a>
            </li>
            <li>
              <form action="" method="post">
                <button class="btn btn-outline-dark" type="submit" name="action" value="sessionDestroy">
                  <a class="nav-link text-secondary mb-1">
                    <svg id="out_icon" class="bi d-block mx-auto m-2" width="24" height="24">
                      <use class="pb-1 mb-1" xlink:href="#out"></use>
                    </svg>Out   
                  </a> 
                </button>
              </form>
              
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Final nav bar  -->
    <!-- Inicio buttons  -->
    <div class="px-3 py-2 border-bottom mb-3 bg-dark">
      <div class="container d-flex flex-wrap justify-content-center position-relative">
        <!-- Vista parcial de form login  -->
        <div class="position-fixed mx-auto" id="include">
          <?php include_once('login.html') ?>
        </div>
        <!-- Vista parcial form registrar  -->
        <div class="position-fixed mx-auto" id="include2">
          <?php include_once('registrar.html') ?>
        </div>
        <!-- Vista parcial form product  -->
        <div class="position-fixed mx-auto" id="include3">
          <?php include_once('formProducto.html') ?>
        </div>
        <!-- Inicio Form Search  -->
        <form class="col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto" role="search">
          <input type="search" name="search" class="form-control ms-3" placeholder="Search..." aria-label="Search" value="<?php if (isset($_GET['search'])) {
                                                                                                                            echo $_GET['search'];
                                                                                                                          } ?>">
        </form>
        <!-- Finalización form Search  -->
        <div class="text-end">
          <!-- Botones desplegable  -->
          <!-- Inicio boton añadir producto provisional obviusly   -->
          <button id="add" onclick="desplegarProduct()" class="btn btn-light ms-2 rounded-2">Add new product</button>
          <button type="button" id="button2" onclick="desplegarRegistrar()" class="btn btn-light">Sign-up</button>
          <button type="button" id="button1" onclick="desplegar()" class="btn btn-outline-light  me-2">Login</button>
          <!-- Fin de botones desplegables  -->
        </div>
      </div>
    </div>
    <!-- Final buttons  -->
  </header>
  <main class="min-vh-100">
    <?php
    
    if (isset($_GET['message'])) {
      $msj = urldecode($_GET['message']);
      echo "<h5 class='text-danger text-center'>" . $msj . "</h5>";
    }
    
    ?>
    <div id="products" class="album py-5 bg-body-tertiary">
      <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          <?php

          //VISUALIZAR LOS PRODUCTOS DEL CARRITO
          mysqli_init();
          $query = "SELECT * FROM products";

          //Buscador de productos
          if (isset($_GET['search'])) {
            $filtervalues = trim($_GET['search']);

            $query = "SELECT * FROM products WHERE name LIKE '%" . $filtervalues . "%'";
            $query_run = mysqli_query($conn, $query);
            $num = mysqli_num_rows($query_run);

            if ($num == 0) {
              echo "<div class='text-danger'>No se encontraron resultados</div>";
              die();
            }
          }

          $product_array =  mysqli_query($conn, $query) or die(mysqli_error($conn));
          while ($row = mysqli_fetch_array($product_array)) {
          ?>
              <div class="col">
                <div class="card shadow-sm ms-2">
                  <img src='<?= '../Data/' . $row['foto']; ?>' alt='product image' width='100%' height='225'>
                  <div class="card-body">
                    <h3 class="class-text text-center"><?php echo $row["name"]; ?></h3>
                    <p class="class-text"><?php echo $row["price"] . " €";  ?></p>
                    <p class="card-text"><?php echo $row["description"]; ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <form class="prod" action="" method='POST'>
                          <input type="hidden" name="id" value="<?= $row['idProduct'] ?>">
                          <input type="hidden" name="foto" value="<?= $row['foto'] ?>">
                          <input type="hidden" name="name" value="<?= $row['name'] ?>">
                          <input type="hidden" name="price" value="<?= $row['price'] ?>">
                          <input type="hidden" name="description" value="<?= $row['description'] ?>">
                          <input type="hidden" name="action" value="add">
                          <button type="submit" class="btn btn-sm btn-outline-dark"><i class="bi bi-cart-plus-fill "></i> Add</button>
                        </form>
                      </div>

                    
                    <!-- Inicio boton ELIMINAR  -->
                    <button type="button" class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $row['idProduct']; ?>">Delete</button>
                    <!-- Button trigger modal -->
                    <div class="modal" id="exampleModal_<?php echo $row['idProduct']; ?>" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-body text-center">
                            Are you sure you want to delete this product?
                          </div>
                          <div class="modal-footer">
                            <form action="../Data/actionProduct.php" method='POST'>
                              <input type="hidden" name="id" value="<?= $row['idProduct'] ?>">
                              <input type="hidden" name="foto" value="<?= $row['foto'] ?>">
                              <button class="btn btn-sm btn-outline-dark" type="submit" value='delete' name='action'>Delete</button>
                            </form>
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- FIN BOTON ELIMINAR  -->
                  </div>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </main>
  
  <footer class="pd-flex min-vh-50 mt-auto justify-content-end align-items-end py-4 border-dark border-5 bg-dark bg-gradient">
    <div class="d-flex justify-content-center">
    <ul class="nav col-md-4 justify-content-center">
      <li class="nav-item"><a href="#" class="nav-link text-end text-white-50">Elena Moreno</a></li>
    </ul>
    </div>
  </footer>

  <script src="JS/script.js"></script>
  <!-- ajax_script -->
  <script src="JS/ajaxCart.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>