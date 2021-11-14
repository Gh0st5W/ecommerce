
<!----------------------------- SESSION -------------------------------->

<?php
  session_start();
  
  /* Importamos los datos de conexión */
  require './lib/db.php';

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

<!----------------------------------------------------------------------->


<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	
    <link rel="stylesheet" type="text/css" href="css/articulo.css">


</head>
    <body>

<!-- CABECERA -->

    <?php
        include_once('header.php');
    ?>


    <div class="clearfix"></div> 




<!-- CUERPO --> 

    


    <div id="content">
		    <div class="categorias">
                <article id="tabFuture">

                    <?php
                        
                            /* Pasamos el json con la consulta del producto y lo decodificamos */
                            $response= json_decode(file_get_contents('http://localhost/website/api/productos/api-productos.php?get-product=12'), true);
                            /* Debo implementar esta igual que hago en api-carrito.php */
                            /* Igual podria hacer una función que pasandole un id me devuelva el array de todo el link y devolver aqui el resultado y vincular a cada boton esa funcion */
                            // $response= json_decode(file_get_contents('http://localhost/website/api/productos/api-productos.php?get-product=' . $variableDeBoton['id']);
                            //var_dump ($response);
                            /* Si la respuesta es correcta, mostramos elements.php */
                            if($response['statuscode'] == 200){
                                // foreach($response['products'] as $product){
                                foreach($response['products'] as $product){
                                    /* Llamamos a layout articulo.php */
                                    include('articulo.php');
                                }
                            }else{
                                /* error */
                                echo "error"; // Me sirve para saber si no ha entrado.
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

<!--- Pongo aqui el script para que se ejecute tras cargar la pagina ya que sino las funciones del carrito me devuelven NULL --->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> 
	<script src="main.js"></script>

</html>