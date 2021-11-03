<?php
  session_start();

  require 'database.php';

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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About us</title>
  </head>
  <body>

 
    <!-- CABECERA -->

    <?php
        include_once('header.php');
    ?>  
  

<div class="clearfix"></div>
    

    <!-- CUERPO -->         
    <section class="img">
        <img src="images/contact.png">
    </section>

    <div class="clearfix"></div>                 





<!-- FOOTER -->
        <?php
            include_once('footer.php');
        ?>

          
  </body>
</html>










  </body>
</html>
