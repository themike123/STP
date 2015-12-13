<?php
        include("modelo/Lista_Universidades.php");
        include ('ClaseSesion/CuentaUsuario.php');
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
        
        
        <title>CLCs</title>
    </head>
    <body>
        
             
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
        
        
        <script>
            $(document).ready(function(){
                
                                
                var consulta;
                                                                        
                //hacemos focus al campo de búsqueda
                $("#busqueda").focus();
                //-----------------------------------------------------------------------------------------
                
                
                                                                                                    
                //comprobamos si se pulsa el boton
                    $("#busqueda").ready(function(e){
                                     
                            //obtenemos el texto introducido en el campo de búsqueda
                            consulta = $("#universidad").val();
                            consulta2 = $("#tipoReporte").val();
                                                                           
                            //hace la búsqueda                                         
                            $.ajax({
                                    type: "POST",
                                    url: "AdministradorListaCLC.php",
                                    data: "universidad="+consulta+"&tipoReporte="+consulta2,
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
                    
                    //________________________________________________
                    
                                                                                                     
                //comprobamos si se pulsa el boton
                    $("#btn_buscar").click(function(e){
                                     
                            //obtenemos el texto introducido en el campo de búsqueda
                            consulta = $("#universidad").val();
                            consulta2 = $("#tipoReporte").val();
                                                                           
                            //hace la búsqueda                                         
                            $.ajax({
                                    type: "POST",
                                    url: "AdministradorListaCLC.php",
                                    data: "universidad="+consulta+"&tipoReporte="+consulta2,
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
                    
                    
                    
                    $(".botonExcel").click(function(event) {
                        $("#datos_a_enviar").val( $("<div>").append( $("#Exportar_a_Excel").eq(0).clone()).html());
                        $("#FormularioExportacion").submit();
                    });
                
                                                                    
                });
            
        </script>
        
        
        <p></p>
        <p></p>
        
        
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
                        <a  class="page-scroll" href="ReporteCLC.php" style="background: #000; color: #FFF;">CLC's</a>
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
            
            
            
            
        <!-- /.container-fluid -->
        </nav>
        
        
        <br />
        <br />
        <br />
        
        
        
        
        <div class='container '>
            <div class='panel panel-primary' style='border-color: #00AA00;'>
                <div class='panel-heading' style='background-color: #00AA00;'>
                    Buscar Registro :
                </div>
                <div class='panel-body'>
                    
                    <form class="form-inline">
                        
                        <div class="form-group">
                            <label>Universidad</label>
                            <select class="form-control" name="universidad" id="universidad">
                                <option value="0">Todas</option>
                                
                                <?php
                                    $universidad = new ListaUniversidades("SELECT * FROM universidad");
                                    for($i=0; $i<$universidad->size(); $i++){
                                 ?>       
                                        
                                        <option value="<?php echo $universidad->getLista_Universidades($i)->getId(); ?>"><?php echo $universidad->getLista_Universidades($i)->getNombre(); ?></option>
            
                                <?php
            
                                    }
                                
                                ?>
                                
                                
                            </select>
                        </div>
                        
                        
                        <div class="form-group">
                            <label>Tipo</label>
                            <select class="form-control" name="tipoReporte" id="tipoReporte">
                                <option value="1">Gastos de Operación</option>
                                <option value="2">Servicios Personales e Impuestos</option>
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
        
        
                 
<form action="ficheroExcel.php" method="post" target="_blank" id="FormularioExportacion">
<p>Exportar a Excel  <img src="export_to_excel.gif" class="botonExcel" /></p>
<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
</form>
        
        <section id="resultado" style="border: 0px solid blue;">
            
        </section>
        
        
        <footer style="width: 100%;height: 200px;background: gainsboro ;margin-top: 100px;" >
            
        </footer>
        
    </body>
</html>

