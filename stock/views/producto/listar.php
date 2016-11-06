<?php

include 'layout/tittle.php';
include 'layout/head.php';
include 'layout/nav.php';
include 'layout/lateral.php';

?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="table-responsive">
        <h3>Lista de Productos</h3>
        <p><a href="<?= $_SERVER['PHP_SELF'] ?>?module=<?=$module?>&controller=<?=$controller?>&action=crear">Crear <?= $controller?></a></p>
        <table  class="table">
            <tr>
                <th>CODIGO</th>
                <th>DETALLE</th>
                <th>DEPARTAMENTO</th>
                <th>PRECIO U</th>
                <th>PRECIO PACK</th>
                <th>CANTIDAD PACK</th>
            </tr>
            <?php foreach  ($productos as $p): ?>
                <tr>
                    <td><?= $p->codigo; ?></td>
                    <td><?= $p->detalle; ?></td>
                    <td><?= $p->depto; ?></td>
                    <td><?= $p->precioU; ?></td>
                    <td><?= $p->precioPackete; ?></td>
                    <td><?= $p->cantidadPaquete; ?></td>
                    <td>
                        <a href="<?= $_SERVER['PHP_SELF'] ?>?module=<?=$module?>&controller=<?=$controller?>&action=r&id=<?= $p->id?>"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                        |
                        <a href="<?= $_SERVER['PHP_SELF'] ?>?module=<?=$module?>&controller=<?=$controller?>&action=editar&id=<?= $p->id?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                        |
                        <a href="<?= $_SERVER['PHP_SELF'] ?>?module=<?=$module?>&controller=<?=$controller?>&action=eliminar&id=<?= $p->id?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </table>
    </div>

    <img src="../../../img/apple-2-icon.png" alt="noimagen">




</div>
<?php
include 'layout/foot.php'
?>
