<?php
        include ('ClaseSesion/CuentaUsuario.php');
         include ('modelo/Listado_anuncios.php');
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
         <script src="jquery-1.11.3.min.js" ></script>
        <script src="JSExtras/jquery-1.11.3.min.js" ></script>
        <script src="JSExtras/Validacion.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

       
        <script src="js/bootstrap.min.js"></script>


    </head>
    <body>
        
          
    <?php
    
        session_start();//siempre iniciar sesion antes que todo
        //si las variables tienen valores entonces ingresa y mira el contenido
        
        if( !(isset($_SESSION['cuentaUsuario'])) ){
            header('Location: login.php');
        }

        if( $_SESSION['cuentaUsuario']->getId_Usuario() == 1 ){
            header('Location: index.php');
        }
           
            $consulta = "SELECT id,contenido FROM anuncio";
            $lista = new Listado_anuncios($consulta);
            
        
           
      
        
    ?>
        
        
        <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <img src="imagenes/logos/suneo.png" alt="SUNEO" title="SUNEO" width="100px" height="30px" />
                </a>
                <a class="navbar-brand page-scroll" href="index.php" style="background: #000; color: #FFF;">HOME</a>
            </div>
            
            
            

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a  class="page-scroll" href="MostrarCLC.php" >CLC's</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="MostrarAdecuacionesPresupuestales.php">Adecuaciones Presupuetales</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="perfil.php">Perfil</a>
                    </li>

                    <li>
                        <a class="navbar-brand page-scroll" href="logout.php">
                            <img src="imagenes/off.png" alt="Cerrar Sesion" title="Salir" width="20px" height="20px" />
                        </a>
                    </li>
                    <li>
                       
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
            
            
            
            
        <!-- /.container-fluid -->
        </nav>
        

           
        <div class="container">
            <h2>Panel Group</h2>
            
            <div class="panel-group"  >
              <div class="panel  panel-primary">
                <div class="panel-heading">
                    <?php echo 'Bienvenido : '.$_SESSION['cuentaUsuario']->getNombreUsuario(); ?>
                </div>
                <div class="panel-body">
    





      
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators"  >
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>


  </ol>
 
  <!-- Wrapper for slides -->
  <div class="carousel-inner">



    <div class="item active">
      <img src="imagenes/slider/papaloapan.jpg" alt="..."  style="width: 100%;  height:70% "   >
      <div class="carousel-caption">
          <h3>PAPALOAPAN</h3>
      </div>
    </div>

        <div class="item">
      <img src="imagenes/slider/umar.jpg" alt="..."   style="width: 100%;  height:70%">
      <div class="carousel-caption">
          <h3>UMAR</h3>
      </div>
    </div>


  </div>
 
  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>


</div> <!-- Carousel -->




<!--  SON LOS ANUNCIOS DEL BAJO DEL SLIDER    -->



</br>
</br>
</br>
</br>





      
    <div id="carousel-example-generic2" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators"  >
    <li data-target="#carousel-example-generic2" data-slide-to="0" class="active" ></li>
    <?php
    
        for ($i=0; $i <$lista->size(); $i++) { 
            $var =$i+1;
            echo ("<li data-target=#carousel-example-generic2 data-slide-to=".$var."></li>");  
        }
       
    ?>
  </ol>
 
  <!-- Wrapper for slides -->
  <div class="carousel-inner">

            

    <?php
    
                        for($i=0; $i<$lista->size(); $i++){
                            $con = $lista->getListaAnuncio($i)->getContenido() ;
                              
                            if($i==0){
                                ?>
                     
                                <div class= "item active" >
                                <img src="imagenes/slider/Anuncio.png" alt="..." > 
                                <div class="carousel-caption" style="color: black;." >
                                <h3>Anuncio</h3>                  
                                <?php
                                echo ("  <p>".$con."</p>  ");
                                 ?>
                                 
                                </div>
                                </div> 
                                <?php
                            }else{
                                ?>
                                 <div class= "item"> 
                                 <img src="imagenes/slider/Anuncio.png" alt="..."> 
                                 <div class="carousel-caption" style="color: black;"> 
                                  <h3>Anuncio</h3>  
                                <?php
                                echo ("  <p>".$con."</p>  ");
                                ?>
                                </div> 
                                </div> 
                                <?php

                            }
                        }

                    
    ?>



  </div>
 
  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic2" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic2" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div> <!-- Carousel -->









        
<script>
    $('.carousel').carousel({
        interval: 3000
    })
</script>



        <footer  style="width: 100%;margin-top: 100px;" >
            
        </footer>
        
        
        
    </body>
</html>
