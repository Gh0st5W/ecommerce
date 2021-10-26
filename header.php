    <!-- CABECERA -->
    <div class="headerUpper"><h3>WE SEND AROUND THE WORLD</h3></div> 
    
  
  
  </header>
    <div class="grid-container">
      <!-- WEBSITE LOGO -->
      <div class="leftside">
          <img src="images/LOGO.PNG" alt="Product01" width="1600px" height="100px" /></li>
      </div> 

      <div class="rightside"> 
        <!-- LOGIN or SIGNUP -->
          <?php require 'partials/header.php' ?>
            <?php if(!empty($user)): ?>
                <br> Welcome. <?= $user['email']; ?>
                <br>You are Successfully Logged In                  
                <a href="logout.php">Logout</a>
                <?php else: ?>
                  <h1>Please Login or SignUp</h1>                  
                <a href="login.php">Login</a> or <a href="signup.php">SignUp</a> 
                <br></br>
                <div>
                <img src="images/loginMini.PNG" alt="Product01" width="40px" height="40px" />
                </div>                                      
            <?php endif; ?></div>
      </div>

  </header>

                     
  <div class="clearfix"></div> 