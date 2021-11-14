  
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/header_footer.css">
  <title>Header</title>

</head>
    <body>  
  



      <!-- CABECERA (Upper) -->
      <div class="headerUpper">WE SEND AROUND THE WORLD</div> 
        
      
      <!-- CABECERA (Medium) -->
      </header>
        <div class="grid-container">
          <!-- WEBSITE LOGO -->
          <div class="leftside">
              <img src="images/LOGO.PNG" alt="Product01" width="1600px" height="120px" /></li>
          </div> 

          <div class="rightside"> 
            <!-- LOGIN or SIGNUP -->
              
                <?php if(!empty($user)): ?>
                    <br> Welcome. <?= $user['email']; ?>
                    <br>You are Successfully Logged In                  
                    <a href="logout.php">Logout</a>
                    <?php else: ?>
                      <h4>Please Login or SignUp</h4>                  
                    <a href="login.php">Login</a> or <a href="signup.php">SignUp</a> 
                    <br></br>
                    <div>
                    <img src="images/loginMini.PNG" alt="Product01" width="40px" height="40px" />
                    </div>                                      
                <?php endif; ?></div>
          </div>

      </header>

                        
      <div class="clearfix"></div> 


      <nav class="nav ul li">
        <ul>  
            <li><a href="aboutus.php">ABOUT US</a></li>
            <li><a href="contact.php">CONTACT</a></li>
            <li><a href="private.php">PRIVATE</a></li>
            
            <li class="carrito">
                <a href="#" class='btn-carrito'>CART</a>
                <div id="carrito-container">
                    <div id="tabla">
                      
                  </div> 
                  
            </li>
            <li> <a href="cart.php" ><img src="images/minicart.png" alt="Product01" width="20px" height="20px" /></li>
            <li><a href="login.php">LOGIN</a></li>
            <li><a href="index.php">INICIO</a></li>            
        </ul>
    </nav>


  </body>
</html>