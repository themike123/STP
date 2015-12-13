
<?php
        include("modelo/Lista_CLC.php");
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
        <title>CLCs</title>
    </head>
    <body>
      
        
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        <?php
            $lista = new Lista_CLC($_SESSION['cuentaUsuario']->getId_Universidad());
        ?>
        
        
        <?php
            for($i=0; $i<$lista->size(); $i++){
                
                $id = $lista->getListaCLC($i)->getId();
                
                
                
                
                
                
              echo( " <div class='container '>");
               
               
                 if($lista->getListaCLC($i)->getTipo() == 1){
                     echo( " <div class='panel panel-primary'>");
                     echo("<div class='panel-heading'>Folio : ".$lista->getListaCLC($i)->getFolio()."<div style='float: right;'>Fecha Creación : ".$lista->getListaCLC($i)->getFecha()."</div></div>");
                 }else{
                     echo( " <div class='panel panel-primary' style='border-color: #AA0000;'>");
                     echo("<div class='panel-heading' style='background: #AA0000;'>Folio : ".$lista->getListaCLC($i)->getFolio()."<div style='float: right;'>Fecha Creación : ".$lista->getListaCLC($i)->getFecha()."</div></div>");
                 }
            
            echo("<div class='panel-body'>");
            
            
            
               echo(" <div class='well well-sm tam' >");
                 echo( "  <h4>Tipo Operación</h4>");
                 
                 $tipoTramiteClc = "No Asignado";
                 
                 if($lista->getListaCLC($i)->getTipo() == 1){
                     $tipoTramiteClc = "Servicios Personales";
                 }else if($lista->getListaCLC($i)->getTipo() == 2){
                     $tipoTramiteClc = "Impuestos";
                 }
                 
                  echo(  "<p>".$tipoTramiteClc."</p>");
              echo( " </div>");
            
            
               
               echo(" <div class='well well-sm tam' >");
                 echo( "  <h4>Importe</h4>");
                  echo(  "<p>$".$lista->getListaCLC($i)->getImporte()."</p>");
              echo( " </div>");
              
              
             echo(  " <div class='well well-sm tam' >");
                echo(    "<h4>Cere</h4>");
               echo(     "<p>".$lista->getListaCLC($i)->getCere()."</p>");
             echo(  " </div>");
              echo(  "<div class='well well-sm tam' >");
               echo(  "   <h4>Tipo de Movimiento</h4>");
               echo(   "  <p>".$lista->getListaCLC($i)->getTipoMovimiento()."</p>");
             echo(  " </div>");
              echo(  "<div class='well well-sm tam' >");
             echo(    "   <h4>Observaciones</h4>");
               echo(   "  <p>".$lista->getListaCLC($i)->getObservaciones()."</p>");
              echo(  "</div>");
                
          echo(  "</div>");
          echo( " <div class='panel-footer'>");
          
          
          echo( "<a href = 'ActualizarCLC.php?id=$id&folio=".$lista->getListaCLC($i)->getFolio()."&tipoclc=".$lista->getListaCLC($i)->getTipo()."&importe=".$lista->getListaCLC($i)->getImporte()."&cere=".$lista->getListaCLC($i)->getCere()."&tipo=".$lista->getListaCLC($i)->getTipoMovimiento()."&observaciones=".$lista->getListaCLC($i)->getObservaciones()."'>");
            echo( "    <button type='button' class='btn btn-outline btn-primary'>Actualizar</button>");
          
          
           echo(  "  <button onclick='Eli($id)' type='button' class='btn btn-outline btn-danger' style='margin-right: 20px;'>Eliminar</button>");
           
           
           echo("<b>".$_SESSION['cuentaUsuario']->getUniversidad()."</b>");
           
          echo( " </div>");
      echo( " </div>");
       echo(" </div>");
        echo(" <br>"); 
        echo(" <br>"); 
        echo(" <br>"); 
                
            }
        ?>
        

        
        
            <script>
            function Eli(id){
                
                if(confirm("Esta seguro que desea Eliminar el ClC")){
                    window.location.href="EliminarCLC.php?id="+id;
                }
             
            }
        </script>
    </body>
</html>


