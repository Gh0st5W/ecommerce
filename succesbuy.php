<?php
  session_start();

  /* Establecemos conexion con la DB */
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
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <title>Shopping Cart</title>


  </head>
  <body>

    <!-- CABECERA -->

    <?php
        include_once('header.php');
    ?>  
  
    <div class="clearfix"></div>


    <!-- CUERPO -->         


        <!-- RESUMEN DEL PEDIDO / INPUTS PARA LA BASE DE DATOS --> 
                    <section class="resumendelpedido">
                                <div class="container">
                                    <div class="brand-title">ORDEN CONFIRMADA</div>
                                    <div class="brand-title">Puede consultar el estado de su pedido en su area privada de cliente</div>
                                        <form action="index.php"><button class='BotonComprar' type="submit">VOLVER A LA PÁGINA DE INICIO</button></form>

                        </form>
                    </section>

        <div class="clearfix"></div>  

        




            
                
            




                   





<!-- FOOTER -->
        <?php
            include_once('footer.php');
        ?>

          
  </body>

	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> 
	<script src="main.js"></script>



</html>
