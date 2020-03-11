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
    <br>        
    
    <div class="container">   

    <div class="row">
    <div class="col-8">
    <!-- Formulario de busqueda -->  
    <center><h3>Buscar una Pelicula</h3> </center>    
    <form action="busqueda.php" class="form-horizontal" method="GET">    
    <div class="form-group">
    <label for="titulo" class="control-label col-xs-4">Titulo</label> 
    <div class="col-xs-8">
    <input id="titulo" name="titulo" placeholder="Titulo de la pelicula" type="text" class="form-control" required="required">
    </div>
    </div>    
    <div class="form-group">
    <label for="idioma" class="control-label col-xs-4">Idioma</label> 
    <div class="col-xs-8">
    <select id="idioma" name="idioma" class="select form-control" required="required">
    <option value="esp">Español</option>
    <option value="en">Ingles</option>
    </select>
    </div>
    </div> 
    <div class="form-group">
    <label for="anio" class="control-label col-xs-4">Año</label> 
    <div class="col-xs-8">
    <input id="anio" name="anio" placeholder="Año lanzamiento de la pelicula" type="text" class="form-control">
    </div>
    </div>   
    <div class="form-group row">
    <div class="col-xs-offset-4 col-xs-8">
    <center><button name="submit" type="submit" class="btn btn-primary">Buscar</button></center>
    </div>
    </div>
    </form>
    <br>
    <br>  
    <br>
    <br>
    <br> 
    <!-- Formulario de busqueda -->
    </div>
    <div class="col-4">
    <h6>Ultimas 15 Busquedas Completas</h6>
    <?php
     //Datos para la conexion PHP con MYSQL
     $basedatos="patuseries"; //Nombre de la Base de Datos
     $server="localhost"; //Servidor Local de la Base de Datos
     $usuariobd="patuseries"; //Usuario de la Base de Datos
     $passwordbd="patu1234"; //Contraseña de la Base de Datos
     $conexion=mysqli_connect($server,$usuariobd,$passwordbd,$basedatos);
     $consultasql="SELECT id,titulo,anio,idioma FROM busquedas ORDER BY id DESC";
     $result = $conexion->query($consultasql);

     echo ("<ul class='list-group'>");
     if (($result->num_rows > 0) AND ($result->num_rows<15)) {
          while($row = $result->fetch_assoc()) {
             $titulo=$row["titulo"];
             $anio=$row["anio"];
             $idioma=$row["idioma"];
             if ($idioma=='esp') {$idioma="Español";}
             if ($idioma=='en') {$idioma="Ingles";}
             echo ("<li class='list-group-item d-flex justify-content-between align-items-center'>");
             echo ("<h6>Titulo: <small>".$titulo." </small></h6>");
             echo ("<h6>Año: <small>".$anio." </small></h6>");
             echo ("<h6>Idioma: <small>".$idioma." </small></h6>");
             echo ("</li>");
        }   
        echo ("</ul>");
     }  
     $conexion->close(); //cerramos la conexion con la Base de Datos    
    ?>




    </div>
    <!-- Termina la columna 2-->
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
    <script src="js/scripts.js"></script>
    

  </body>
</html>
