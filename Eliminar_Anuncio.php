
<?php
            include("modelo/Anuncio.php");
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
            
            
            $nuevo = new Anuncio($id, NULL);
            $res = $nuevo->eliminarAnuncio();
            
            if($res == 0){
                header('Location: PaginaAnuncio.php');
            }else{
                header('Location: PaginaAnuncio.php?eliminado=1');
            }
            
    }else{
        header('Location: PaginaAnuncio.php');
    }
            
       
?>