<?php
  session_start();

?>









<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  </head>
  <body>

    <!-- CABECERA -->

    <?php
        include_once('header.php');
    ?>  
  
    <div class="clearfix"></div>


    <!-- CUERPO -->         


        <!-- RESUMEN DEL PEDIDO / INPUTS PARA LA BASE DE DATOS --> 
                                  <div class="content">
                                    <section class="resumendelpedido">
                                        <div class="panel panel-default" >
                                          <div class="panel-heading">                                
                                            <div class="carritoLogo">ORDER PAYMENT</div>
                                          </div>
                                        </div>

                                            <!--- TARGETA DE CREDITO --->

                                            
                                            <form action="#" class="credit-card-div">
                                              <div class="panel panel-default" >
                                                <div class="panel-heading">
                                                      <div class="row ">
                                                          <div class="col-md-12">
                                                                  <span class="help-block text-muted small-font" > USER</span></div>
                                                                  <input type="text" class="form-control" placeholder="Enter your user name" /></div>
                                                                  <span class="help-block text-muted small-font" > ADDRESS</span></div>
                                                                  <input type="text" class="form-control" placeholder="Enter your address" /></div>
                                                                  <br></br>
                                                    <div class="row ">
                                                              <div class="col-md-12">
                                                                  <span class="help-block text-muted small-font" > CARD NUMBER</span>
                                                                  <input type="text" class="form-control" placeholder="Enter Card Number" />
                                                              </div>
                                                          </div>
                                                    <div class="row ">
                                                              <div class="col-md-3 col-sm-3 col-xs-3">
                                                                  <span class="help-block text-muted small-font" > Expiry Month</span>
                                                                  <input type="text" class="form-control" placeholder="MM" />
                                                              </div>
                                                        <div class="col-md-3 col-sm-3 col-xs-3">
                                                                  <span class="help-block text-muted small-font" >  Expiry Year</span>
                                                                  <input type="text" class="form-control" placeholder="YY" />
                                                              </div>
                                                        <div class="col-md-3 col-sm-3 col-xs-3">
                                                                  <span class="help-block text-muted small-font" >  CCV</span>
                                                                  <input type="text" class="form-control" placeholder="CCV" />
                                                              </div>
                                                        <div class="col-md-3 col-sm-3 col-xs-3">
                                                                  <img src="images/credit.png" class="img-rounded" height="60px"/>
                                                                </div>
                                                              </div>
                                                    <div class="row ">
                                                              <div class="col-md-12 pad-adjust">

                                                                  <input type="text" class="form-control" placeholder="Name On The Card" />
                                                              </div>
                                                          </div>
                                                    <div class="row">
                                                <div class="col-md-12 pad-adjust">
                                                    <div class="checkbox">
                                                    <label>
                                                      <input type="checkbox" checked class="text-muted"> Save details for fast payments <a href="#"> learn how ?</a>
                                                    </label>
                                                  </div>
                                                </div>
                                                    </div>
                                                    <br></br><br></br>
                                                      <div class="row ">
                                                             
                                                              <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                                                              <form action="index.php"> 
                                                                      <button class="btn btn-danger" link="index.php" href="index.php" type="submit">CANCEL</button>
                                                                  </div>
                                                                  <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                                                                      <input type="submit" class="btn btn-warning btn-block" value="PAY NOW" />
                                                                  </div>
                                                              </div>
                                                          </form>
                                                                  </div>
                                                              </div>
                                            </form>

           
                        <!--- CIERRE DEL FORMULARIO GLOBAL --->

                        </form>
                    </section>
        </div>

        <div class="clearfix"></div>  

     

<!-- FOOTER -->
        <?php
            include_once('footer.php');
        ?>

          
  </body>

	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> 
	<script src="main.js"></script>



</html>
