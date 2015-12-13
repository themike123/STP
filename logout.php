<?php
    //iniciar sesion antes que todo
    session_start();

    //libera la sesi�n actual, elimina cualquier dato de la sesi�n.
    session_destroy();

    /* liberar�n las variables de sesi�n registradas, quitandoles el valor contenido en ellas
    si no se hace esto aunque la pagina sea cerrada siempre conservaran su valor y cualquier
    persona podra ingresar a la sesion*/
    unset($_SESSION["cuentaUsuario"]);
    //libera la sesion
    session_unset();

    //dirigirse a la pagina que se desea ver
    header('Location: index.php');


    //NOTA: ESTE CODIGO NO ELIMINA DATOS DE LAS COOKIES, EN CASO QUE LA PAGINA TENGA COOKIES
?>
