<?php
            include("Usuario.php");
?>


<?php

class Lista_Usuario {
    //put your code here
    private $listaUsuario = null;
    
    function __construct($query) {
        
            $conexion1 = new ConectionBD();
            $select = $conexion1->seleccion($query);
            
            //
            
            $i=0;
            while ($filas = $select->fetch_assoc()) {
                $id = $filas["id"];
                $username = $filas["username"];
                $password = $filas["password"];
                $email = $filas["email"];
                $nombre = $filas["nombre"];
                $telefono = $filas["telefono"];
                
                $this->listaUsuario[$i] = new Usuario($id, $nombre, $email, $telefono, $username, $password);
                $i++;
            }
            
            
            $conexion1->cerrarConexion();
    }
    
    public function getListaUsuario($i) {
        return $this->listaUsuario[$i];
    }
    
    public function size(){
        return count($this->listaUsuario);
    }

}

?>