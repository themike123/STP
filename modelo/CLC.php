
<?php
            include("ClaseConexion/ConectionBD.php");
?>

<?php

class CLC {
    //put your code here
    private $id = null; 
    private $fecha = null; 
    private $importe = null; 
    private $folio = null; 
    private $tipoMovimiento = null; 
    private $cere = null; 
    private $observaciones = null;
    private $tipo = null;  
    
    
    private $conexion = null;  
    
    function __construct($id, $fecha, $importe, $folio, $tipoMovimiento, $cere, $observaciones, $tipo) {
        $this->id = $id;
        $this->fecha = $fecha;
        $this->importe = $importe;
        $this->folio = $folio;
        $this->tipoMovimiento = $tipoMovimiento;
        $this->cere = $cere;
        $this->observaciones = $observaciones;
        $this->tipo = $tipo;
    }
    
    
    public function getId() {
        return $this->id;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getImporte() {
        return $this->importe;
    }

    public function getFolio() {
        return $this->folio;
    }

    public function getTipoMovimiento() {
        return $this->tipoMovimiento;
    }

    public function getCere() {
        return $this->cere;
    }

    public function getObservaciones() {
        return $this->observaciones;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setImporte($importe) {
        $this->importe = $importe;
    }

    public function setFolio($folio) {
        $this->folio = $folio;
    }

    public function setTipoMovimiento($tipoMovimiento) {
        $this->tipoMovimiento = $tipoMovimiento;
    }

    public function setCere($cere) {
        $this->cere = $cere;
    }

    public function setObservaciones($observaciones) {
        $this->observaciones = $observaciones;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }
    
    // -----------------------------------------------------------------

    public function nuevoCLC(){
            $this->conexion = new ConectionBD();
                $this->id = $this->conexion->insertarRegistro("clc", "id, fecha, importe, folio, tipoMovimiento, cere, observaciones, tipo", "NULL, NOW(), '$this->importe', '$this->folio', '$this->tipoMovimiento', '$this->cere', '$this->observaciones', '$this->tipo'"); 
            
            $this->conexion->cerrarConexion();
            
            
    }
    
    
    public function nuevoRegistroCLC($universidad){
        
        
            $this->conexion = new ConectionBD();
                $res = $this->conexion->insertarRegistro("relacion_universidad_clc", "id, id_Universidad, id_CLC", "NULL, '$universidad', '$this->id'"); 
            $this->conexion->cerrarConexion();
            
            
    }
    
    
    public function actualizarCLC(){
            $this->conexion = new ConectionBD();
                $res = $this->conexion->actualizarRegistro("clc", "importe='$this->importe',folio='$this->folio',tipoMovimiento='$this->tipoMovimiento',cere='$this->cere',observaciones='$this->observaciones',tipo='$this->tipo'", "id = '$this->id'"); 
            
            $this->conexion->cerrarConexion();
    }
    
    public function eliminarCLC(){
        $this->conexion = new ConectionBD();
            $res = 0;
            $id = $this->id;
            $res = $this->conexion->eliminarRegistro("delete from relacion_universidad_clc WHERE id_CLC = '$id'");
            $res = $this->conexion->eliminarRegistro("delete from clc WHERE id = '$id'");
            
            $this->conexion->cerrarConexion();
            
         return $res;
    }
    
    
    
    
}


?>