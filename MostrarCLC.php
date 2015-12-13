

<?php
        include("modelo/Lista_CLC.php");
        include ('ClaseSesion/CuentaUsuario.php');
?>

   
    <?php
    
        session_start();//siempre iniciar sesion antes que todo
        //si las variables tienen valores entonces ingresa y mira el contenido
        
        if( !(isset($_SESSION['cuentaUsuario'])) ){
            header('Location: login.php');
        }
        
        
        if( $_SESSION['cuentaUsuario']->getId_Usuario() == 1 ){
            header('Location: index.php');
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
        <script src="jquery-1.11.3.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

        <title>CLCs</title>
    </head>
    <body>
        
        
        
        <script>
          
            
            
            
            $(document).ready(function(){
                
                
         
                
                                
                var consulta;
                                                                        
                //hacemos focus al campo de búsqueda
                $("#busqueda").focus();
                //-----------------------------------------------------------------------------------------
                
                
                                                                                                    
                //comprobamos si se pulsa el boton
                $("#busqueda").ready(function(e){
                                     
                    //obtenemos el texto introducido en el campo de búsqueda
                    consulta = $("#busqueda").val();
                                                                           
                    //hace la búsqueda
                                                                                  
                    $.ajax({
                        type: "POST",
                        url: "ListaCLC.php",
                        data: "",
                        dataType: "html",
                        beforeSend: function(){
                            //imagen de carga
                            $("#resultado").html("<p align='center'><img src='ajax-loader.gif' /></p>");
                        },
                        error: function(){
                            alert("error petición ajax");
                        },
                                
                        success: function(data){                                                    
                            $("#resultado").empty();
                            $("#resultado").append(data);
                                                             
                        }
                    });
                    
                    
                    
                    
                                                                     
                });
                
                
              
                
                //------------------------------------------------------------------------------------                                                                                    
                //comprobamos si se pulsa el boton
                $("#btn_buscar").click(function(e){
                                     
                    //obtenemos el texto introducido en el campo de búsqueda
                    consulta = $("#busqueda").val();
                    consulta1 = $("#tipo_clc").val();
                    consulta2 = $("#anio").val();
                                                                           
                    //hace la búsqueda
                                                                                  
                    $.ajax({
                        type: "POST",
                        url: "ListaCLC.php",
                        data: "busqueda="+consulta+"&tipoclc="+consulta1+"&anio="+consulta2,
                        dataType: "html",
                        beforeSend: function(){
                            //imagen de carga
                            $("#resultado").html("<p align='center'><img src='ajax-loader.gif' /></p>");
                        },
                        error: function(){
                            alert("error petición ajax");
                        },
                                
                        success: function(data){                                                    
                            $("#resultado").empty();
                            $("#resultado").append(data);
                                                             
                        }
                    });
                
                                                                     
                });
                
                
                   //------------------------------------------------------------------------------------------------
                                                                                                    
                //comprobamos si se pulsa el boton
                
                
  
                
                   //------------------------------------------------------------------------------------------------
                                                                                                    
                //comprobamos si se pulsa el boton
               
                
                
                                                                   
            });
        </script>
        
        <script>
            $(document).ready(function(){      
                $("#exitoso").ready(function(){
                    $("#exitoso").fadeOut(10000);
                });
            });
        </script>
         
        
        
        
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
                <a class="navbar-brand page-scroll" href="indexf.php">HOME</a>
                
                
                
            </div>
            
            
            

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    
                    <li>
                        <a  class="page-scroll" href="MostrarCLC.php" style="background: #000; color: #FFF;">CLC's</a>
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
        
        
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        
        
        <div class='container '>
        
            
             <button type="button" class="btn btn-primary" onclick="location.href = 'NuevoCLC.php' ">Nuevo</button>
            
             <p></p>
            
            <?php
                if( (isset($_GET['agregado'])) ){
                    
            ?>
            
            
                    <div id="exitoso">
                        <div class="alert alert-success">
                            <strong>Exito!</strong> Nuevo CLC Agregado.
                        </div>
                    </div>
                
            <?php
                }else if( (isset($_GET['actualizado'])) ){
            ?>
            
            
                    <div id="exitoso">
                        <div class="alert alert-success">
                            <strong>Exito!</strong> Se Actualizaro Los Datos Del CLC.
                        </div>
                    </div>
                
            <?php
                }else if( (isset($_GET['eliminado'])) ){
            ?>
            
            
                    <div id="exitoso">
                        <div class="alert alert-success">
                            <strong>Exito!</strong> Se Eliminaron Los Datos Del CLC.
                        </div>
                    </div>
                
            <?php
                }
            ?>
            
            
            
            <div class='panel panel-primary' style='border-color: #00AA00;'>
                <div class='panel-heading' style='background-color: #00AA00;'>
                    Buscar Registro :
                </div>
                <div class='panel-body'>
                    
                    <form class="form-inline">
                        
                        <div class="form-group">
                            <label>Buscar Registro :</label>
                            <input type="text" class="form-control" name="busqueda" id="busqueda" size="80%" required="true" maxlength="80">
                        </div>
                        
                        
                        <br />
                        <br />
                        
                        <div class="form-group">
                            <label>Tipo de CLC</label>
                            <select class="form-control" name="tipo" id="tipo_clc">
                                <option value="0">Todos</option>
                                <option value="1">Servicios Personales</option>
                                <option value="2">Impuestos</option>
                            </select>
                        </div>
                        
                        
        
                        <div class="form-group">
                            <label>Año</label>
                            <select class="form-control" name="anio" id="anio">
                                <option value="0">...</option>
                                
                                <?php
                                
                                    $conexionL = new ConectionBD();
                                    
                                    
                                    $idU = $_SESSION['cuentaUsuario']->getId_Universidad();
                                 
                                    
                                    
                                    $query = "SELECT DISTINCT YEAR(clc.fecha) As Anio FROM clc,  relacion_universidad_clc, universidad  WHERE (relacion_universidad_clc.id_CLC = clc.id) AND  (relacion_universidad_clc.id_Universidad = universidad.id) AND (universidad.id = '$idU') ORDER BY clc.fecha DESC";
                    
                                    
                                    $resultado = $conexionL->seleccion($query);
                                    while ($filas = $resultado->fetch_assoc()) {
                                        $aniosFecha = $filas["Anio"];
                                        echo "<option value='$aniosFecha'>$aniosFecha</option>";
                                    }
                                   
                                    
                                    $conexionL->cerrarConexion();
                                    
                                ?>
                                
                                
                                
                                
                                
                            </select>
                        </div>
                        
                        
                        <br />
                        <br />
                        
                        
                        <div class="form-group">
                            <button type='button' class='btn btn-outline btn-primary' id="btn_buscar">Buscar</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
        
        <!-- -->
        
        
        
                        
        
        
                        
        
        
        
        
        
        <section id="resultado" style="border: 0px solid blue;">
            
        </section>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        <footer style="width: 100%;height: 200px;background: gainsboro ;margin-top: 100px;" >
            
        </footer>
        
            <script>
            function Eli(id){
                
                if(confirm("Esta seguro que desea Eliminar el ClC")){
                    window.location.href="EliminarCLC.php?id="+id;
                }
             
            }
        </script>
    </body>
</html>

