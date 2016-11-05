<?php

include 'layout/header.php'
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="table-responsive">
        <h3>Lista de <?=$controller?>s</h3>
        <p><a class="btn btn-primary" href="<?= $_SERVER['PHP_SELF'] ?>?module=<?=$module?>&controller=<?=$controller?>&action=crear">Crear <?= $controller?></a></p>
    <table  class="table">
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>APELLIDO</th>
        <th>Nacimiento</th>
        <th>nit</th>

    </tr>
    <?php foreach ($empleados as $e): ?>
        <tr>
            <td><?= $e->id; ?></td>
            <td><?= $e->nombre; ?></td>
            <td><?= $e->apellido; ?></td>
            <td><?= $e->password; ?></td>
            <td><?= $e->username; ?></td>
            <td>
                <a href="<?= $_SERVER['PHP_SELF'] ?>?module=<?=$module?>&controller=<?=$controller?>&action=leer&id=<?= $e->id?>&persona_id=<?= $e->persona_id?>"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                |
                <a href="<?= $_SERVER['PHP_SELF'] ?>?module=<?=$module?>&controller=<?=$controller?>&action=editar&id=<?= $e->id?>&persona_id=<?= $e->persona_id?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                |
                <a href="<?= $_SERVER['PHP_SELF'] ?>?module=<?=$module?>&controller=<?=$controller?>&action=eliminar&id=<?= $e->id?>&persona_id=<?= $e->persona_id?>&telefono_id=<?= $e->telefono_id?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</div>
<?php
include 'layout/cuerpo.php'
?>
