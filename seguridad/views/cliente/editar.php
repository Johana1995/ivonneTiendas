<?php
include 'layout/header.php'
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <p><a href="<?= $_SERVER['PHP_SELF'] ?>?module=<?=$module?>&controller=<?=$controller?>&action=listar">Listar <?= $controller?>s</a></p>
    <form class="producto_form"   enctype="multipart/form-data" method="post">
        <div class="form-group">
            <label for="id">Personaid:</label>
            <input  type="text" class="form-control" name="persona_id" value="<?= $var->persona_id?>" >
        </div>
        <div class="form-group">
            <label for="id">id:</label>
            <input type="text"  class="form-control" name="id" value="<?= $var->id?>"  >
        </div>
        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input  type="text" class="form-control" name="apellido" value="<?= $var->apellido?>" >
        </div>
        <div class="form-group">
            <label for="apellido">Nombre :</label>
            <input type="text"  class="form-control" name="nombre" value="<?= $var->nombre?>" >
        </div>
        <div class="form-group">
            <label for="direccion">Dirección :</label>
            <input  type="text" class="form-control" name="direccion" value="<?= $var->direccion?>" >
        </div>
        <div class="form-group" style="width: 20%">
            <label for="Fecha de nacimiento">Fecha de Nacimiento :</label>
            <input type="date"  class="form-control" name="nacimiento" step="1" min="1940-01-01" max="2016-12-31" value="<?= $var->nacimiento?>" ></p>
        </div>

        <div class="form-group">
            <label for="select-genero">Genero:</label>
            <select class="dropdown"  name = "select-genero">
                <?php foreach ($generos as $g): ?>
                    <option  value="<?php echo $g->id?>"  <?php if($var->genero_id== $g->id){echo 'selected'; }?> > <?= $g->descripcion?> </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="telefono_id">Id Teléfono/Celular :</label>
            <input  type="number" class="form-control" name="telefono_id" value="<?= $var->telefono_id?>" >
        </div>
        <div class="form-group">
            <label for="direccion">Teléfono/Celular :</label>
            <input  type="number" class="form-control" name="telefono" value="<?= $var->telefono?>" >
        </div>
        <div class="form-group">
            <label for="correo">Correo Electrónico :</label>
            <input type="email" class="form-control"  name="correo" value="<?= $var->correo?>">
        </div>
        <div class="form-group">
            <label for="username">Nombre de Usuario(necesario para la autentificación):</label>
            <input type="text" class="form-control" name="username" value="<?= $var->username?>">
        </div>
        <div class="form-group">
            <label for="password">Contraseña (necesario para la autentificación):</label>
            <input type="password" class="form-control" name="password" value="<?= $var->password?>">
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="update" value="Guardar">
        </div>
    </form>
</div>
<?php
include 'layout/foot.php'
?>
