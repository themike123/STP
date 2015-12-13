
<?php
            include ('ClaseSesion/CuentaUsuario.php');
        include('ClaseConexion/ConectionBD.php');
?>

   
    <?php
    
        session_start();//siempre iniciar sesion antes que todo
        //si las variables tienen valores entonces ingresa y mira el contenido
        
        if( !(isset($_SESSION['cuentaUsuario'])) ){
            header('Location: login.php');
        }
        
    ?>



<?php 

if( !(isset($_POST["id"])) && !(isset($_POST["usuario"])) && !(isset($_POST["password"])) && !(isset($_POST["email"]))  && !(isset($_POST["nombre"]))  && !(isset($_POST["telefono"]))    ){
    echo "No hay valor";
}else{
    $id_Usuario = $_POST["id"];
    $username = $_POST["usuario"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $nombreUsuario = $_POST["nombre"];
    
    
    
                        $conexion1 = new ConectionBD();
                        
                        $res = $conexion1->actualizarRegistro("usuario", "username='$username',password='$password',email='$email',nombre='$nombreUsuario',telefono='$telefono'", "id = '$id_Usuario'");
                        
                        $conexion1->cerrarConexion();
    
                   if($res == 0){
                        header('Location: perfil.php?error=1');
                   }else{
    
                        $_SESSION['cuentaUsuario']->setId_Usuario($id_Usuario);
                        $_SESSION['cuentaUsuario']->setUsername($username);
                        $_SESSION['cuentaUsuario']->setNombreUsuario($nombreUsuario);
                        $_SESSION['cuentaUsuario']->setPassword($password);
                        $_SESSION['cuentaUsuario']->setTelefono($telefono);
                        $_SESSION['cuentaUsuario']->setEmail($email);
                        
                        
                        header('Location: perfil.php');
                    
                   }
    
    
}

?>
