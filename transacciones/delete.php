<?php

    require_once 'transaccion.php';
    require_once '../helpers/utilities.php';
    
    require_once 'serviceCookies.php';

    $service = new serviceCookies();

    $containId = isset($_GET["id"]);

    if ($containId) {
        $service->delete($_GET["id"]); 
    }

    header("Location: ../index.php");
    exit();

?>