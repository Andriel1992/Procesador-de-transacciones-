<?php

require_once 'transacciones/transaccion.php';
require_once 'helpers/utilities.php';
require_once 'FileHandler/IFileHandler.php';
require_once 'FileHandler/FileHandlerBase.php';
require_once 'FileHandler/csvFileHandler.php';
require_once 'FileHandler/SerialitationFileHandler.php';
require_once 'FileHandler/jsonFileHandler.php';
require_once 'transacciones/serviceFile.php';
require_once 'layout/layout.php';

$layout = new Layout(true);
$service = new serviceFile(true);

$transacciones = $service->GetList();

?>

<?php echo $layout->printHeader(); ?>


    <div class="row ">
        <div class="col-md-10"></div>
        <div class="col-md-2">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nueva-transaccion">
                Agregar Transaccion
            </button>
        </div>
    </div>


<div class="row">

    <?php if (count($transacciones) == 0) : ?>
        <h2>No hay transacciones registradas</h2>
    <?php else : ?>



        <div class="col-md-2"></div>
        <div class="col-md-8">
            <br><br>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Monto</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Fecha y hora</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($transacciones as $transaccion) : ?>

                        <tr>
                            <th scope="row"><?= $transaccion->Id ?></th>
                            <td><?= $transaccion->Monto ?></td>
                            <td><?= $transaccion->Descriccion ?></td>
                            <td><?= $transaccion->Fecha ?></td>
                            <td>
                                <a href="#" id="btn-delete" data-id="<?= $transaccion->Id?>" class="btn btn-danger">Borrar</a>
                                <a href="transacciones/edit.php?id=<?= $transaccion->Id?>" class="btn btn-warning">Editar</a>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
        <div class="col-md-2"></div>

    <?php endif; ?>


</div>

<?php echo $layout->printFooter(); ?>

<script src="assets\js\site\index\index.js"></script>

<!-- Modal -->
<div class="modal fade" id="nueva-transaccion" tabindex="-1" aria-labelledby="nuevaTransaccinLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nuevaTransaccinLabel">Nueva Transaccion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="transacciones/add.php" method="POST">
                    <div class="mb-3">
                        <label for="monto" class="form-label">Monto</label>
                        <input name="Montotransaccion" type="number" class="form-control" id="monto">
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <input name="DescriccionTransaccion" type="text" class="form-control" id="descripcion">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="summit" class="btn btn-success">Guardar</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>