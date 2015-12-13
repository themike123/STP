<?php
        include("modelo/AdecuacionPresupuestal.php");
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


    if( !isset($_POST["importe"]) || !isset($_POST["folio"]) || !isset($_POST["tipoMovimiento"]) || !isset($_POST["numeroOficio"]) || !isset($_POST["observaciones"]) || !isset($_POST["tipo"])){
        header('Location: MostrarAdecuacionesPresupuestales.php');
    }else{
        $id = $_POST['id'];
        $folio = $_POST['folio'];
        $tipoclc = $_POST['tipo'];
        $importe = $_POST['importe'];
        $numeroOficio = $_POST['numeroOficio'];
        $tipoMovimiento = $_POST['tipoMovimiento'];
        $observaciones = $_POST['observaciones'];
    }
?>




<?php

        
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
                                header('Location: MostrarAdecuacionesPresupuestales.php');
                        }            
                }
        }
        

    echo "<br>Id".$id;
    echo "<br>Folio".$folio;
    echo "<br>Tipo CLC".$tipoclc;
    echo "<br>Importe".$importe;
    echo "<br>NumeroOficio".$numeroOficio;
    echo "<br>Tipo Mov".$tipoMovimiento;
    echo "<br>Ob".$observaciones;
    
    
    $nuevaAdecuacion= new AdecuacionPresupuestal($id, NULL, $importe, $folio, $tipoMovimiento, $numeroOficio, $observaciones, $tipoclc);
    $nuevaAdecuacion->actualizarAdecuacionPresupuestal();
    
    header('Location: MostrarAdecuacionesPresupuestales.php?actualizado=1');

?>