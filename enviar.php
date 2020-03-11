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
       <?php         
       //guardamos los datos de la busqueda para mostrarlos
       if(isset($_GET['titulo'])) { $titulo=$_GET['titulo']; }
       if(isset($_GET['descripcion'])) { $descripcion=$_GET['descripcion']; } 
       ?> 
      <script type="text/javascript">
         function get_action(form) {
        form.action = 'mailto:'+document.getElementById("receptor").value;
        }      
      </script>
      <!-- Inicia el Formulario -->
      <form onsubmit="get_action(this);" name="compartir" id="compartir" method="post" enctype="text/plain">
       <h3> Datos de la Busqueda</h3>
       <div class="form-group row">
       <label for="titulo" class="col-4 col-form-label">Titulo</label> 
       <div class="col-8">
       <div class="input-group">        
       <input id="titulo" name="titulo" type="text" class="form-control here" readonly="readonly" value='<?php echo $titulo ?>'>
       </div>
       </div>
       </div>
       <div class="form-group row">
       <label for="descripcion" class="col-4 col-form-label">Descripcion</label> 
       <div class="col-8">
       <textarea id="descripcion" name="descripcion" cols="40" rows="5" class="form-control" readonly="readonly" 
       aria-describedby="descripcionHelpBlock"><?php echo $descripcion ?></textarea> 
       <span id="descripcionHelpBlock" class="form-text text-muted">Descripción de la Pelicula</span>
       </div>
       </div> 
       <div class="form-group row">
       <label for="emisor" class="col-4 col-form-label">Emisor</label> 
       <div class="col-8">
       <input id="emisor" name="emisor" placeholder="ingresar tu correo aqui.." type="text" class="form-control here">
       </div>
       </div>
       <div class="form-group row">
       <label for="receptor" class="col-4 col-form-label">Receptor</label> 
       <div class="col-8">
      <input id="receptor" name="receptor" placeholder="Ingresar correo destino aqui..." type="text" class="form-control here">
       </div>
       </div> 
       <div class="form-group row">
       <div class="offset-4 col-8">
       <button name="submit" type="submit" class="btn btn-primary">Compartir</button>
       </div>
       </div>
      </form>
      <!-- Termina el Formulario -->
     
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
