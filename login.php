<?php

  /* Creamos una variable de clase SESSION para usarla la linea 22 */
  session_start();

  if (isset($_SESSION['user_id'])) {
    // header('Location: /php-login'); 
    header('Location: login.php'); 
  }

  /* Establecemos conexion con la DB */
  require './lib/database.php';


  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    /*  Comprobamos que los datos pasados son lo que tenemos en la DB */
    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      /* Almacenamos el usuario y creamos la variable de session */
      $_SESSION['user_id'] = $results['id'];
      /* Redireccionaremos a la pagina inicial */
      header("Location: /website/index.php"); /* header("Location: /php-login"); */
    } else {
      $message = 'Sorry, those credentials do not match';
    }
  }

?>



<!DOCTYPE html>
        <html>
          <head>
            <meta charset="utf-8">
            <title>Login</title>
            <link rel="stylesheet" type="text/css" href="css/login.css">       
          </head>
  <body>



<!-- CABECERA -->

    <?php
        include_once('header.php');
    ?>

    <div class="clearfix"></div>


<!--- LOGIN --->  

    <section id="content">
          <form action="login.php" method="POST">
                <div class="container">
                    <div class="brand-logo"></div>
                    <div class="brand-title">LOGIN</div>
                    <div class="inputs">
                        <label>USER</label>
                        <input name="email" type="text" placeholder="Enter your email">
                        <label>PASSWORD</label>
                        <input name="password" type="password" placeholder="Enter your Password">
                        <input type="submit" value="Submit"></div>
                </div>
          </form>
    </section>


    <div class="clearfix"></div>



<!-- FOOTER -->
        <?php
            include_once('footer.php');
        ?>

  </body>
</html>
