
<?php
    include("modelo/Usuario.php");
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


<?php

    $id = NULL;
    if( isset($_GET["id"])){
        $id = $_GET["id"];
        echo $id;
            
            
        $nuevoUsario = new Usuario($id, NULL, NULL, NULL, NULL, NULL);
        $res = $nuevoUsario->eliminarUsuario();
            
        if($res == 0){
            header('Location: MostrarUsuarios.php');
        }else{
            header('Location: MostrarUsuarios.php?eliminado=1');
        }
            
    }else{
        header('Location: MostrarCLC.php');
    }
            
       
?>
