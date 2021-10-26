<!--- ESTE PRIMER BLOQUE CREO QUE ES PARA EL INICIO DE SESION, ASEGURARME --->

<?php
  session_start();

  require './database.php';

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


<!--- ESTE PRIMER BLOQUE CREO QUE ES PARA EL INICIO DE SESION, ASEGURARME --->




<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/index.css">
    <!--- ESTO HACE QUE SE EJECUTEN LOS FILTROS DE JS. IGUAL SOLO IMPORTA JS --->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> 
	<script src="main.js"></script>

</head>
    <body>

<!-- CABECERA -->

    <?php
        include_once('header.php');
    ?>

          
<!-- MENU INFERIOR -->    
    
    <?php
        include_once('menu.php');
    ?>



<!-- SIDEBAR -->

<section class="container">
        <div class="sidebar"> 
            <img src="images/CATEGORY.png" width="250" height="50" alt="Logo">
            <ul class="tabs">   <!--- Para que me funcionen las tabs no puedo borrar esta clase --->
                <li><a href="#tabFuture">FUTURE</a></li>
                <li><a href="#tabAlien">ALIENS</a></li>
                <li><a href="#tabOrks">ORKS</a></li>
                <li><a href="#tabRobots">ROBOTS</a></li>
                <li><a href="#tabEldar">ELDAR</a></li>
                <li><a href="#tabScenography">SCENOGRAPHY</a></li>        
            </ul>
            <br>
            <img src="images/main.png" width="150" height="150" alt="Logo">
            </br>
            <br>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn position-absolute" type="submit">
                </form>
            </br>
        </div>



<!-- CUERPO --> 

    <div id="content">
		    <div class="categorias">
                <article id="tabFuture">
                        <?php
                            $response= json_decode(file_get_contents('http://localhost/website/api/productos/api-productos.php?categoria=Future'), true);
                            if($response['statuscode'] == 200){
                                foreach($response['products'] as $product){
                                    include('elements.php');
                                }
                            }else{
                                echo $response['response'];
                            }
                        ?>
                </article>
                <article id="tabAlien">
                        <?php
                            $response= json_decode(file_get_contents('http://localhost/website/api/productos/api-productos.php?categoria=Alien'), true);
                            if($response['statuscode'] == 200){
                                foreach($response['products'] as $product){
                                    include('elements.php');
                                }
                            }else{
                                echo $response['response'];
                            }
                        ?>				
                </article>
                <article id="tabOrks">
                    <?php
                            $response= json_decode(file_get_contents('http://localhost/website/api/productos/api-productos.php?categoria=Ork'), true);
                            if($response['statuscode'] == 200){
                                foreach($response['products'] as $product){
                                    include('elements.php');
                                }
                            }else{
                                echo $response['response'];
                            }
                    ?>
                </article>
                <article id="tabRobots">
                    <?php
                            $response= json_decode(file_get_contents('http://localhost/website/api/productos/api-productos.php?categoria=Robot'), true);
                            if($response['statuscode'] == 200){
                                foreach($response['products'] as $product){
                                    include('elements.php');
                                }
                            }else{
                                echo $response['response'];
                            }
                    ?>
                </article>
                <article id="tabEldar">
                    <?php
                            $response= json_decode(file_get_contents('http://localhost/website/api/productos/api-productos.php?categoria=Eldar'), true);
                            if($response['statuscode'] == 200){
                                foreach($response['products'] as $product){
                                    include('elements.php');
                                }
                            }else{
                                echo $response['response'];
                            }
                    ?>
                </article>
                <article id="tabScenography">
                    <?php
                            $response= json_decode(file_get_contents('http://localhost/website/api/productos/api-productos.php?categoria=Scenography'), true);
                            if($response['statuscode'] == 200){
                                foreach($response['products'] as $product){
                                    include('elements.php');
                                }
                            }else{
                                echo $response['response'];
                            }
                    ?>
                </article>
        </div>
    </div>
    </section>

    <div class="clearfix"></div>

<!-- FOOTER -->
        <?php
            include_once('footer.php');
        ?>

  </body>
</html>