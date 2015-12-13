
<?php
        include("modelo/Lista_CLC.php");
?>


<?php

class Universidad {
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
    
    public function generarCLC($tipoReporte){
        $this->listaCLC = new Lista_CLC("SELECT clc.* FROM clc,  relacion_universidad_clc, universidad  WHERE (relacion_universidad_clc.id_CLC = clc.id) AND  (relacion_universidad_clc.id_Universidad = universidad.id) AND (universidad.id = '$this->id')  AND (clc.tipo = '$tipoReporte') ORDER BY clc.fecha DESC");
    }
    
    public function generarAP(){
        $this->listaAP = new Lista_AP("SELECT adecuacionpresupuestal.* FROM adecuacionpresupuestal,  relacion_universidad_adecuacionpresupuestal, universidad  WHERE (relacion_universidad_adecuacionpresupuestal.id_AdecuacionPresupuestal = adecuacionpresupuestal.id) AND  (relacion_universidad_adecuacionpresupuestal.id_Universidad = universidad.id) AND (universidad.id = '$this->id') ORDER BY adecuacionpresupuestal.fecha DESC");
    }
    
}

?>
