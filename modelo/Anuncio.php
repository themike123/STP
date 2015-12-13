<?php
            include("ClaseConexion/ConectionBD.php");
?>

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Anuncio{
    private $id;
    private $contenido;
    private $conexion = null;  
            
    function __construct($ide,$con){
        $this->contenido=$con;   
        $this->id=$ide;
    }
    
    function getId() {
        return $this->id;
    }

    function getContenido() {
        return $this->contenido;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setContenido($contenido) {
        $this->contenido = $contenido;
    }

    public function nuevoAnuncio(){
            $this->conexion = new ConectionBD();
            $con = $this->contenido;
            $res = $this->conexion->insertarRegistro("anuncio", "id,contenido", "NULL, '$con' " ); 
            $this->conexion->cerrarConexion();
            
    }
    
        public function eliminarAnuncio(){
        $this->conexion = new ConectionBD();
            $res = 0;
            $id = $this->id;
            $res = $this->conexion->eliminarRegistro("delete from anuncio WHERE id = '$id'");
            $this->conexion->cerrarConexion();
            
         return $res;
    }
}
