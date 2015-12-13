
<?php
            include("ClaseConexion/ConectionBD.php");
?>

<?php

class Usuario {
    //put your code here
    private $id = null; 
    private $nombre= null; 
    private $email = null; 
    private $telefono = null; 
    private $username = null; 
    private $password = null; 
    
    
    
    private $conexion = null;  
    
    function __construct($id, $nombre, $email, $telefono, $username, $password) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->username = $username;
        $this->password = $password;
        
    }
    
    
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

   

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setTelefono($tel) {
        $this->telefono = $tel;
    }

    public function setUsername($usn) {
        $this->username = $usn;
    }

    public function setPassword($pwd) {
        $this->password = $pwd;
    }

  
    
    // -----------------------------------------------------------------

 
    
    public function nuevoUsuario(){
            $this->conexion = new ConectionBD();
            $this->id = $this->conexion->insertarRegistro("usuario", "id, username, password, email, nombre, telefono", "NULL, '$this->username', '$this->password', '$this->email', '$this->nombre', '$this->telefono'"); 
            
            $this->conexion->cerrarConexion();
            
            
    }
    
    
    
    
    public function nuevoRegistroUsuario($universidad){
        
        
            $this->conexion = new ConectionBD();
                $res = $this->conexion->insertarRegistro("relacion_usuario_universidad", "id, id_Usuario, id_Universidad", "NULL,  '$this->id','$universidad'"); 
            $this->conexion->cerrarConexion();
            
            
    }
    
    
    public function actualizarUsuario(){
            $this->conexion = new ConectionBD();
                $res = $this->conexion->actualizarRegistro("usuario", "username='$this->importe',folio='$this->folio',tipoMovimiento='$this->tipoMovimiento',cere='$this->cere',observaciones='$this->observaciones',tipo='$this->tipo'", "id = '$this->id'"); 
            
            $this->conexion->cerrarConexion();
    }
    
    public function eliminarUsuario(){
        $this->conexion = new ConectionBD();
            $res = 0;
            $id = $this->id;
            $res = $this->conexion->eliminarRegistro("delete from relacion_usuario_universidad WHERE id_Usuario = '$id'");
            $res = $this->conexion->eliminarRegistro("delete from usuario WHERE id = '$id'");
            
            $this->conexion->cerrarConexion();
            
         return $res;
    }
    
    
    
    
}


?>
