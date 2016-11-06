<?php

include 'layout/tittle.php';
include 'layout/head.php';
include 'layout/nav.php';
include 'layout/lateral.php';

?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <p><a href="<?= $_SERVER['PHP_SELF'] ?>?module=<?=$module?>&controller=<?=$controller?>&action=listar">Listar <?= $controller?>s</a></p>
    <form class="producto_form"  enctype="multipart/form-data" method="post">
    <div class="form-group">
        <label for="codigobarra">Código Barra:</label>
        <input type="text" class="form-control" name="codigobarra">
    </div>
    <div class="form-group">
        <label for="codigo">Código:</label>
        <input type="text" class="form-control" name="codigo">
    </div>
    <div class="form-group">
        <label for="detalle">Detalle:</label>
        <textarea type="text" class="form-control" name="detalle"></textarea>
    </div>
    <div class="form-group">
        <label for="precioFabricaU">precioFabricaU:</label>
        <input type="number" class="form-control" name="precioFabricaU">
    </div>
    <div class="form-group">
        <label for="cantidadPackin">cantidadPackin:</label>
        <input type="number" class="form-control" name="cantidadPackin">
    </div>
    <div class="form-group">
        <label for="precioFabricaPack">precioFabricaPack:</label>
        <input type="number" class="form-control" name="precioFabricaPack">
    </div>
    <div class="form-group">
        <label for="precioUnidadVenta">precioUnidadVenta:</label>
        <input type="number" class="form-control" name="precioUnidadVenta">
    </div>
    <div class="form-group">
        <label for="precioPackinVenta">precioPackinVenta:</label>
        <input type="number" class="form-control" name="precioPackinVenta">
    </div>
    <div class="form-group">
        <select  class="dropdown"  name="depto_id" >
            <?php foreach ($deptos as $g):  ?>
                <option  value="<?php echo $g->id?>" > <?= $g->descripcion ?> </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <input  type="submit" name="crear" value="crear">
    </div>
</form>
</div>

<?php
include 'assets/js/script_footer.php';
include 'layout/foot.php'
?>
