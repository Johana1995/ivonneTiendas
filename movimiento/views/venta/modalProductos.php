<!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Seleccione un Producto</h4>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                      <table  class="table">
                            <tr>
                                <th>CODIGO</th>
                                <th>DETALLE</th>
                                <th>PRECIO UNIDAD</th>
                                <th>PRECIO PACK</th>
                                <th>CANT PACK</th>
                            </tr>
                            <?php foreach  ($productos as $p): ?>
    <tr>
        <td><?= $p->codigo; ?></td>
        <td ><?= $p->detalle; ?></td>
        <td><?= $p->precioU; ?></td>
        <td><?= $p->precioPackete; ?></td>
        <td><?= $p->cantidadPaquete; ?></td>
        <td>
            <a href="#"><span class="glyphicon glyphicon-share" aria-hidden="true"></span></a>
        </td>
    </tr>
<?php endforeach; ?>
</table>
</div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>

</div>
</div>
