<?php
            include("modelo/CLC.php");
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

    
    //session_start();

    
    /*$folio = $_POST["folio"]; 	
    $tipoMovimiento = $_POST["tipoMovimiento"];
    $cere = $_POST["cere"];
    $observaciones = $_POST["observaciones"];
    $tipo = $_POST["tipo"];
*/
    
    if( !isset($_POST["importe"]) || !isset($_POST["folio"]) || !isset($_POST["tipoMovimiento"]) || !isset($_POST["cere"]) || !isset($_POST["observaciones"]) || !isset($_POST["tipo"])){
        header('Location: MostrarCLC.php');
    }else{
        $importe = $_POST["importe"];
        $folio = $_POST["folio"]; 
        $tipoMovimiento = $_POST["tipoMovimiento"];
        $cere = $_POST["cere"];
        $observaciones = $_POST["observaciones"];
        $tipo = $_POST["tipo"];
        
        /*echo "<br />Importe: $importe";
        echo "<br />folio: $folio";
        echo "<br />tipo Movimiento: $tipoMovimiento";
        echo "<br />Cere: $cere";
        echo "<br />Ob: $observaciones";
        echo "<br />tipo: $tipo";
         */
        
        $terminar = 1;
        //INICIO VALIDACION FORMATOS
        
        /////////////////////////////////////////////////////////////////////////////77
        
        
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
                                $terminar = 0;
                                header('Location: NuevoCLC.php?error=1');
                        }            
                }
        }
        
        
        
        
        
        //FIN  VALIDACION FORMATOS
        
        if($terminar == 1){
        
            $nuevoCLC = new CLC(NULL, NULL, $importe, $folio, $tipoMovimiento, $cere, $observaciones, $tipo);
            $nuevoCLC->nuevoCLC();
        
        
            $universidad = $_SESSION['cuentaUsuario']->getId_Universidad();
            $nuevoCLC->nuevoRegistroCLC($universidad);
        
        
            header('Location: MostrarCLC.php?agregado=1');
            
        }
    }
    
    
    
    //$nuevoCLC = new CLC(NULL, NULL, $importe, $folio, $tipoMovimiento, $cere, $observaciones, $tipo);
    //$nuevoCLC->nuevoCLC();
    
?>
