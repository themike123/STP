
<?php
        include("modelo/Lista_AP.php");
?>


<?php

class Universidad_AP {
    private $id = NULL;
    private $nombre = NULL;
    
    private $listaCLC = NULL;
    private $listaAP = NULL;
    
    public function __construct($id , $nombre) {
        $this->id = $id;
        $this->nombre = $nombre;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getListaCLC() {
        return $this->listaCLC;
    }

    public function getListaAP() {
        return $this->listaAP;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

        
    //------------------------------------------------------------------------
    //------------------------------------------------------------------------
    //------------------------------------------------------------------------
    //------------------------------------------------------------------------
    //------------------------------------------------------------------------
    //------------------------------------------------------------------------
    
    
    public function generarAP($tipoReporte){
        $this->listaAP = new Lista_AP("SELECT adecuacionpresupuestal.* FROM adecuacionpresupuestal,  relacion_universidad_adecuacionpresupuestal, universidad  WHERE (relacion_universidad_adecuacionpresupuestal.id_AdecuacionPresupuestal = adecuacionpresupuestal.id) AND  (relacion_universidad_adecuacionpresupuestal.id_Universidad = universidad.id) AND (universidad.id = '$this->id')  AND (adecuacionpresupuestal.tipo = '$tipoReporte') ORDER BY adecuacionpresupuestal.fecha DESC");
    }
    
}

?>

