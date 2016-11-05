<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crear - Cu y accion</title>
</head>
<body>

<h3>Cu y accion Nuevo</h3>

<p><a href="<?= $_SERVER['PHP_SELF'] ?>?module=seguridad&controller=cuaccion&action=listar">Listar Cu y Accion</a></p>

<form action="" method="post">

    <select  id = "select-cu" name = "select-cargo">
        <option value="null">Cargo..</option>
        <?php foreach ($ce as $c): ?>
                <option  value="<?php echo $cu->id?>" >
                    <?= $c->cargo_nombre?>
                </option>
        <?php endforeach; ?>
    </select>

    <select  id = "select-accion" name = "select-empleado">
        <option value="null">empleado....</option>
        <?php foreach ($ce as $ac): ?>
                <option  value="<?php echo $ac->id?>" >
                    <?=$ac->empleado_apellido.','. $ac->empleado_nombre?>
                </option>

        <?php endforeach; ?>
    </select>
    <br><br>
    <input type="submit" value="Crear">

</form>

</body>
</html>