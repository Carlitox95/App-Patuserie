<!DOCTYPE html>
<html lang="es">

  <head>    
  <!-- Invocamos el modulo que tiene el Head -->
  <?php include ('modulo-head.php') ?>
  </head>

  <body id="page-top">

    <!-- Navigation -->
    <!-- Invocamos al modulo para tener el menu de navegacion -->
    <?php include ('modulo-navigation.php') ?>
    <br>
    <br>
    <br>
    <div class="container">
    <div class="row">
     
    <div class="col">
    <!-- Inicia Columna 1-->
     <h2>Datos de Contacto</h2>
     <form class="form-horizontal">
     <div class="form-group">
     <label class="control-label col-xs-4" for="empresa">Empresa</label> 
     <div class="col-xs-8">
     <div class="input-group">
     <div class="input-group-addon">
     <i class="fa fa-address-card-o"></i>
     </div> 
     <input id="empresa" name="empresa" placeholder="Patuserie" type="text" class="form-control" readonly>
     </div>
     </div>
     </div>
     <div class="form-group">
     <label for="mail" class="control-label col-xs-4">Mail</label> 
     <div class="col-xs-8">
     <div class="input-group">
     <div class="input-group-addon">
     <i class="fa fa-address-card-o"></i>
     </div> 
     <input id="mail" name="mail" placeholder="Patuserie@gmail.com" type="text" class="form-control" readonly>
     </div>
     </div>
     </div>
     <div class="form-group">
     <label for="telefono" class="control-label col-xs-4">Telefono</label> 
     <div class="col-xs-8">
     <input id="telefono" name="telefono" placeholder="412-4300" type="text" class="form-control" readonly>
     </div>
     </div> 
     </form>
    <!-- Termina Columna 1-->
    </div>
    <div class="col">
    <!-- Inicia Columna 2-->
     <h2>Nuestra Ubicacion</h2>     
     <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13085.388732687137!2d-57.9562555!3d-34.9228288!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8e5a62b28764b5ef!2sCatedral+de+La+Plata!5e0!3m2!1ses-419!2sar!4v1538161091440" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
    <!-- Termina Columna 2-->
    </div> 


            
           
    </div>
    </div>
    
    
    <!-- Footer -->
    <br>
    <br>
    <br>
    <br>
    <!-- Invocamos para el Modulo del Footer -->
    <?php include ('modulo-footer.php') ?>
    

    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    

  </body>
</html>
