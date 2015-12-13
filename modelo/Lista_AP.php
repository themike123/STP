<?php
            include("AdecuacionPresupuestal.php");
            //include("AdecuacionPresupuestal.php");
?>


<?php

class Lista_AP {
    //put your code here
    private $listasAP = null;
    
    function __construct($query) {
        
            $conexion1 = new ConectionBD();
            $select = $conexion1->seleccion($query);

            $i=0;
            while ($filas = $select->fetch_assoc()) {
                $id = $filas["id"];
                $fecha = $filas["fecha"];
                $importe = $filas["importe"];
                $folio = $filas["folio"];
                $tipoMovimiento = $filas["tipoMovimiento"];
                $noficio = $filas["numeroOficio"];
                $observaciones = $filas["observaciones"];
                $tipo = $filas["tipo"];
                $this->listasAP[$i] = new AdecuacionPresupuestal($id, $fecha, $importe, $folio, $tipoMovimiento, $noficio, $observaciones, $tipo);
                $i++;
            }
      
            $conexion1->cerrarConexion();
    }
    
    public function getListaAP($i) {
        return $this->listasAP[$i];
    }
    
    public function size(){
        return count($this->listasAP);
    }

}

?>
