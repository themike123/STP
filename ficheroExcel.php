
<?php

header("Content-type: application/vnd.ms-excel; name='excel'");
header("Content-Disposition: filename=ficheroExcel.xls");
header("Pragma: no-cache");
header("Expires: 0");

?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
<style>
table {
    border-collapse: collapse;
    font-size: medium;
}

table, td, th {
    border: 1px solid #000000;
}

th {
    background-color: #2aabd2;
    color: #FFF;
}


</style>


        <title>CLCs</title>
    </head>
    <body>


<?php
/*
header("Content-type: application/vnd.ms-excel; name='excel'");
header("Content-Disposition: filename=ficheroExcel.xls");
header("Pragma: no-cache");
header("Expires: 0");*/

echo $_POST['datos_a_enviar'];
?>

    </body>
</html>