<?php

    require_once 'transaccion.php';
    require_once '../helpers/utilities.php';
    require_once '../FileHandler/IFileHandler.php';
    require_once '../FileHandler/FileHandlerBase.php'; 
    require_once '../FileHandler/csvFileHandler.php';  
    require_once '../FileHandler/SerialitationFileHandler.php'; 
    require_once '../FileHandler/jsonFileHandler.php'; 
    require_once 'serviceFile.php';

    $service = new serviceFile();

    $containId = isset($_GET["id"]);

    if ($containId) {
        $service->delete($_GET["id"]); 
    }

    header("Location: ../index.php");
    exit();
