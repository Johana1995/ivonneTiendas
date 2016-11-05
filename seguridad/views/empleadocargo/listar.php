<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Caso De Uso y Acciones - Listar</title>
</head>
<body>

<h3>Lista de Caso de Usos y acciones </h3>

<p><a href="<?= $_SERVER['PHP_SELF'] ?>?controller=cuaccion&action=crear">Crear Caso de usoUso y accion</a></p>

<table border="1" cellspacing="0" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>CARGO</th>
        <th>EMPLEADO</th>
    </tr>

    <?php foreach ($ce as $c): ?>

        <tr>
            <td><?= $c->id; ?></td>
            <td><?= $c->cargo_nombre; ?></td>
            <td><?=$c->empleado_apellido.','. $c->empleado_nombre; ?></td>
            <td>
                <a href="<?= $_SERVER['PHP_SELF'] ?>?module=controller=cuaccion&action=eliminar&id=<?= $c->id ?>">ELIMINAR</a>
            </td>
        </tr>

    <?php endforeach; ?>

</table>

</body>
</html>