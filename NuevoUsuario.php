<?php
        include("modelo/Lista_Universidades.php");
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
        <script src="JSExtras/jquery-1.6.2.min.js" type="text/javascript"></script>
        <script src="JSExtras/Validacion.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="CSSExtras/estilos.css">
        
        


        
        <script>      

            function expresion(campo, RegExPattern){
                    if ((campo.match(RegExPattern)) && (campo!='')) { 
                        return true;
                    } else {
                        return false;
                    }
            }
            
            
            function validacion() {
                    var campo = document.getElementById("username").value;
                    
                    var RegExPattern = /[a-z0-9]+$/;
                    var RegExPattern2 = /[0-9]{10}$/;
                    var RegExPattern3 = /[a-z0-9]+@[a-z0-9]*mail\.[a-z0-9]+$/;
                    
                    var valor = false;
                    
                    valor = expresion(campo, RegExPattern);
                    
                    if(valor == true){
                        campo = document.getElementById("password").value;
                        valor = expresion(campo, RegExPattern);
                        
                        if(valor == true){
                                campo = document.getElementById("telefono").value;
                                valor = expresion(campo, RegExPattern2);
                            
                                if(valor == true){
                                        campo = document.getElementById("email").value;
                                        valor = expresion(campo, RegExPattern3);
                                        if(valor == true){
                                            
                                        }else{
                                            alert('Correo Invalido');
                                            document.getElementById("email").focus();
                                        }  
                                            
                                        
                                }else{
                                        alert('Telefono debe contener 10 numeros');
                                        document.getElementById("telefono").focus();
                                }
                        }else{
                            alert('Password debe contener datos Alfanumericos Ejemplo usuario1, nombre');
                            document.getElementById("password").focus();
                        }
                        
                    }else{
                        valor = false;
                        alert('Usuario debe contener datos Alfanumericos Ejemplo usuario1, nombre');
                        document.getElementById("username").focus();
                    }
                    
                    
                    return valor;
            }



        
        </script>
        
        
        
    </head>
    <body id="todo">
        
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
                <a class="navbar-brand page-scroll" href="NuevoUsuario.php" style="background: #000; color: #FFF;">Nuevo Usuario</a>
                
                
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
        <br>
        <br>
        <br>
        <br>
        
        <div class="alert alert-danger"  style="width: 50%;display: none;height: 50px;margin: 0 auto;margin-bottom:  10px;" id="res"><p>El Username ya existe </p></div>
        
        <?php
            if( isset($_GET["b"])){
                $aux  = $_GET["b"];

                if($aux=="false"){
                    echo "<script>$('#res').fadeIn(500);</script>";
                }
            }
        ?>
        
        <div class="container" style="margin-bottom: 40px;">
            
            
            <div class="panel-group" id="panel" >
              <div class="panel  panel-primary">
                <div class="panel-heading">Nueva Usuario</div>
                <div class="panel-body">
                    <form class="form-inline" action="usuario_nuevo.php" method="post" onsubmit="return validacion()">
                        
                       
                        <div class="form-group">
                            <label>Nombre</label><br>
                            <input type="text" class="form-control " name="nombre" required="true" maxlength="50">
                     
                        </div>
                        <br>
                        <br>
                      
                        <div class="form-group">
                            <label>Email</label><br>
                            <input type="text" class="form-control " name="email" id="email" required="true" maxlength="50">
                        </div>
                        <br>
                        <br>
                       
                        <div class="form-group">
                            <label>Telefono</label><br>
                            <input type="text" class="form-control " name="telefono" id="telefono" required="true" maxlength="10">
                        </div>
                        <br>
                        <br>
                       
                        <div class="form-group">
                            <label>Username</label><br>
                            <input type="text" class="form-control " name="username" id="username" required="true" maxlength="20">
                        </div>
                        <br>
                        <br>
                    
                        <div class="form-group">
                            <label>Password</label><br>
                            <input type="password" class="form-control " name="password" id="password" required="true" maxlength="20">
                        </div>
                        <br>
                        <br>
                        
                        <div class="form-group">
                            <label>Universidad</label><br>
                            <select class="form-control" name="universidad">
                                
                                
                                
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
                        
                        <br>
                        <br>
                        
                        <br>
                        
                        <div class="form-group" >
                          
                            <input type="submit" value="Crear" class="form-control" style="width: 200px;background: lightseagreen;color: white;margin-left: 100px;">
                        </div>
                       
                    </form>
                   
                </div>
              </div>

            </div>
        </div>
        
   
       
    </body>
</html>

