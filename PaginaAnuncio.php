<?php
         include("modelo/Listado_anuncios.php");
        include ('ClaseSesion/CuentaUsuario.php');
?>
 
    <?php
    
        session_start();//siempre iniciar sesion antes que todo
        //si las variables tienen valores entonces ingresa y mira el contenido
        
        if( !(isset($_SESSION['cuentaUsuario'])) ){
            header('Location: login.php');
        }
        
        
        if( $_SESSION['cuentaUsuario']->getId_Usuario() != 1 ){
            header('Location: indexf.php');
        }
        
    ?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <script src="JSExtras/jquery-1.6.2.min.js" type="text/javascript"></script>
        <script src="JSExtras/Validacion.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="CSSExtras/estilos.css">
        <title>Anuncios</title>
    </head>
    <body>
    

        <?php
            $idU = $_SESSION['cuentaUsuario']->getId_Universidad();
            $consulta = "SELECT id,contenido FROM anuncio";
            $lista = new Listado_anuncios($consulta);
            
        
            echo $_SESSION['cuentaUsuario']->getId_Universidad();
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
                <a class="navbar-brand page-scroll" href="index.php">HOME</a>
                
                
                
            </div>
            
            

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    
                    <li>
                        <a  class="page-scroll" href="ReporteCLC.php">CLC's</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="ReporteAP.php">Adecuaciones Presupuetales</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="MostrarUsuarios.php">Usuarios</a>
                    </li>
                    
                    <li>
                        <a class="page-scroll" href="perfil.php">Perfil</a>
                    </li>
                    
                    <li>
                        <a class="page-scroll" href="PaginaAnuncio.php" style="background: #000; color: #FFF;">Anuncios</a>
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
        </nav>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
             <div class='container '>
            <div class='panel panel-primary' style='border-color: #00AA00;'>
                <div class='panel-heading' style='background-color: #00AA00;'>
                    Nuevo Anuncio
                </div>

                <div class='panel-body'>
                        <div class="form-group">
                            <label for="comment">Anuncio:</label>
                            <textarea class="form-control" rows="3" id="comment"></textarea>
                           
                        </div>

                         <div class="form-group">
                            <button type='button' onclick='Nuevo()'  class='btn btn-outline btn-primary' id="btn_Nuevo">Agregar</button>
                        </div>

                </div>
            </div>
        </div>

            <br/>
        

                    </div>


            <section id="resultado" style="border: 0px solid blue;">
                <div class='container '>
                    <h1>Anuncios</h1>
               <br/>                 
            <br/>
            
                     <table class="table table-striped">
                        <?php
                        for($i=0; $i<$lista->size(); $i++){

                            $id = $lista->getListaAnuncio($i)->getId();
                            echo("<tr>");
                                echo("<td>".$lista->getListaAnuncio($i)->getId()."</td>");
                                echo("<td>".$lista->getListaAnuncio($i)->getContenido()."</td>");
                                    echo(  "  <td><button onclick='Eli($id)' type='button' class='btn btn-outline btn-danger' style='margin-right: 20px;'>Eliminar</button></td>");
                            echo("</tr>");
                        }
                        ?>
                    </table>
                </div>
            </section>
        
        <footer style="width: 100%;height: 200px;background: gainsboro ;margin-top: 100px;"  >
            
        </footer>
        
            <script>
            function Eli(id){
                
                if(confirm("Esta seguro que desea Eliminar el Anuncio ")){
                    window.location.href="Eliminar_Anuncio.php?id="+id;
                }
             
            }

            function Nuevo(){
                //var = document.getElementById("comment").value;
                 window.location.href="NuevoAnuncio.php?cont="+ document.getElementById("comment").value;
            }


        </script>
    </body>
</html>