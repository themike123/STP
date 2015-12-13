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

    
    //session_start();

    
    /*$folio = $_POST["folio"]; 	
    $tipoMovimiento = $_POST["tipoMovimiento"];
    $cere = $_POST["cere"];
    $observaciones = $_POST["observaciones"];
    $tipo = $_POST["tipo"];
*/
    
    if( !isset($_POST["nombre"]) || !isset($_POST["email"]) || !isset($_POST["telefono"]) || !isset($_POST["username"]) || !isset($_POST["password"]) || !isset($_POST["universidad"]) ){
        header('Location: MostrarUsuarios.php');
    }else{
        $nombre = $_POST["nombre"];
        $email = $_POST["email"]; 
        $telefono = $_POST["telefono"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $universidad  =$_POST["universidad"];
        
        /*echo "<br />Importe: $importe";
        echo "<br />folio: $folio";
        echo "<br />tipo Movimiento: $tipoMovimiento";
        echo "<br />Cere: $cere";
        echo "<br />Ob: $observaciones";
        echo "<br />tipo: $tipo";
         */
        
        $conexion1 = new ConectionBD();
        $select = $conexion1->seleccion("SELECT nombre FROM usuario where username = '$username'");
        
        $us = NULL;
        $id = NULL;
        
        while ($filas = $select->fetch_assoc()) {
            $us = $filas["nombre"];
        }
        
        if($us != NULL){
            header('Location: NuevoUsuario.php?b=false');
        }else{
        
        
            $select = $conexion1->seleccion("SELECT id FROM universidad where nombre = '$universidad'");


            while ($filas = $select->fetch_assoc()) {
                $id = $filas["id"];
            }

            $conexion1->cerrarConexion();


            $nuevoUsario = new Usuario(NULL,$nombre,$email,$telefono,$username,$password);
            $nuevoUsario->nuevoUsuario();




            $nuevoUsario->nuevoRegistroUsuario($universidad);


            header('Location: MostrarUsuarios.php?b=1');
        }
            
        
    }
    
    
    
    //$nuevoCLC = new CLC(NULL, NULL, $importe, $folio, $tipoMovimiento, $cere, $observaciones, $tipo);
    //$nuevoCLC->nuevoCLC();
    
?>