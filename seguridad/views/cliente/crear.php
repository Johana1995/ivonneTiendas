<?php
include 'layout/header.php'
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <p><a class="btn btn-primary" href="<?= $_SERVER['PHP_SELF'] ?>?module=<?=$module?>&controller=<?=$controller?>&action=listar">Listar <?= $controller?>s</a></p>
    <form class=""  method="post">

        <div class="form-group">
            <label for="nombre">Nombres:</label>
            <input type="text" class="form-control" name="nombre">
        </div>
        <div class="form-group">
            <label for="apellido">Apellidos:</label>
            <input type="text" class="form-control" name="apellido">
        </div>
        <div class="form-group">
            <label for="direccion">Dirección:</label>
            <textarea type="text" class="form-control" name="direccion"></textarea>
        </div>
        <div class="form-group" style="width: 20%">
            <label for="Fecha de nacimiento">Fecha de Nacimiento:</label>
            <input type="date"  class="form-control" name="nacimiento" step="1" min="1990-01-01" max="2016-12-31" value="2000-01-01" ></p>
        </div>
        <div class="form-group">
            <label for="select-genero">Genero:</label>
            <select class="dropdown"  name = "select-genero">
                <?php foreach ($generos as $g): ?>
                    <option  value="<?php echo $g->id?>"> <?= $g->descripcion?> </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="telefono_id">Teléfono:</label>
            <input type="number" class="form-control" name="telefono_id">
        </div>
        <div class="form-group">
            <label for="correo">Correo Electrónico :</label>
            <input type="email" class="form-control" placeholder="E-mail" name="correo">
        </div>
        <div class="form-group">
            <label for="username">Nombre de Usuario(necesario para la autentificación):</label>
            <input type="text" class="form-control" name="username">
        </div>
        <div class="form-group">
            <label for="password">Contraseña (necesario para la autentificación):</label>
            <input type="password" class="form-control" name="password">
        </div>

        <div class="form-group">
            <input  type="submit" name="crear" value="crear">
        </div>
    </form>
</div>
<?php
include 'layout/foot.php'
?>
