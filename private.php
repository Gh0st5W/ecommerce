<?php

  
  // Recordamos la varibale de la sesion 
  session_start();

 
  // Importamos los datos de conexión
  require './lib/db.php';
  require './lib/database.php';

  //$_SESSION['user_id'] = $usuario;

  // Validamos una variable de Sesion al pasar por login 
  $usuario = $_SESSION['user_id'];
  // Si no exite la varibale usuario, nos devuelva al login para entrar 
  if(!isset($usuario)){
    header("location: login.php");
  }

 


/*

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
*/

?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/private.css">
    <title>Private Menu</title>
   

  </head>
  <body>

    <!-- CABECERA -->

    <?php
        include_once('header.php');
    ?>  
  

    <div class="clearfix"></div>

    <!-- CUERPO -->     
    


<!-- Page Content -->



<!--- DATOS DE USUARIO ---> 
          <div class="content">
            <div class="container">

            <div class="brand-title">CUSTOMER PRIVATE AREA</div>
            
            <br></br>

                <tr>
                    <td>Welcome <?php echo $usuario; ?></td>
                </tr>

            <div class="brand-title-micro">YOUR PROFILE</div>
            <table class="orderTable">
                <tr>
                    <td>NAME</td> 
                    <td>EMAIL</td>
                    <td>ADDRESS</td>
                </tr>

                          <?php

                              $conn=mysqli_connect('localhost','root','1234','db_comelectr');

                              /* Realizamos la consulta */
                              $sql='SELECT * FROM users';
                              /* Almacenamos el resultado en la varibale*/
                              $result=mysqli_query($conn,$sql);
                              $array = mysqli_fetch_array($result);

                              while($mostrar=mysqli_fetch_array($result)){
                          ?> 

                <tr>
                    <td><?php echo $usuario; ?></td>
                    <td><?php echo $usuario; ?></td>
                    <td><?php echo $usuario; ?></td>
                </tr>

              <?php
                /*  Cierro aqui el while para que me coja los td anteiores */
                }
              ?> 

              </table>




<!--- DATOS DE LOS PEDIDOS ---> 
              <br></br>
              <div class="brand-title-micro">ORDERS</div>
              <table class="orderTable">
                <tr>
                    <td>ORDER IDENTIFIER</td> 
                    <td>ORDER NUMBER</td>
                    <td>CUSTOMER ORDER</td>
                    <td>TOTAL AMOUNT</td>

                </tr>

                          <?php

                              $conn=mysqli_connect('localhost','root','1234','db_comelectr');

                              /* Realizamos la consulta */
                              $sql='SELECT * FROM orders';
                              /* Almacenamos el resultado en la varibale*/
                              $result=mysqli_query($conn,$sql);
                              $array = mysqli_fetch_array($result);

                              while($mostrar=mysqli_fetch_array($result)){
                          ?> 
                <div class="orderTable">
                  <tr>
                      <td><?php echo $mostrar['order_id']?></td>
                      <td><?php echo $mostrar['order_number']?></td>
                      <td><?php echo $mostrar['user_id']?></td>
                      <td><?php echo $mostrar['amount']?> EUROS</td>
                  </tr>
                </div>                  
              <?php
                /*  Cierro aqui el while para que me coja los td anteiores */
                }
              ?> 

              </table>
              
            </div> 
          </div>




                <div class="clearfix"></div>                 





            <!-- FOOTER -->
                    <?php
                        include_once('footer.php');
                    ?>

          
  </body>
</html>

