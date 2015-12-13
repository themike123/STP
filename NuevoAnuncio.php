
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
    if( isset($_GET["cont"])){
            $c = $_GET["cont"];
            echo $c;
            
            
            $nuevo = new Anuncio(NULL,$c);
            $res = $nuevo->nuevoAnuncio();
            
            if($res == 0){
                header('Location: PaginaAnuncio.php');
            }else{
                header('Location: PaginaAnuncio.php?agregado=1');
            }
            
    }else{
        header('Location: PaginaAnuncio.php');
    }
            
       
?>