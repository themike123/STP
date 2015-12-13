<?php
/**
 * ConectionBD es la clase que conectara con nuestra base de datos.
 *
 * @author Equipo
 */
class ConectionBD {
    //Declaracion de la variable de conexion a la base de datos
    private $conexion = null;
    
    //Declaracion de las variables de conexion
    private $host = "localhost";
    private $usuario = "root";
    private $contrasenia = "";
    private $baseDatos = "stp";
    
    
    //Variable de Query para seleccionar
    private $seleccion = null;
    // Variable de Query para insertar
    private $insercion = null;
    
    public function __construct() {
        $this->conexion = new mysqli($this->host, $this->usuario, $this->contrasenia, $this->baseDatos);
        if ($this->conexion->connect_error) {
            die("Connection failed: " . $this->conexion->connect_error);
        }
        
    }
    
    public function seleccion($seleccion){
        //$this->seleccion = mysqli_query($this->conexion, $seleccion);
        $this->seleccion = $this->conexion->query($seleccion);
        return $this->seleccion;
    }
    
    
    public function cerrarConexion(){
        $this->conexion->close();
    }
    
    public function getConexion() {
        return $this->conexion;
    }

    public function insertarRegistro($tabla, $atributos, $valor){        
        $this->conexion->autocommit(FALSE);
            $query = "INSERT INTO $tabla($atributos) VALUES ($valor)";
            $stmt = $this->conexion->prepare($query);
            $stmt->execute(); 
            
            
            $error1 = $stmt->error;
            if(!$error1){
                $select = $this->seleccion("SELECT LAST_INSERT_ID()");
                $filas = $select->fetch_assoc();
                $id = $filas["LAST_INSERT_ID()"];
                $this->conexion->commit();
                
                $stmt->close();
                return $id;
            }else{
                $this->conexion->rollback();
                $stmt->close();
                return 0;
            }
    }
    
    public function actualizarRegistro($tabla, $asignacion, $condicion){
        $this->conexion->autocommit(FALSE);
            $query = "UPDATE $tabla SET $asignacion WHERE $condicion";
            $stmt = $this->conexion->prepare($query);
            $stmt->execute(); 
            
             $error1 = $stmt->error;
            if(!$error1){
                $this->conexion->commit();
                $stmt->close();
                return 1;
            }else{
                $this->conexion->rollback();
                $stmt->close();
                return 0;
            }
    }
    
    public function eliminarRegistro($query){
        $this->conexion->autocommit(FALSE);
            $stmt = $this->conexion->prepare($query);
            $stmt->execute(); 
            
             $error1 = $stmt->error;
            if(!$error1){
                $this->conexion->commit();
                $stmt->close();
                return 1;
            }else{
                $this->conexion->rollback();
                $stmt->close();
                return 0;
            }
    }
    
}


?>