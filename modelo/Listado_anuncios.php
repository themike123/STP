<?php
            include("Anuncio.php");
?>


<?php

class Listado_anuncios{
    //put your code here
    private $listaAnuncio = null;
    
    function __construct($query) {
        
            $conexion1 = new ConectionBD();
            $select = $conexion1->seleccion($query);
            
            //
            
            $i=0;
            while ($filas = $select->fetch_assoc()) {
                $id = $filas["id"];
                $con= $filas["contenido"];
                $this->listaAnuncio[$i] = new Anuncio($id, $con);
                $i++;
            }
            
            
            $conexion1->cerrarConexion();
    }
    
    public function getListaAnuncio($i) {
        return $this->listaAnuncio[$i];
    }
    
    public function size(){
        return count($this->listaAnuncio);
    }

}

?>