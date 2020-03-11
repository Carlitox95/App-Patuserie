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


    <header class="headerpelicula">
      <div class="container text-center">
        <!--<h1>Patuserie 2018</h1>-->
        <!--<p class="lead"><h4>Busca tu contenido</h4></p>-->
        <br>
        <br>
      </div>
    </header>

      <br>
      <div class="container">
      <div class="row">
      
      <h2>Patuserie 2018</h2>
      <p class="lead">Patuserie se trata de un sitio web , para que puedas buscar las peliculas que a te interesen , pudiendo buscar por determinados filtros , permitiendo realizar busquedas mas exactas y de una manera compacta</p>   

      <div class="col">
      <h3>Version Desktop</h3>
      <img src="imagenes/Ejemplo1.jpg" class="img-thumbnail" alt="Cinque Terre">
      </div>
      <div class="col">
      <h3>Version Mobile</h3>
      <img src="imagenes/Ejemplo2.jpg" class="img-thumbnail" alt="Cinque Terre">    
      </div>

      
      </div>
      </div>  
    <!-- Invocamos al modulo para ir al Cielo -->
    <?php include ('modulo-ircielo.php') ?>
    <!-- Footer -->
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
