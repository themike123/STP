<?php
            include("Universidad.php");
?>

<?php

class ListaUniversidades {
    private $ListaUniversidades = NULL;
    private $tipoReporte = NULL;
    
    public function __construct($query, $tipoReporte) {
        $conexion1 = new ConectionBD();
            $select = $conexion1->seleccion($query);
            
            //
            
            $i=0;
            
            while ($filas = $select->fetch_assoc()) {
                $id = $filas["id"];
                $nombre = $filas["nombre"];
                $this->ListaUniversidades[$i] = new Universidad($id, $nombre);
                //$this->ListaUniversidades[$i]->generarCLC();
                $i++;
            }
            
            
            $conexion1->cerrarConexion();
            $this->tipoReporte = $tipoReporte;
            
            
    }
    
    public function getLista_Universidades($i) {
        return $this->ListaUniversidades[$i];
    }

    public function size(){
        return count($this->ListaUniversidades);
    }

    public function generarlistaCLC(){
        for($i=0; $i<$this->size(); $i++){
            $this->ListaUniversidades[$i]->generarCLC($this->tipoReporte);
        }
    }
    
    public function generarlistaAP(){
        for($i=0; $i<$this->size(); $i++){
            $this->ListaUniversidades[$i]->generarAP();
        }
    }

}
