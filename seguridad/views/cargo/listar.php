<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cargo - Listar</title>
</head>
<body>

<h3>Lista de Roles</h3>

<p><a href="<?= $_SERVER['PHP_SELF'] ?>?module=seguridad&controller=rol&action=crear">Crear rol</a></p>

<table border="1" cellspacing="0" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>CARGO</th>
        <th>DESCRIPCION</th>

    </tr>

    <?php foreach ($rols as $rol): ?>

        <tr>
            <td><?= $rol->id; ?></td>
            <td><?= $rol->nombre; ?></td>
            <td><?= $rol->descripcion; ?></td>
            <td>
                <a href="<?= $_SERVER['PHP_SELF'] ?>?module=seguridad&controller=rol&action=editar&id=<?= $rol->id ?>">EDITAR</a>
                |
                <a href="<?= $_SERVER['PHP_SELF'] ?>?module=seguridad&controller=rol&action=eliminar&id=<?= $rol->id ?>">ELIMINAR</a>
            </td>
        </tr>

    <?php endforeach; ?>

</table>

</body>
</html>