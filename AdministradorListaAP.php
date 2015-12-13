<?php
        include("modelo/Lista_Universidades_AP.php");
        include ('ClaseSesion/CuentaUsuario.php');
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
        
            
   <?php
    
        session_start();//siempre iniciar sesion antes que todo
        //si las variables tienen valores entonces ingresa y mira el contenido
        
        if( !(isset($_SESSION['cuentaUsuario'])) ){
            header('Location: login.php');
        }
        
        
        if( $_SESSION['cuentaUsuario']->getId_Usuario() != 1 ){
            header('Location: indexf.php');
        }
        
   ?>
        
        <?php
            if( !(isset($_POST["universidad"]))  || !(isset($_POST["tipoReporte"]))){
                echo "No hay valor";
            }else{
                $registroUniversidad=$_POST["universidad"];
                //echo $registroUniversidad;
                $tipoReporte = $_POST["tipoReporte"];
                
                
                if($registroUniversidad  < 1){
                    $query = "SELECT * FROM universidad";
                }else{
                    $query = "SELECT * FROM universidad WHERE ID = $registroUniversidad";
                }
            }
            
               // $query = "SELECT * FROM universidad";
        ?>
        
        <p></p>
        
        <?php
        
        /*
            $universidad = new Universidad(1, "Nova Universitas");
            $universidad->generarCLC();
            
            for($i=0; $i<$universidad->getListaCLC()->size(); $i++){
                echo "<h1>".$universidad->getListaCLC()->getListaCLC($i)->getId()."</h1>";
            }*/
        
        //echo $universidad->getLista_Universidades(0)->getListaCLC()->getListaCLC(0)->getId();
        
        
        /*$universidad = new ListaUniversidades("SELECT * FROM universidad");
        
        for($i=0; $i<$universidad->size(); $i++){
            echo "<ul>";
            echo "<li type='circle'>".$universidad->getLista_Universidades($i)->getId()." | ".$universidad->getLista_Universidades($i)->getNombre()."</li>";
            echo "<li type='circle'>Universidades #".$universidad->size()."</li>";
                
            for($j=0; $j<$universidad->getLista_Universidades($i)->getListaCLC()->size(); $j++){
            
                echo "<li type='circle'>----".$universidad->getLista_Universidades($i)->getListaCLC()->size()."</li>";
            
                echo "<li>".$universidad->getLista_Universidades($i)->getListaCLC()->getListaCLC($j)->getId()."</li>";
                echo "<li>".$universidad->getLista_Universidades($i)->getListaCLC()->getListaCLC($j)->getFecha()."</li>";
                echo "<li>".$universidad->getLista_Universidades($i)->getListaCLC()->getListaCLC($j)->getImporte()."</li>";
                echo "<li>".$universidad->getLista_Universidades($i)->getListaCLC()->getListaCLC($j)->getFolio()."</li>";
                echo "<li>".$universidad->getLista_Universidades($i)->getListaCLC()->getListaCLC($j)->getTipoMovimiento()."</li>";
                echo "<li>".$universidad->getLista_Universidades($i)->getListaCLC()->getListaCLC($j)->getCere()."</li>";
                echo "<li>".$universidad->getLista_Universidades($i)->getListaCLC()->getListaCLC($j)->getObservaciones()."</li>";
                echo "<li>---------------------------------------</li>";
            }
            echo "</ul>";
        }
        */
        ?>
        
        <br />
        <br />
        <br />
        
        
        
        
        <div class='container '>
            
            <div class="table-responsive">
                
                
                
            <table class="table table-bordered"  id="Exportar_a_Excel">
                <thead>
                    <tr>
                        <td style="text-align: center;"><h3>SUNEO</h3></td>
                        <td colspan="5" style="text-align: center;"><h3>SISTEMA DE UNIVERSIDADES ESTATALE DE OAXACA</h3></td>
                    </tr>
                    <tr>
                        <td colspan="6" style="text-align: center;"><h4>TRÁMITES PENDIENTES EN LA SECRETARÍA DE ADMINISTRACIÓN Y FINANZAS</h4></td>
                    </tr>
                    <tr>
                        
                        <?php if($tipoReporte == 1){ ?>
                        
                        <td colspan="6" style="text-align: center;"><h4>ADECUACINES PRESUPUESTALES DE ADMINISTACIÓN</h4></td>
                        
                        <?php }else{ ?>
                        
                            <td colspan="6" style="text-align: center;"><h4>ADECUACINES PRESUPUESTALES DE FINANZAS</h4></td>
                        
                        <?php } ?>
                        
                        
                    </tr>
                    
                <tr class="bg-primary">
                    <th  style="background-color: #337AB7; color: #FFFFFF;">Universidad</th>
                    <th  style="background-color: #337AB7; color: #FFFFFF;">Importe</th>
                    <th  style="background-color: #337AB7; color: #FFFFFF;">Folio</th>
                    <th  style="background-color: #337AB7; color: #FFFFFF;">Numero Oficio</th>
                    <th  style="background-color: #337AB7; color: #FFFFFF;">Tipo De Movimiento</th>
                    <th  style="background-color: #337AB7; color: #FFFFFF;">Observaciones</th>
                </tr>
                </thead>
                
                <tbody>
                <?php $universidad = new ListaUniversidades_AP($query, $tipoReporte); ?>
                <?php $universidad->generarlistaAP(); ?>
                
                    <?php for($i=0; $i<$universidad->size(); $i++){ ?>
                    
                
                                                <?php if($universidad->getLista_Universidades($i)->getListaAP()->size() == 0){ ?>
                                                        <tr>
                                                            <td rowspan="1"> <h3> <?php  echo $universidad->getLista_Universidades($i)->getNombre(); ?> </h3></td>
                                                            <td>  </td>
                                                            <td>  </td>
                                                            <td>  </td>
                                                            <td>  </td>
                                                            <td>  </td>
                                                        </tr>
                                                <?php } ?>
                    <?php $total = 0; ?>
                        <?php for($j=0; $j<$universidad->getLista_Universidades($i)->getListaAP()->size(); $j++){ ?>
                
                
                
                <tr>
                            <?php if($j == 0){ ?>
                    
                    <td rowspan="<?php  echo $universidad->getLista_Universidades($i)->getListaAP()->size(); ?>"> <h3> <?php  echo $universidad->getLista_Universidades($i)->getNombre(); ?> </h3> </td>
                                                
                                    
                            <?php } ?>
                                
                            <td> <?php echo $universidad->getLista_Universidades($i)->getListaAP()->getListaAP($j)->getImporte(); ?> </td> 
                            <td> <?php echo $universidad->getLista_Universidades($i)->getListaAP()->getListaAP($j)->getFolio(); ?> </td>
                            <td> <?php echo $universidad->getLista_Universidades($i)->getListaAP()->getListaAP($j)->getNumeroOficio(); ?> </td>
                            <td> <?php echo $universidad->getLista_Universidades($i)->getListaAP()->getListaAP($j)->getTipoMovimiento(); ?> </td>
                            <td> <?php echo $universidad->getLista_Universidades($i)->getListaAP()->getListaAP($j)->getObservaciones(); ?> </td>
                           <?php $total += $universidad->getLista_Universidades($i)->getListaAP()->getListaAP($j)->getImporte(); ?>
                </tr>
                        <?php } ?>
                         
                
                <tr>
                    <td colspan="6"> Total : <?php echo $total; ?></td>
                </tr>
                    <?php } ?>
                
                
                </tbody>
            </table>
                
                
                
            </div>
            
        </div>
        
        <!-- -->
        
        
        
    </body>
</html>

