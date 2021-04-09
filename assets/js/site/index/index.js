$(document).ready(function () {

    $("#btn-delete").on("click", function () {

        let id = $(this).data("id");

        if (confirm("Esta seguro que desea eliminar este transaccion?")) {

            if (id !== null && id !== undefined && id !== "") {
                window.location.href = "transacciones/delete.php?id=" + id;
            }

        }

    });
 



});