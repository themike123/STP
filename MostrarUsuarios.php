<?php
        include("modelo/Lista_Usuario.php");
    
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
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css.map">
        <link rel="stylesheet" type="text/css" href="CSSExtras/estilos.css">
        <title>Usuarios</title>
    </head>
    <body>
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
                        <a href="NuevoUsuario.php"> <button class="btn btn-primary">Nuevo Usuario</button></a>
                    </li>
                    
                    <li>
                        <a  class="page-scroll" href="ReporteCLC.php">CLC's</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="ReporteAP.php">Adecuaciones Presupuetales</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="MostrarUsuarios.php" style="background: #000; color: #FFF;">Usuarios</a>
                    </li>
                    
                    <li>
                        <a class="page-scroll" href="perfil.php">Perfil</a>
                    </li>
                    
                    <li>
                        <a class="page-scroll" href="PaginaAnuncio.php">Anuncios</a>
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
        
        
        <?php
            $consulta = "SELECT * FROM usuario";
            $lista = new Lista_Usuario($consulta);
            
        ?>
        
      
        
        <div class="container" style="margin-top: 100px;">
            <div class="alert alert-success"  style="width: 100%;display: none;height: 30px;" id="confirmacion">Usuario Eliminado</div>
            <?php
                if( isset($_GET["eliminado"])){
                    $aux  = $_GET["eliminado"];

                    if($_GET["eliminado"]==1){
                        echo "<script>$('#confirmacion').show();</script>";
                    }
                }
            ?>
            <h2>Todos los Usuarios</h2>
            <p>Usuarios dados de alta en el sistema</p>
            

            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <?php
                  if($lista->size()>0){
                echo"<table class='table'>";
                    echo"<thead>";
                          echo"<tr>";
                          echo"<th>Nombre</th>";
                          echo"<th>Telefono</th>";
                          echo" <th>Email</th>";
                          echo" <th>Username</th>";
                          echo" <th></th>";
                          echo"</tr>";
                    echo" </thead>";
                    echo"<tbody>";
                     
                            for($i=0; $i<$lista->size(); $i++){
                            $id = $lista->getListaUsuario($i)->getId();
                            
                            
                            echo"<tr>";
                            echo"<td>".$lista->getListaUsuario($i)->getNombre()."</td>";
                            echo"<td>".$lista->getListaUsuario($i)->getTelefono()."</td>";
                            echo" <td>".$lista->getListaUsuario($i)->getEmail()."</td>";
                            echo"<td>".$lista->getListaUsuario($i)->getUsername()."</td>";
                            if($id != 1){
                                echo"<td><a><button class='btn btn-outline btn-danger' onclick='Eliminar($id)'>Eliminar</button></a></td>";
                            }else{
                                echo"<td>Administrador</td>";
                            }
                            
                            echo" </tr>";
                            }
                        
                          
                    echo"</tbody>";
                echo"</table>";
                }else{
                    echo"<div class='alert alert-success'  style='width: 100%;height: 200px;' >No hay Usuarios</div>";
                }
                ?>
                </div>
              </div>
              
            </div>
        </div>
        
        
        <script>
            function Eliminar(id){
                
                if(confirm("Esta seguro que desea Eliminar el Usuario")){
                    window.location.href="EliminarUsuario.php?id="+id;
                }
             
            }
            
            
        </script>
        
    </body>
</html>

