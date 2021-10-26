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
    <title>Welcome to you WebApp</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="css/private.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
  
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




    <div class="clearfix"></div>

    <!-- CUERPO -->         
    <section id="content">
      <br><br/>
          <form>
                <div class="container">
                    <div class="brand-title">PRIVATE MENU</div>
                    <br><br/>
                    <label>USER NAME</label><br><br/>
                    <label>REGISTERED EMAIL</label><br><br/>
                    <label>ADDRESS</label><br><br/>
                    <br><br/>
                    <label>ORDERS</label><br><br/>
                    <label>OPEN ORDERS</label><br><br/>
                    <label>FINISHED ORDERS</label><br><br/>
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










  </body>
</html>
