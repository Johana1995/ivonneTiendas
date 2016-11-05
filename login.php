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
            <form class="form-signin" action="validar.php" method="post">
                <h2 class="form-signin-heading text-center">Iniciar Sesion</h2>
                <br>
                <label for="inputEmail" class="sr-only">Nombre de Usuario:</label>
                <input type="text" name="username" class="form-control" placeholder="nombre de Usuario" required autofocus>
                <label for="inputPassword" class="sr-only">Contraseña:</label>
                <input type="text" name="password" class="form-control" placeholder="Password" required>

                <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
            </form>

        </div> <!-- /container -->

<script src="assets/js/jquery-3.1.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>