<?php
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

<?php
    
if(isset($_GET["error"])){
    echo "<script type='text/javascript'>alert('Sus datos No Tienen El Formato Correcto Ingrese Nuevamente');</script>";
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
        
        
        
  
        
        <script>      

            function expresion(campo, RegExPattern){
                    if ((campo.match(RegExPattern)) && (campo != '')) { 
                        return true;
                    } else {
                        return false;
                    }
            }
            
            
            function validacion() {
                    var campo = document.getElementById("importe").value;
                    
                    var RegExPattern3 = /^\d+$/;
                    var RegExPattern1 = /[0-9]+\.[0-9][0-9]$/;
                    var RegExPattern2 = /[0-9]+\.[0-9]$/;
                    var errorMessage = 'Sintaxis de numero erronea ejemplos 34.00,  56.6,   78';
                    
                    var valor = false;
                    var v1 = false;
                    var v2 = false;
                    var v3 = false;
                    
                    v1 = expresion(campo, RegExPattern1);
                    v2 = expresion(campo, RegExPattern2);
                    v3 = expresion(campo, RegExPattern3);
                    
                    if(v1 == true  || v2 == true || v3 == true){
                        valor = true;
                        
                        campo = document.getElementById("numOficio").value;
                        valor = expresion(campo, RegExPattern3);
                        
                        
                        if(valor == false){
                            alert('Numero de Oficio Solo puede contener numeros ejemplo: 09, 34, 5');
                            document.getElementById("numOficio").focus();
                        }else{
                            campo = document.getElementById("folio").value;
                            valor = expresion(campo, RegExPattern3);
                        
                            if(valor == false){
                                alert('Folio Solo puede contener numeros ejemplo: 09, 34, 5');
                                document.getElementById("folio").focus();
                            }
                            
                        }
                        
                        
                        
                    }else{
                        valor = false;
                        alert(errorMessage);
                        document.getElementById("importe").focus();
                    }
                    
                    
                    return valor;
            }



        
        </script>


        
        
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
                <a class="navbar-brand page-scroll" href="NuevoCLC.php" style="background: #000; color: #FFF;">Nueva Adecuacion Presupuestal</a>
                
                
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
                <div class="panel-heading">Nueva Adecuacion Presupuestal</div>
                <div class="panel-body">
                    <form class="form-inline" action="Adecuacion_Nueva.php" method="post" onsubmit="return validacion()">
                        <div class="form-group">
                            <label>Tipo</label>
                            <select class="form-control" name="tipo">
                                <option value="1">De Administracion</option>
                                <option value="2">De Finanzas</option>
                            </select>
                        </div>
                       
                        <div class="form-group">
                            <label>Importe $</label>
                            <input type="text" class="form-control " name="importe" id="importe" required="true" maxlength="30">
                           
                        </div>
                        <div class="form-group">
                            <label>Folio</label>
                            <input type="text" class="form-control " name="folio" id="folio" required="true" maxlength="10">
                        </div>
                        <div class="form-group">
                            <label>Numero de Oficio</label>
                            <input type="text" class="form-control " name="numOficio" id="numOficio" required="true" maxlength="20">
                        </div>
                        
                        <br>
                        <br>
                        <br>
                        
                        <div class="form-group">
                            <label>Tipo de Mivimiento</label>
                            <br>
                            <textarea class="form-control" rows="5" style="width: 300px;" name="tipoMovimiento"></textarea>
                        </div>
                        
                        <div class="form-group" >
                            <label>Observaciones</label>
                            <br>
                            <textarea class="form-control" rows="5" style="width: 300px;" name="observaciones"></textarea>
                        </div>
                        <br>
                        <br>
                        <br>
                        
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