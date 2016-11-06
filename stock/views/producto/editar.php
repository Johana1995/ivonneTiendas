<?php

include 'layout/tittle.php';
include 'layout/head.php';
include 'layout/nav.php';
include 'layout/lateral.php';

?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <p><a href="<?= $_SERVER['PHP_SELF'] ?>?module=<?=$module?>&controller=<?=$controller?>&action=listar">Listar <?= $controller?>s</a></p>
    <form class="producto_form"   enctype="multipart/form-data" method="post">
        <div class="form-group">
            <label for="id">Numero:</label>
            <input   class="form-control" name="id" value="<?= $producto->id?>" >
        </div>
        <div class="form-group">
            <label for="codigobarra">Código Barra:</label>
            <input type="text" class="form-control" name="codigobarra" value="<?= $producto->codigobarra?>">
        </div>
        <div class="form-group">
            <label for="codigo">Código:</label>
            <input type="text" class="form-control" name="codigo" value="<?= $producto->codigo?>">
        </div>
        <div class="form-group">
            <label for="detalle">Detalle:</label>
            <textarea type="text" class="form-control" name="detalle" ><?= $producto->detalle?></textarea>
        </div>
        <div class="form-group">
            <label for="precioFabricaU">precioFabricaU:</label>
            <input type="number" class="form-control" name="precioFabricaU" value="<?= $producto->precioFabricaU?>">
        </div>
        <div class="form-group">
            <label for="cantidadPackin">cantidadPackin:</label>
            <input type="number" class="form-control" name="cantidadPackin" value="<?= $producto->cantidadPackin?>">
        </div>
        <div class="form-group">
            <label for="precioFabricaPack">precioFabricaPack:</label>
            <input type="number" class="form-control" name="precioFabricaPack" value="<?= $producto->precioFabricaPack?>">
        </div>
        <div class="form-group">
            <label for="precioUnidadVenta">precioUnidadVenta:</label>
            <input type="number" class="form-control" name="precioUnidadVenta" value="<?= $producto->precioUnidadVenta?>">
        </div>
        <div class="form-group">
            <label for="precioPackinVenta">precioPackinVenta:</label>
            <input type="number" class="form-control" name="precioPackinVenta"  value="<?= $producto->precioPackinVenta?>" >
        </div>
        <div class="form-group">
            <label for="depto_id">depto_id:</label>
            <input type="number" class="form-control" name="depto_id" value="<?= $producto->depto_id?>">
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="update" value="Guardar">
        </div>
    </form>
</div>
<?php
include 'layout/foot.php'
?>
