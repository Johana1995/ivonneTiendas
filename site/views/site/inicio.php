<?php
session_start();

$app=[];
$app['title'] = 'Pagina Principal';
$app['ruta'] = '';

include 'layout/tittle.php';
include 'layout/head.php';
include 'layout/nav.php';
include 'layout/lateral.php';

?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <h2>Contenido de la pagina </h2>
</div>
<?php
include 'layout/foot.php'
?>
