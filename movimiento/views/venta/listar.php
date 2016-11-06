<?php

include 'layout/tittle.php';
include 'layout/head.php';
include 'layout/nav.php';
include 'layout/lateral.php';

?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="table-responsive">
        <h3>Lista de <?php echo $module; ?>s</h3>
        <p><a href="<?= $_SERVER['PHP_SELF'] ?>?module=<?=$module?>&controller=<?=$controller?>&action=crear">Crear <?= $controller?></a></p>
        <table  class="table">
            <tr>
                <th>NUMERO</th>
                <th>FECHA</th>
                <th>TOTAL</th>
                <th>DESCU</th>
                <th>EMPLEADO</th>
            </tr>
            <?php foreach  ($ventas as $p): ?>
                <tr>
                    <td><?= $p->numero; ?></td>
                    <td><?php echo $p->fechahora;?></td>
                    <td><?= $p->total; ?></td>
                    <td><?= $p->descuento; ?></td>
                    <td><?= $p->nombre.' '.$p->apellido; ?></td>
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



</div>
<?php
include 'layout/foot.php'
?>
