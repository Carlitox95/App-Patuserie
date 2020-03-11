
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
    <center><h3>Datos de la Busqueda</h3> </center>
    <div class="container">   
     
 <?php
 ///////////////////////////////////////////////////////Inicia el Codigo PHP///////////////////////////////////////////////
 //Funcion para quitar espacios
 function Limpia_Espacios($cadena){
     $cadena = str_replace(' ', '%20', $cadena);
   return $cadena;
  } 
//Funcion para obtener un genero de una pelicula
 function Obtener_Genero($genero) {
   switch ($genero) {
    case 28:
        $genero='Action';
        return $genero;
        break;
    case 12:
        $genero='Adventure';
        return $genero;
        break;
    case 16:
        $genero='Animation';
        return $genero;
        break;
    case 35:
        $genero='Comedy';
        return $genero;
        break;
    case 80:
        $genero='Crime';
        return $genero;
        break;
    case 99:
        $genero='Documentary';
        return $genero;
        break;
    case 18:
        $genero='Drama';
        return $genero;
        break;
    case 10751:
        $genero='Family';
        return $genero;
        break;
    case 14:
        $genero='Fantasy';
        return $genero;
        break;
    case 36:
        $genero='History';
        return $genero;
        break;
    case 27:
        $genero='Horror';
        return $genero;
        break;
    case 10402:'Music';
       return $genero;
        break;
    case 9648:
        $genero='Mistery';
        return $genero;
        break;
    case 10749:
        $genero='Animation';
        return $genero;
        break;
    case 878:
        $genero='Science';
        return $genero;
        break;
    case 10770:
        $genero='Fiction';
        return $genero;
        break;
    case 53:
        $genero='Thriller';
        return $genero;
        break;
    case 10752:
        $genero='War';
        return $genero;
        break;
    case 37:
        $genero='Western';
        return $genero;
        break;
  }          
}
 //Inicia la funcion para general el historial de busquedas 
 function Generar_Historial($UnTitulo,$UnAnio,$UnIdioma){
 $basedatos="patuseries"; //Nombre de la Base de Datos
 $server="localhost"; //Servidor Local de la Base de Datos
 $usuariobd="patuseries"; //Usuario de la Base de Datos
 $passwordbd="patu1234"; //Contraseña de la Base de Datos
 //Nombre Tabla --> historialbusquedas cuyos campos son --> ID,Titulo,Anio,Idioma  
 $conexion=mysqli_connect($server,$usuariobd,$passwordbd,$basedatos); //creamos la conexion SQL
 //Chequeamos la Conexion con SQL
 if (!$conexion) {
      die("Fallo en la conexion: " . mysqli_connect_error());
 }
 $query="INSERT INTO busquedas(titulo,anio,idioma) VALUES ('$UnTitulo','$UnAnio','$UnIdioma')"; //Query de insert 
 mysqli_query($conexion,$query); //Insertamos en la BD nuestra Query
 mysqli_close($conexion); //Finalizamos la conexion con la Base de Datos y la cerramos por seguridad
}

 //Guardando los parametros del formulario
 $titulo=$_GET['titulo'];
 $tituloauxiliar=$_GET['titulo'];
 $anio=$_GET['anio']; 
 $idioma=$_GET['idioma']; 
 $titulo=Limpia_Espacios($titulo); //se limpian los espacios vacios utilizando una funcion
 $consultalink="https://api.themoviedb.org/3/search/movie?api_key=aac9a9ace1c0ec9e45790bbfa0dadf32";
 //se filtra primero por idioma
 if ($idioma=='esp') { 
    $consultalink=$consultalink."&language=es";   
  }
 if ($idioma=='en') { 
    $consultalink=$consultalink."&language=en";   
  }
 //ahora se realiza la filtracion por año de la pelicula es decir si año es distinto de vacio lo filtro
 if(!empty($anio)) {
    $consultalink=$consultalink.'&year='.$anio;
 }

  
if(isset($titulo)) {   
     
     $pagina=1;
     $consultalink=$consultalink.'&query='.$titulo."&page=".$pagina;   
     //se comienza para obtener el JSON en base al link formulado
     $json=file_get_contents($consultalink);
     $objetoPrincipal=json_decode($json);
     $objetoResultado= $objetoPrincipal->results;     
     $cantidadResultados= $objetoPrincipal->total_results;        
     echo("<ul class='list-group list-group-flush'>");    
           

  if ($cantidadResultados==0) { echo ("No se encontró nada que corresponda a lo descripto"); }
        $i=0;
        while (($i < $cantidadResultados) AND ($i<20)) {        
         
          $condicionexistencia=$objetoResultado[$i]->poster_path; //verifica que si no tienen fotos los omite           
           if (!empty($condicionexistencia)) {
             $titulo=$objetoResultado[$i]->title;        
             $linkfoto="https://image.tmdb.org/t/p/w500".$objetoResultado[$i]->poster_path;
             $genero=$objetoResultado[$i]->genre_ids[0];
             $genero=Obtener_Genero($genero); 
             $descripcion=$objetoResultado[$i]->overview;  
             $fechalanzamiento=$objetoResultado[$i]->release_date;  
             $puntuacionpromedio=$objetoResultado[$i]->vote_average;                   
             echo("<li class='list-group-item'>"); 
             print_r("<h4>".$titulo."</h4>");
             echo("<div class='row'>");
             echo("<div class='col-4'>");
             print_r("<img class='img-thumbnail' width='320' height='240' src='".$linkfoto."''>");
             echo("</div>");
             echo("<div class='col-8'>");               
             print_r("<h4> Fecha Lanzamiento: <small class='text-muted'>".$fechalanzamiento."</small></h4>");
             print_r("<p><h6>Descripcion</h6> <small class='text-muted'> ".$descripcion."</small></p>");
             print_r("<p><h6>Genero</h6> <small class='text-muted'> ".$genero."</small></p>");
             print_r("<p><h6>Calificacion Promedio</h6> <small class='text-muted'> ".$puntuacionpromedio."</small></p>");    
             echo ("<p><h6>Compartir Con un Amigo</h6>");
             //Definimos un Array para pasar por parametros los resultados de la busqueda
             
                    

             echo ("<a href='enviar.php?titulo=$titulo&descripcion=$descripcion'>");
             echo ("<button type='button' class='btn btn-success'>Email</button></a></p>");     

             //<a href="http://url.pagina.destino/?variable1=valor1&variable2=valor2">Enlace a página de destino</a>     
             echo("</div>");
             echo("</div>");                          
             echo("</li>");              
            }

         $i=$i+1;           
        }
        echo("</ul>");

  } 
 if(empty($anio)) { $anio="NADA";}
 Generar_Historial($tituloauxiliar,$anio,$idioma); //una vez mostrado el contenido registramos la busqueda en nuestra BD para la ocasion 


//API Key: aac9a9ace1c0ec9e45790bbfa0dadf32
//&page=1 muestra la primer pagina de contenido
//https://api.themoviedb.org/3/movie/550?api_key=aac9a9ace1c0ec9e45790bbfa0dadf32
//https://developers.themoviedb.org/3/find/find-by-id
//https://api.themoviedb.org/3/search/movie?api_key=aac9a9ace1c0ec9e45790bbfa0dadf32&query=dragon+ball&language=es
//https://api.themoviedb.org/3/movie/76341?api_key=aac9a9ace1c0ec9e45790bbfa0dadf32&language=es
//vote_average.lte Filtra y solo incluye películas que tienen una calificación menor o igual al valor especificado. -->recibe numero
//vote_average.gte Filtra y solo incluye películas que tengan una clasificación que sea mayor o igual que el valor especificado. --> recibe numero
//calificacion=-5 ->entre 1 y 5
//calificacion=+5 -> entre 5 y 10

?>
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
