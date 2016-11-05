<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Proyecto Tiendas Ivonne</title>
</head>
<body style="background-attachment: fixed">
<div class="container">
    <form class="form-signin" action="validarSucursal.php" method="post">
        <h2 class="form-signin-heading text-center">Ingresar</h2>
        <br>
            <select class="dropdown" id = "select-sucursal" name="select-sucursal" >
                <?php foreach ($sucursales as $g): ?>
                    <option  value="<?php echo $g->id?>" > <?= $g->nombre.' Direccion:'.$g->direccion?> </option>
                <?php endforeach; ?>
            </select>
        <br><br>
            <select  class="dropdown" id = "select-caja" name="select-caja" >
                <?php foreach ($cajas as $g):  ?>
                    <option  value="<?php echo $g->id?>" > <?= $g->numero ?> </option>
                <?php endforeach; ?>
            </select>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
    </form>

    <script src="assets/js/jquery-3.1.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>