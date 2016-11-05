<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crear - Rol</title>
</head>
<body>

<h3>Rol Nuevo</h3>

<p><a href="<?= $_SERVER['PHP_SELF'] ?>?module=seguridad&controller=rol&action=listar">Listar Roles</a></p>

<form action="" method="post">

    <input type="text" name="nombre" placeholder="nombres">
    <input type="text" name="descripcion" placeholder="breve descripcion del cargo..">

    <br><br>
    <input type="submit" value="Crear">

</form>

</body>
</html>