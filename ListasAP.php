<?php
        include("modelo/Lista_AP.php");
        include ('ClaseSesion/CuentaUsuario.php');
?>

   
    <?php
    
        session_start();//siempre iniciar sesion antes que todo
        //si las variables tienen valores entonces ingresa y mira el contenido
        
        if( !(isset($_SESSION['cuentaUsuario'])) ){
            header('Location: login.php');
        }
        
        if( $_SESSION['cuentaUsuario']->getId_Usuario() == 1 ){
            header('Location: index.php');
        }
        
    ?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <script src="JSExtras/jquery-1.6.2.min.js" type="text/javascript"></script>
        <script src="JSExtras/Validacion.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="CSSExtras/estilos.css">
        <script src="jquery-1.11.3.min.js"></script>
        <title>CLCs</title>
    </head>
    <body>
        
        <p></p>
        <p></p>
        
        <?php
        
            $idU = $_SESSION['cuentaUsuario']->getId_Universidad();
            
            
            
            //$consulta = "SELECT adecuacionpresupuestal.* FROM adecuacionpresupuestal";
            $consulta = "";
            $busco = "";
            $tipoclc = "";
            $anio = "";
            $datoBuscar = 0;
            $datotipoCLC = 0;
            $datoAnio = 0;
            
           ///////////////////////////////////////////////////////////////////////////
            
            
            if(isset($_POST["busqueda"])){
                $busco = $_POST["busqueda"];
                $datoBuscar = 1;
            }
                
            
            
            
            if(isset($_POST["tipoclc"])){
                $tipoclc= $_POST["tipoclc"];
                
                if($tipoclc > 0){
                    //$consulta = "SELECT clc.* FROM clc,  relacion_universidad_clc, universidad WHERE (relacion_universidad_clc.id_CLC = clc.id) AND  (relacion_universidad_clc.id_Universidad = universidad.id) AND (universidad.id = '$idU') AND (clc.tipo = '$tipoclc')";
                    $datotipoCLC = 1;
                }
                    //$consulta = "SELECT clc.* FROM clc,  relacion_universidad_clc, universidad WHERE (relacion_universidad_clc.id_CLC = clc.id) AND  (relacion_universidad_clc.id_Universidad = universidad.id) AND (universidad.id = '$idU')";
                
            }
          
            
            
            if(isset($_POST["anio"])){
                $anio = $_POST["anio"];
                
                if($anio > 0){
                    $datoAnio = 1;
                }
            }
            
            
            
            if($datoBuscar == 1){
                
                $consulta = "SELECT adecuacionpresupuestal.* FROM adecuacionpresupuestal,  relacion_universidad_adecuacionpresupuestal, universidad WHERE (relacion_universidad_adecuacionpresupuestal.id_AdecuacionPresupuestal = adecuacionpresupuestal.id) AND  (relacion_universidad_adecuacionpresupuestal.id_Universidad = universidad.id) AND (universidad.id = '$idU') AND ( (adecuacionpresupuestal.id LIKE '%$busco%') OR (adecuacionpresupuestal.importe LIKE '%$busco%') OR (adecuacionpresupuestal.folio LIKE '%$busco%') OR (adecuacionpresupuestal.tipoMovimiento LIKE '%$busco%')  OR  (adecuacionpresupuestal.observaciones LIKE '%$busco%') OR (adecuacionpresupuestal.numeroOficio LIKE '%$busco%')           ) ORDER BY adecuacionpresupuestal.fecha DESC";
                
                if($datotipoCLC == 1){
                    $consulta = "SELECT adecuacionpresupuestal.* FROM adecuacionpresupuestal,  relacion_universidad_adecuacionpresupuestal, universidad WHERE (relacion_universidad_adecuacionpresupuestal.id_AdecuacionPresupuestal = adecuacionpresupuestal.id) AND  (relacion_universidad_adecuacionpresupuestal.id_Universidad = universidad.id) AND (universidad.id = '$idU') AND (adecuacionpresupuestal.tipo = '$tipoclc') AND ( (adecuacionpresupuestal.id LIKE '%$busco%') OR (adecuacionpresupuestal.importe LIKE '%$busco%') OR (adecuacionpresupuestal.folio LIKE '%$busco%') OR (adecuacionpresupuestal.tipoMovimiento LIKE '%$busco%') OR (adecuacionpresupuestal.numeroOficio LIKE '%$busco%') OR  (adecuacionpresupuestal.observaciones LIKE '%$busco%')     ) ORDER BY adecuacionpresupuestal.fecha DESC";
                    
                    if($datoAnio == 1){
                       $consulta = "SELECT adecuacionpresupuestal.* FROM adecuacionpresupuestal,  relacion_universidad_adecuacionpresupuestal, universidad WHERE (relacion_universidad_adecuacionpresupuestal.id_AdecuacionPresupuestal = adecuacionpresupuestal.id) AND  (relacion_universidad_adecuacionpresupuestal.id_Universidad = universidad.id) AND (universidad.id = '$idU') AND (adecuacionpresupuestal.tipo = '$tipoclc') AND (adecuacionpresupuestal.fecha LIKE '$anio%') AND ( (adecuacionpresupuestal.id LIKE '%$busco%') OR (adecuacionpresupuestal.importe LIKE '%$busco%') OR (adecuacionpresupuestal.folio LIKE '%$busco%') OR (adecuacionpresupuestal.tipoMovimiento LIKE '%$busco%') OR (adecuacionpresupuestal.numeroOficio LIKE '%$busco%') OR  (adecuacionpresupuestal.observaciones LIKE '%$busco%')     ) ORDER BY adecuacionpresupuestal.fecha DESC";
                    }
                    
                }else{
                    
                    if($datoAnio == 1){
                       $consulta = "SELECT adecuacionpresupuestal.* FROM adecuacionpresupuestal,  relacion_universidad_adecuacionpresupuestal, universidad WHERE (relacion_universidad_adecuacionpresupuestal.id_AdecuacionPresupuestal = adecuacionpresupuestal.id) AND  (relacion_universidad_adecuacionpresupuestal.id_Universidad = universidad.id) AND (adecuacionpresupuestal.fecha LIKE '$anio%') AND (universidad.id = '$idU') AND ( (adecuacionpresupuestal.id LIKE '%$busco%') OR (adecuacionpresupuestal.importe LIKE '%$busco%') OR (adecuacionpresupuestal.folio LIKE '%$busco%') OR (adecuacionpresupuestal.tipoMovimiento LIKE '%$busco%') OR (adecuacionpresupuestal.numeroOficio LIKE '%$busco%') OR  (adecuacionpresupuestal.observaciones LIKE '%$busco%')              ) ORDER BY adecuacionpresupuestal.fecha DESC";
                    }
                    
                }
            }else{
                
                if($datotipoCLC == 1){
                    $consulta = "SELECT adecuacionpresupuestal.* FROM adecuacionpresupuestal,  relacion_universidad_adecuacionpresupuestal, universidad WHERE (relacion_universidad_adecuacionpresupuestal.id_AdecuacionPresupuestal = adecuacionpresupuestal.id) AND  (relacion_universidad_adecuacionpresupuestal.id_Universidad = universidad.id) AND (universidad.id = '$idU') AND (adecuacionpresupuestal.tipo = '$tipoclc') ORDER BY adecuacionpresupuestal.fecha DESC";
                    
                    
                    if($datoAnio == 1){
                        $consulta = "SELECT adecuacionpresupuestal.* FROM adecuacionpresupuestal,  relacion_universidad_adecuacionpresupuestal, universidad WHERE (relacion_universidad_adecuacionpresupuestal.id_AdecuacionPresupuestal = adecuacionpresupuestal.id) AND  (relacion_universidad_adecuacionpresupuestal.id_Universidad = universidad.id) AND (universidad.id = '$idU') AND (adecuacionpresupuestal.tipo = '$tipoclc') AND (adecuacionpresupuestal.fecha LIKE '$anio%') ORDER BY adecuacionpresupuestal.fecha DESC";
                    }
                    
                }else{
            
                    if($datoAnio == 1){
                        $consulta = "SELECT adecuacionpresupuestal.* FROM adecuacionpresupuestal,  relacion_universidad_adecuacionpresupuestal, universidad  WHERE (relacion_universidad_adecuacionpresupuestal.id_AdecuacionPresupuestal = adecuacionpresupuestal.id) AND  (relacion_universidad_adecuacionpresupuestal.id_Universidad = universidad.id) AND (adecuacionpresupuestal.fecha LIKE '$anio%') AND (universidad.id = '$idU') ORDER BY adecuacionpresupuestal.fecha DESC";
                    }else{
                        $consulta = "SELECT adecuacionpresupuestal.* FROM adecuacionpresupuestal,  relacion_universidad_adecuacionpresupuestal, universidad  WHERE (relacion_universidad_adecuacionpresupuestal.id_AdecuacionPresupuestal = adecuacionpresupuestal.id) AND  (relacion_universidad_adecuacionpresupuestal.id_Universidad = universidad.id) AND (universidad.id = '$idU') ORDER BY adecuacionpresupuestal.fecha DESC";
                    }
                }
            }
            ///////////////////////////////////////////////////
        ?>

        <?php
            $lista = new Lista_AP($consulta);
        ?>
        
        
        <?php
            for($i=0; $i<$lista->size(); $i++){
                
                $id = $lista->getListaAP($i)->getId();

              echo( " <div class='container '>");
               
               
                 if($lista->getListaAP($i)->getTipo() == 1){
                     echo( " <div class='panel panel-primary'>");
                     echo("<div class='panel-heading'>Folio : ".$lista->getListaAP($i)->getFolio()."<div style='float: right;'>Fecha Creación : ".$lista->getListaAP($i)->getFecha()."</div></div>");
                 }else{
                     echo( " <div class='panel panel-primary' style='border-color: #AA0000;'>");
                     echo("<div class='panel-heading' style='background: #AA0000;'>Folio : ".$lista->getListaAP($i)->getFolio()."<div style='float: right;'>Fecha Creación : ".$lista->getListaAP($i)->getFecha()."</div></div>");
                 }
                 
                 
                $tipoApEliminacion = $lista->getListaAP($i)->getTipo();
            
            echo("<div class='panel-body'>");
            
            
            
               echo(" <div class='well well-sm tam' >");
                 echo( "  <h4>Tipo Operación</h4>");
                 
                 $tipoTramiteAP = "No Asignado";
                 
                 if($lista->getListaAP($i)->getTipo() == 1){
                     $tipoTramiteAP = "Administracion";
                 }else if($lista->getListaAP($i)->getTipo() == 2){
                     $tipoTramiteAP = "Financiero";
                 }
                 
                  echo(  "<p>".$tipoTramiteAP."</p>");
              echo( " </div>");
            
            
               
               echo(" <div class='well well-sm tam' >");
                 echo( "  <h4>Importe</h4>");
                  echo(  "<p>$".$lista->getListaAP($i)->getImporte()."</p>");
              echo( " </div>");
              
             
              echo(  "<div class='well well-sm tam' >");
               echo(  "   <h4>Tipo de Movimiento</h4>");
               echo(   "  <p>".$lista->getListaAP($i)->getTipoMovimiento()."</p>");
             echo(  " </div>");
             
             echo(  "<div class='well well-sm tam' >");
              echo(  "   <h4>Numero de Oficio</h4>");
             echo(   "  <p>".$lista->getListaAP($i)->getNumeroOficio()."</p>");
             echo(  " </div>");
             
             
              echo(  "<div class='well well-sm tam' >");
             echo(    "   <h4>Observaciones</h4>");
               echo(   "  <p>".$lista->getListaAP($i)->getObservaciones()."</p>");
              echo(  "</div>");
                
          echo(  "</div>");
          echo( " <div class='panel-footer'>");
          
          
          echo( "<a href = 'ActualizarAdecuacion.php?id=$id&folio=".$lista->getListaAP($i)->getFolio()."&tipoadecuacion=".$lista->getListaAP($i)->getTipo()."&importe=".$lista->getListaAP($i)->getImporte()."&numeroOficio=".$lista->getListaAP($i)->getNumeroOficio()."&tipo=".$lista->getListaAP($i)->getTipoMovimiento()."&observaciones=".$lista->getListaAP($i)->getObservaciones()."'>");
            echo( "    <button type='button' class='btn btn-outline btn-primary'>Actualizar</button>");
          echo( "</a>");
          
           echo(  "  <button onclick='Eli($id, $tipoApEliminacion)' type='button' class='btn btn-outline btn-danger' style='margin-right: 20px;'>Eliminar</button>");
           
           
           echo("<b>".$_SESSION['cuentaUsuario']->getUniversidad()."</b>");
           
          echo( " </div>");
      echo( " </div>");
       echo(" </div>");
        echo(" <br>"); 
        echo(" <br>"); 
        echo(" <br>"); 
                
            }
        ?>
        
    </body>
</html>
