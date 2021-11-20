<?php
  session_start();

  /* Establecemos conexion con la DB */
  /*require './lib/db.php';
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
  }*/
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

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <section>

    <div class="content">
      <div id="pedido">
        <div class="carritoLogo"> MI CARRITO </div>
          <div id="tablaCarrito">

            <script>
                carritoPrincipal()

                function carritoPrincipal(){
                        fetch('http://localhost/website/api/carrito/api-carrito.php?action=mostrar')
                        .then(response =>{return response.json();})
                        .then(data =>{
                              console.log(data);
                              let tablaCont = document.querySelector('#tablaCarrito');
                              let precioTotal = '';
                              let contenidoCarrito = ``;
                                          data.products.forEach(element => {   
                                            contenidoCarrito += `
                                                            <div class='parent'>
                                                              <div class='div1'>
                                                                <div class='imagen'><img src='images/${element.image}' width='100' /></div>
                                                              </div>  
                                                                    <input type='hidden' value='${element.id}' />
                                                                  <div class='div2'>
                                                                    <div class='nombre'>${element.description}</div>
                                                                  </div> 
                                                                    <div>${element.cantidad} unit EUR ${element.price}</div>
                                                                    <div>Subtotal: EUR ${element.subtotal}</div>
       
                                                                  <div class='div3'>
                                                                    <div class='botones'><button class='btn-remove'>Eliminar</button></div>                                             
                                                                  </div>
                                                                </div>
                                                            </div>
                                                          `;

                                          });  
                              /* Mostramos el contenido del carrito en la página */               
                              tablaCont.innerHTML = contenidoCarrito; 
                  });
                }    

            
                
            </script>



                <div id="container2">

                          </div>
                    </div>     
              </div>     
                                      <form action="buy.php">
                                              <button class='BotonComprar' type="submit">CONFIRMAR</button>
                                      </form>
    </section>



                   





<!-- FOOTER -->
        <?php
            include_once('footer.php');
        ?>

          
  </body>

	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> 
	<script src="main.js"></script>



</html>
