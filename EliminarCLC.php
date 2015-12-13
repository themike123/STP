
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

    $id = NULL;
    if( isset($_GET["id"])){
            $id = $_GET["id"];
            echo $id;
            
            
            $nuevoCLC = new CLC($id, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
            $res = $nuevoCLC->eliminarCLC();
            
            if($res == 0){
                header('Location: MostrarCLC.php');
            }else{
                header('Location: MostrarCLC.php?eliminado=1');
            }
            
    }else{
        header('Location: MostrarCLC.php');
    }
            
       
?>