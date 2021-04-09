<?php
require_once 'transaccion.php';
require_once '../layout/layout.php';
require_once '../FileHandler/IFileHandler.php'; 
require_once '../FileHandler/FileHandlerBase.php'; 
require_once '../FileHandler/csvFileHandler.php'; 
require_once '../FileHandler/SerialitationFileHandler.php'; 
require_once '../FileHandler/jsonFileHandler.php'; 
require_once '../helpers/utilities.php'; 
require_once 'serviceFile.php';

$layout = new Layout();
$service = new serviceFile();

$transaccion = null;

if (isset($_GET["id"])) {
    $transaccion = $service->GetById($_GET["id"]);
}

if (isset($_POST["transaccionId"]) && isset($_POST["Montotransaccion"]) && isset($_POST["DescriccionTransaccion"])) {

    date_default_timezone_set('America/Santo_Domingo');

    $DateAndTime = date('m-d-Y h:i:s a', time());

    $transacion = new Transaccion($_POST["transaccionId"],$_POST["Montotransaccion"],$_POST["DescriccionTransaccion"],$DateAndTime);

    $service->edit($transacion);

    header("Location: ../index.php");
}



?>


<?php echo $layout->printHeader(); ?>

<?php if ($transaccion == null) : ?>
    <h2>No existe esta transaccion</h2>
<?php else : ?>

    <form action="edit.php?>" method="POST">

        <input type="hidden" name="transaccionId" value="<?= $transaccion->Id?>">


        <div class="mb-3">
            <label for="monto" class="form-label">Monto</label>
            <input name="Montotransaccion" value="<?php echo $transaccion->Monto ?>" type="number" class="form-control" id="monto">
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion</label>
            <input name="DescriccionTransaccion" value="<?php echo $transaccion->Descriccion ?>" type="text" class="form-control" id="descripcion">
        </div>


        <a href="../index.php" class="btn btn-secondary">Volver</a>
        <button type="summit" class="btn btn-success">Guardar</button>

    </form>
<?php endif; ?>




<?php echo $layout->printFooter(); ?>