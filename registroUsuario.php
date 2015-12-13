<?php
        include ('ClaseSesion/CuentaUsuario.php');
        include('ClaseConexion/ConectionBD.php');
?>



<?php
    
                
                session_start();
                
                
                if(!(isset($_POST["usuario"])) || !(isset($_POST["contrasenia"])) ){
                    echo "error";
                }else{
                                 
                    $usuario = $_POST["usuario"];
                    $contrasenia = $_POST["contrasenia"];
                
                    
                    
                    
                        $conexion1 = new ConectionBD();
                        $select = $conexion1->seleccion("SELECT * FROM vista_clase_usuario where username = '".$usuario."' And password ='".$contrasenia."'");
            
                        
                        $usuario = NULL;
                        $contrasenia = NULL;
                        
                        
                        $id = NULL;
                        $id_Usuario = NULL;
                        $id_Universidad = NULL;
                        $username = NULL;
                        $password = NULL;
                        $email = NULL;
                        $nombreUsuario = NULL;
                        $telefono = NULL;
                        $Universidad = NULL;
                        
    
                        while ($filas = $select->fetch_assoc()) {
                            $id = $filas["id"];
                            $id_Usuario = $filas["id_Usuario"];
                            $id_Universidad = $filas["id_Universidad"];
                            $usuario = $filas["username"];
                            $contrasenia = $filas["password"];
                            $email = $filas["email"];
                            $nombreUsuario = $filas["Usuario"];
                            $telefono = $filas["telefono"];
                            $Universidad = $filas["Universidad"];
                        }
            
            
                        $conexion1->cerrarConexion();
                    
                    
                        
                    if($usuario != NULL && $contrasenia != NULL){
                        $_SESSION['cuentaUsuario'] = new CuentaUsuario($id, $id_Usuario, $id_Universidad, $usuario, $contrasenia, $email, $nombreUsuario, $telefono, $Universidad);
                    }
                    
                    
                    
                    
                    header('Location: index.php');
                    
                }
                
?>