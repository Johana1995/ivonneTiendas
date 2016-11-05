<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location:login.php");
}
$app=[];
$app['title'] = 'Pagina Principal';
$app['ruta'] = '';
include 'layout/header.php'
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <h2>Contenido de la pagina </h2>
</div>
<?php
include 'layout/cuerpo.php'
?>
