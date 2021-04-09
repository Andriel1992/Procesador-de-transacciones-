<?php 

    require_once '../helpers/utilities.php';
    
    require_once 'serviceCookies.php';

    require_once 'transaccion.php';

    $service = new serviceCookies();
    

    if(isset($_POST["Montotransaccion"]) && isset($_POST["DescriccionTransaccion"])){

        date_default_timezone_set('America/Santo_Domingo');

        $DateAndTime = date('m-d-Y h:i:s a', time());  

        

        $transacion = new Transaccion(0,$_POST["Montotransaccion"],$_POST["DescriccionTransaccion"],$DateAndTime);

        $service->Add($transacion);

        header("Location: ../index.php");
    }

?>