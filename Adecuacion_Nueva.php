<?php
        include("modelo/AdecuacionPresupuestal.php");
        include ('ClaseSesion/CuentaUsuario.php');
?>

<?php

    
    session_start();

    
        if( !(isset($_SESSION['cuentaUsuario'])) ){
            header('Location: login.php');
        }
        
        
        if( $_SESSION['cuentaUsuario']->getId_Usuario() == 1 ){
            header('Location: index.php');
        }
        
    /*$folio = $_POST["folio"]; 	
    $tipoMovimiento = $_POST["tipoMovimiento"];
    $cere = $_POST["cere"];
    $observaciones = $_POST["observaciones"];
    $tipo = $_POST["tipo"];
*/
    
    if( !isset($_POST["importe"]) || !isset($_POST["folio"]) || !isset($_POST["tipoMovimiento"]) || !isset($_POST["numOficio"]) || !isset($_POST["observaciones"]) || !isset($_POST["tipo"])){
        echo "Variables No Enviadas";
    }else{
        $importe = $_POST["importe"];
        $folio = $_POST["folio"]; 
        $tipoMovimiento = $_POST["tipoMovimiento"];
        $numOficio = $_POST["numOficio"];
        $observaciones = $_POST["observaciones"];
        $tipo = $_POST["tipo"];
        
     
        
        //INICIO VALIDACION FORMATOS
        
        
        $patron1 = "/[0-9]+\.[0-9][0-9]$/";
        $patron2 = "/[0-9]+\.[0-9]$/";
        $patron3 = "/^\d+$/";

        if (preg_match($patron1, $importe)) {
               // print "<p>La cadena $cadena son  x.xx .</p>\n";
        } else {
                if (preg_match($patron2, $importe)) {
                        //print "<p>La cadena $cadena son  x.x .</p>\n";
                        $importe = $importe."0";
                }else{
        
                        if (preg_match($patron3, $importe)) {
                                //print "<p>La cadena $cadena son  x .</p>\n";
                                $importe = $importe.".00";
                        }else{
                                header('Location: NuevoAdecuacionPresupuestal.php?error=1');
                        }            
                }
        }
        
        
        
        
        
        
        
        
        
       
        
        
            $nuevoAdecuacion = new AdecuacionPresupuestal(NULL, NULL, $importe, $folio, $tipoMovimiento, $numOficio, $observaciones, $tipo);
            $nuevoAdecuacion->nuevaAdecuacionPresupuestal();
        
        
            $universidad = $_SESSION['cuentaUsuario']->getId_Universidad();
            $nuevoAdecuacion->nuevoRegistroAdecuacion($universidad);
        
        
            header('Location: MostrarAdecuacionesPresupuestales.php?agregado=1');

        
    }
    
    
    
    //$nuevoCLC = new CLC(NULL, NULL, $importe, $folio, $tipoMovimiento, $cere, $observaciones, $tipo);
    //$nuevoCLC->nuevoCLC();
    
?>
