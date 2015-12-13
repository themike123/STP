<?php
            include("CLC.php");
?>


<?php

class Lista_CLC {
    //put your code here
    private $listaCLC = null;
    
    function __construct($query) {
        
            $conexion1 = new ConectionBD();
            $select = $conexion1->seleccion($query);
            
            //
            
            $i=0;
            while ($filas = $select->fetch_assoc()) {
                $id = $filas["id"];
                $fecha = $filas["fecha"];
                $importe = $filas["importe"];
                $folio = $filas["folio"];
                $tipoMovimiento = $filas["tipoMovimiento"];
                $cere = $filas["cere"];
                $observaciones = $filas["observaciones"];
                $tipo = $filas["tipo"];
                $this->listaCLC[$i] = new CLC($id, $fecha, $importe, $folio, $tipoMovimiento, $cere, $observaciones, $tipo);
                $i++;
            }
            
            
            $conexion1->cerrarConexion();
    }
    
    public function getListaCLC($i) {
        return $this->listaCLC[$i];
    }
    
    public function size(){
        return count($this->listaCLC);
    }

}

?>
