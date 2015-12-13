
<?php
            include("ClaseConexion/ConectionBD.php");
?>

<?php

class AdecuacionPresupuestal {
   
    private $id = null; 
    private $fecha = null; 
    private $importe = null; 
    private $folio = null; 
    private $tipoMovimiento = null; 
    private $numOficio = null; 
    private $observaciones = null;
    private $tipo = null;  
    
    
    private $conexion = null;  
    
    function __construct($id, $fecha, $importe, $folio, $tipoMovimiento, $numOficio, $observaciones, $tipo) {
        $this->id = $id;
        $this->fecha = $fecha;
        $this->importe = $importe;
        $this->folio = $folio;
        $this->tipoMovimiento = $tipoMovimiento;
        $this->numOficio = $numOficio;
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

    public function getNumeroOficio() {
        return $this->numOficio;
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

    public function setNumeroOficio($numOficio) {
        $this->numOficio = $numOficio;
    }

    public function setObservaciones($observaciones) {
        $this->observaciones = $observaciones;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }
    
    // -----------------------------------------------------------------

    public function nuevaAdecuacionPresupuestal(){
            $this->conexion = new ConectionBD();
            $this->id = $this->conexion->insertarRegistro("adecuacionpresupuestal", "id, fecha, importe, folio, tipoMovimiento, numeroOficio, observaciones, tipo", "NULL, NOW(), '$this->importe', '$this->folio', '$this->tipoMovimiento', '$this->numOficio', '$this->observaciones', '$this->tipo'"); 
            
            $this->conexion->cerrarConexion();

    }

    public function nuevoRegistroAdecuacion($universidad){

            $this->conexion = new ConectionBD();
                $res = $this->conexion->insertarRegistro("relacion_universidad_adecuacionpresupuestal", "id, id_Universidad, id_AdecuacionPresupuestal", "NULL, '$universidad', '$this->id'"); 
            $this->conexion->cerrarConexion();
            
            
         return $res;
  
    }
    
    public function actualizarAdecuacionPresupuestal(){
            $this->conexion = new ConectionBD();
                $res = $this->conexion->actualizarRegistro("adecuacionpresupuestal", "importe='$this->importe',folio='$this->folio',tipoMovimiento='$this->tipoMovimiento',numeroOficio='$this->numOficio',observaciones='$this->observaciones',tipo='$this->tipo'", "id = '$this->id'"); 
            
            $this->conexion->cerrarConexion();
            
            
         return $res;
    }
    
        
    public function eliminarAdecuacionPresupuestal(){
        $this->conexion = new ConectionBD();
            $res = 0;
            $id = $this->id;
            $res = $this->conexion->eliminarRegistro("delete from relacion_universidad_adecuacionpresupuestal WHERE id_AdecuacionPresupuestal = '$id'");
            $res = $this->conexion->eliminarRegistro("delete from adecuacionpresupuestal WHERE id = '$id'");
            
            $this->conexion->cerrarConexion();
            
         return $res;
    
    }
    
    
    public function cambiarTipoAdecuacionPresupuestal(){
            $this->conexion = new ConectionBD();
                $res = $this->conexion->actualizarRegistro("adecuacionpresupuestal", "tipo='$this->tipo'", "id = '$this->id'"); 
            
            $this->conexion->cerrarConexion();
            
         return $res;
    }
  
}

?>