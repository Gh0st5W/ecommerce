<?php
  session_start();

  /* Importamos los datos de conexión */
  require './lib/db.php';
  require './lib/database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/private.css">
    <title>Private Menu</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">





  </head>
  <body>

    <!-- CABECERA -->

    <?php
        include_once('header.php');
    ?>  
  

    <div class="clearfix"></div>

    <!-- CUERPO -->         
<!-- Page Content -->
<div id="content" class="bg-grey w-100">

<section class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8">
              <h1 class="font-weight-bold mb-0">Welcome User</h1>
              <p class="lead text-muted">Revisa la última información</p>
            </div>
            <div class="col-lg-3 col-md-4 d-flex">
              <button class="btn btn-primary w-100 align-self-center">Descargar reporte</button>
            </div>
        </div>
    </div>
</section>

<section class="bg-mix py-3">
  <div class="container">
      <div class="card rounded-0">
          <div class="card-body">
              <div class="row">
                  <div class="col-lg-3 col-md-6 d-flex stat my-3">
                      <div class="mx-auto">
                          <h6 class="text-muted">Ver último pedido</h6>
                          <h3 class="font-weight-bold">364 €</h3>
                          <h6 class="text-success"><i class="icon ion-md-arrow-dropup-circle"></i> 50.50%</h6>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-6 d-flex stat my-3">
                      <div class="mx-auto">
                          <h6 class="text-muted">Productos activos</h6>
                          <h3 class="font-weight-bold">100</h3>
                          <h6 class="text-success"><i class="icon ion-md-arrow-dropup-circle"></i> 25.50%</h6>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-6 d-flex stat my-3">
                      <div class="mx-auto">
                          <h6 class="text-muted">No. de usuarios</h6>
                          <h3 class="font-weight-bold">2500</h3>
                          <h6 class="text-success"><i class="icon ion-md-arrow-dropup-circle"></i> 75.50%</h6>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-6 d-flex my-3">
                      <div class="mx-auto">
                          <h6 class="text-muted">Usuarios nuevos</h6>
                          <h3 class="font-weight-bold">500</h3>
                          <h6 class="text-success"><i class="icon ion-md-arrow-dropup-circle"></i> 15.50%</h6>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 my-3">
                <div class="card rounded-0">
                    <div class="card-header bg-light">
                      <h6 class="font-weight-bold mb-0">Número de usuarios de paga</h6>
                    </div>
                    <div class="card-body">
                      <canvas id="myChart" width="300" height="150"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 my-3">
              <div class="card rounded-0">
                  <div class="card-header bg-light">
                      <h6 class="font-weight-bold mb-0">Ventas recientes</h6>
                  </div>
                  <div class="card-body pt-2">
                      <div class="d-flex border-bottom py-2">
                          <div class="d-flex mr-3">
                            <h2 class="align-self-center mb-0"><i class="icon ion-md-pricetag"></i></h2>
                          </div>
                          <div class="align-self-center">
                            <h6 class="d-inline-block mb-0">$250</h6><span class="badge badge-success ml-2">10% descuento</span>
                            <small class="d-block text-muted">Curso diseño web</small>
                          </div>
                      </div>
                      <div class="d-flex border-bottom py-2">
                          <div class="d-flex mr-3">
                            <h2 class="align-self-center mb-0"><i class="icon ion-md-pricetag"></i></h2>
                          </div>
                          <div class="align-self-center">
                            <h6 class="d-inline-block mb-0">$250</h6><span class="badge badge-success ml-2">10% descuento</span>
                            <small class="d-block text-muted">Curso diseño web</small>
                          </div>
                      </div>
                      <div class="d-flex border-bottom py-2">
                          <div class="d-flex mr-3">
                            <h2 class="align-self-center mb-0"><i class="icon ion-md-pricetag"></i></h2>
                          </div>
                          <div class="align-self-center">
                            <h6 class="d-inline-block mb-0">$250</h6><span class="badge badge-success ml-2">10% descuento</span>
                            <small class="d-block text-muted">Curso diseño web</small>
                          </div>
                      </div>
                      <div class="d-flex border-bottom py-2">
                          <div class="d-flex mr-3">
                            <h2 class="align-self-center mb-0"><i class="icon ion-md-pricetag"></i></h2>
                          </div>
                          <div class="align-self-center">
                            <h6 class="d-inline-block mb-0">$250</h6><span class="badge badge-success ml-2">10% descuento</span>
                            <small class="d-block text-muted">Curso diseño web</small>
                          </div>
                      </div>
                      <div class="d-flex border-bottom py-2 mb-3">
                          <div class="d-flex mr-3">
                            <h2 class="align-self-center mb-0"><i class="icon ion-md-pricetag"></i></h2>
                          </div>
                          <div class="align-self-center">
                            <h6 class="d-inline-block mb-0">$250</h6><span class="badge badge-success ml-2">10% descuento</span>
                            <small class="d-block text-muted">Curso diseño web</small>
                          </div>
                      </div>
                      <button class="btn btn-primary w-100">Ver todas</button>
                  </div>
              </div>
            </div>
        </div>
    </div>
</section>

</div>

</div>
</div>

    <div class="clearfix"></div>                 





<!-- FOOTER -->
        <?php
            include_once('footer.php');
        ?>

          
  </body>
</html>

