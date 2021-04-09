<?php

    require_once 'transaccion.php';
    require_once '../helpers/utilities.php';
    require_once '../FileHandler/jsonFileHandler.php'; 
    require_once 'serviceFile.php';

    $service = new serviceFile();

    $containId = isset($_GET["id"]);

    if ($containId) {
        $service->delete($_GET["id"]); 
    }

    header("Location: ../index.php");
    exit();
