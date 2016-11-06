<?php


require_once("libs/db.php");
require_once("libs/conexion.php");
include 'layout/tittle.php';
include 'layout/head.php';
include 'layout/nav.php';
include 'layout/lateral.php';
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="container">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h4><i class='glyphicon glyphicon-edit'></i> Nueva Venta</h4>
            </div>
            <div class="panel-body">
                <?php
                include("layout/buscar_productos.php");
                include("layout/registro_clientes.php");
                ?>
                <form class="form-horizontal" role="form" id="datos_factura">
                    <div class="form-group row">
                        <label for="nombre_cliente" class="col-md-1 control-label">Cliente</label>

                        <div class="col-md-3">
                            <input type="text" class="form-control input-sm" id="nombre_cliente"
                                   placeholder="Selecciona un cliente" required>
                            <input id="id_cliente" type='hidden'>
                        </div>
                        <label for="tel1" class="col-md-1 control-label">Teléfono</label>

                        <div class="col-md-2">
                            <input type="text" class="form-control input-sm" id="tel1" placeholder="Teléfono" readonly>
                        </div>
                        <label for="mail" class="col-md-1 control-label">Email</label>

                        <div class="col-md-3">
                            <input type="text" class="form-control input-sm" id="mail" placeholder="Email" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="empresa" class="col-md-1 control-label">Vendedor</label>

                        <div class="col-md-3">
                            <select class="form-control input-sm" id="id_vendedor">
                                <?php
                                $sql_vendedor = mysqli_query($con, "select * from listarempleados order by apellido");
                                while ($rw = mysqli_fetch_array($sql_vendedor)) {
                                    $id_vendedor = $rw["id"];
                                    $nombre_vendedor = $rw["nombre"] . " " . $rw["apellido"];
                                    ?>
                                    <option value="<?php echo $id_vendedor ?>"><?php echo $nombre_vendedor ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <label for="tel2" class="col-md-1 control-label">Fecha</label>

                        <div class="col-md-2">
                            <input type="text" class="form-control input-sm" id="fecha"
                                   value="<?php echo date("d/m/Y"); ?>" readonly>
                        </div>
                        <label for="condiciones" class="col-md-1 control-label">Pago</label>

                        <div class="col-md-3">
                            <select class='form-control input-sm' id="condiciones">
                                <option value="1">Efectivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="pull-right">
                            <button type="button" class="btn btn-default" data-toggle="modal"
                                    data-target="#nuevoCliente">
                                <span class="glyphicon glyphicon-user"></span> Nuevo cliente
                            </button>
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
                                <span class="glyphicon glyphicon-search"></span> Agregar productos
                            </button>
                            <button type="submit" class="btn btn-default">
                                <span class="glyphicon glyphicon-print"></span> Imprimir
                            </button>
                        </div>
                    </div>
                </form>

                <div id="resultados" class='col-md-12' style="margin-top:10px"></div><!-- Carga los datos ajax -->
            </div>

            <?php
            include("assets/js/script_footer.php");
            ?>
            <script>
                $(function () {
                    $("#nombre_cliente").autocomplete({
                        source: "./assets/ajax/autocomplete/clientes.php",
                        minLength: 2,
                        select: function (event, ui) {
                            event.preventDefault();
                            $('#id_cliente').val(ui.item.id_cliente);
                            $('#nombre_cliente').val(ui.item.nombre_cliente);
                            $('#tel1').val(ui.item.telefono_cliente);
                            $('#mail').val(ui.item.email_cliente);
                        }
                    });
                });
                $("#nombre_cliente").on("keydown", function (event) {
                    if (event.keyCode == $.ui.keyCode.LEFT || event.keyCode == $.ui.keyCode.RIGHT || event.keyCode == $.ui.keyCode.UP || event.keyCode == $.ui.keyCode.DOWN || event.keyCode == $.ui.keyCode.DELETE || event.keyCode == $.ui.keyCode.BACKSPACE) {
                        $("#id_cliente").val("");
                        $("#tel1").val("");
                        $("#mail").val("");

                    }
                    if (event.keyCode == $.ui.keyCode.DELETE) {
                        $("#nombre_cliente").val("");
                        $("#id_cliente").val("");
                        $("#tel1").val("");
                        $("#mail").val("");
                    }
                });
            </script>
        </div>
    </div>
</div>
<?php
//include("layout/foot.php");
?>