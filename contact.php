


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/contact.css"> 
    <title>Contact Form</title>
  </head>

  </body>
      
<!-- CABECERA -->

    <?php
        include_once('header.php');
    ?>

<div class="clearfix"></div>

<!-- CONTACT FORM -->

    <div class="row">
      <div class="container">
              <div class="brand-title">CONTACT US</div>
                <div id="templatemo_contact" class="col-md-4 gallery-contact">
              </div>
                <div class="col-md-8 templatemo_contactform">

      <form action="sendmail.php" method="post">
              <input type="text" name="name" id="name" class="name" placeholder="NAME">
              <input type="text" name="mail" id="mail" class="email" placeholder="YOUR EMAIL">
              <input type="text" name="phone" id="subject" class="subject" placeholder="PHONE">
              <input type="text" class="message" placeholder="WRITE YOUR MESSAGE ... " id="message"></textarea>
              <div class="clear"></div>
              
              <div class="input">
                <button type="submit" class="submit">SEND! </button></div>  
          </div>    
        </div>
      </form>
    </div>  

    <div class="clearfix"></div>

<!-- FOOTER -->
        <?php
            include_once('footer.php');
        ?>

  </body>
</html>