<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar - Rol</title>
</head>
<body>
<h3>Editar Rol</h3>

<p><a href="<?= $_SERVER['PHP_SELF'] ?>?module=seguridad&controller=rol&action=listar">Listar Roles</a></p>

<form action="" method="post">

    <input type="hidden" name="id" value="<?= $rol->id ?>">

    <input type="text" name="nombre" value="<?= $rol->nombre ?>">
    <input type="text" name="nombre"  value="<?= $rol->descripcion ?>">
    <br><br>
    <input type="submit" value="Actualizar" name="update">
</form>

</body>
</html>