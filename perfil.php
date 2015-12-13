<?php
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
        <title>Perfil</title>
        
        
        
        
        
        <script>      

            function expresion(campo, RegExPattern){
                    if ((campo.match(RegExPattern)) && (campo!='')) { 
                        return true;
                    } else {
                        return false;
                    }
            }
            
            
            function validacion() {
                    var campo = document.getElementById("usuario").value;
                    
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
                        document.getElementById("usuario").focus();
                    }
                    
                    
                    return valor;
            }



        
        </script>
        
        
    </head>
    <body>
        
             
    <?php
    
        session_start();//siempre iniciar sesion antes que todo
        //si las variables tienen valores entonces ingresa y mira el contenido
        
        if( !(isset($_SESSION['cuentaUsuario'])) ){
            header('Location: login.php');
        }
        
        
        
        
        
   ?>
        
        
        
        
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
                    
                    <?php
                        if( $_SESSION['cuentaUsuario']->getId_Usuario() == 1 ){
                    ?>
                    
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
                                <a class="page-scroll" href="perfil.php" style="background: #000; color: #FFF;">Perfil</a>
                            </li>
                    
                            <li>
                                <a class="page-scroll" href="PaginaAnuncio.php">Anuncios</a>
                            </li>
                    
                    <?php
                        }else{
                    ?>
                    
                            <li>
                                <a  class="page-scroll" href="MostrarCLC.php" >CLC's</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="MostrarAdecuacionesPresupuestales.php">Adecuaciones Presupuetales</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="perfil.php" style="background: #000; color: #FFF;">Perfil</a>
                            </li>  
                            
                    <?php
                        }
                    ?>
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
                    
                    <form class="form-inline" action="ActualizarPerfil.php" method="post" onsubmit="return validacion()">
                        
                        <div class="form-group">
                            <label>ID :</label>
                            <input type="text" class="form-control" name="id" id="id" size="80%" required="true" maxlength="80" readonly="true" value="<?php echo $_SESSION['cuentaUsuario']->getId_Usuario(); ?>">
                        </div>
                        
                        
                        <div class="form-group">
                            <label>Usuario :</label>
                            <input type="text" class="form-control" name="usuario" id="usuario" size="80%" required="true" maxlength="80" value="<?php echo $_SESSION['cuentaUsuario']->getUsername(); ?>">
                        </div>
                        
                        
                        <div class="form-group">
                            <label>Password :</label>
                            <input type="password" class="form-control" name="password" id="password" size="80%" required="true" maxlength="80" value="<?php echo $_SESSION['cuentaUsuario']->getPassword(); ?>">
                        </div>
                        
                        
                        <div class="form-group">
                            <label>Email :</label>
                            <input type="text" class="form-control" name="email" id="email" size="80%" required="true" maxlength="80" value="<?php echo $_SESSION['cuentaUsuario']->getEmail(); ?>">
                        </div>
                        
                        <div class="form-group">
                            <label>Nombre :</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" size="80%" required="true" maxlength="80" value="<?php echo $_SESSION['cuentaUsuario']->getNombreUsuario(); ?>">
                        </div>
                        
                        <div class="form-group">
                            <label>Telefono :</label>
                            <input type="text" class="form-control" name="telefono" id="telefono" size="80%" required="true" maxlength="10" value="<?php echo $_SESSION['cuentaUsuario']->getTelefono(); ?>">
                        </div>
                        
                        
                        <br />
                        <br />
                        
                        
                        <div class="form-group">
                            <input type='submit' class='btn btn-outline btn-primary' id="btn_buscar" />
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
        
        
        
        
        <footer style="width: 100%;height: 200px;background: gainsboro ;margin-top: 100px;" >
            
        </footer>
        
    </body>
</html>

