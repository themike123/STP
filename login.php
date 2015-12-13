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
            </div>
            
            
            

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
            
            
            
            
        <!-- /.container-fluid -->
        </nav>
        

           
        <div class="container" style="width: 400px;">
            <h2>Panel Group</h2>
            
            <div class="panel-group"  >
              <div class="panel  panel-primary">
                <div class="panel-heading">Iniciar Sessión</div>
                <div class="panel-body">
 
                
    <?php
        session_start();//siempre iniciar sesion antes que todo
        //si las variables tienen valores entonces ingresa y mira el contenido
        if(isset($_SESSION['cuentaUsuario'])){
            header('Location: index.php');
        }
    ?>
        
                <form class="form-inline" action="registroUsuario.php" method="post">
                    
                    
                        <div class="form-group">
                            <label>Usuario : </label>
                            <input type="text" class="form-control " name="usuario" id="usuario" required="true" maxlength="20" placeholder="usuario">
                           
                        </div>
                    
                    <br />
                    <br />
                    
                        <div class="form-group">
                            <label>Contraseña :</label>
                            <input type="password" class="form-control " name="contrasenia" id="contrasenia" required="true" maxlength="20"  placeholder="contraseña">
                        </div>
                    
                    
                    <br />
                    <br />
                    
                        <div class="form-group" >
                          
                            <input type="submit" value="Crear" class="form-control" style="width: 200px;background: lightseagreen;color: white">
                        </div>
                       
                </form>

                </div>
              </div>

            </div>
        </div>
        
        
        <footer style="width: 100%;height: 200px;background: gainsboro ;margin-top: 100px;" >
            
        </footer>
        
        
        
        
        
        
   
    </body>
</html>
