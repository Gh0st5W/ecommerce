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

    <div class="container">
        <div class="content">
          <div class="brand-logo"></div>
          <div class="brand-title">CONTACT</div>
          <div class="inputs">
            <label>TOPIC</label>
            <input type="email" placeholder="address@example.com" />
            <label>CONTENT</label>
            <input type="password" placeholder="Type you password here" />
            <button type="submit">SEND</button>
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