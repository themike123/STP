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

    $id = NULL;
    if( isset($_GET["id"]) && isset($_GET["tipoApEliminacion"]) ){
            $id = $_GET["id"];
            $tipoApEliminacion = $_GET["tipoApEliminacion"];
            //echo $id;
            
            
            $nuevoAP = new AdecuacionPresupuestal($id, NULL, NULL, NULL, NULL, NULL, NULL, $tipoApEliminacion);
            
            
            $variable = "";
            
            if($tipoApEliminacion == 1){
                $nuevoAP->setTipo(2);
                $res = $nuevoAP->cambiarTipoAdecuacionPresupuestal();
                $variable = "actualizado=1";
            }else{
                $res = $nuevoAP->eliminarAdecuacionPresupuestal();
                $variable = "eliminado=1";
            }
            
            
           
            if($res == 0){
                header('Location: MostrarAdecuacionesPresupuestales.php');
            }else{
                header('Location: MostrarAdecuacionesPresupuestales.php?'.$variable);
            }
            
    }else{
        header('Location: MostrarAdecuacionesPresupuestales.php');
    }
            
       
?>