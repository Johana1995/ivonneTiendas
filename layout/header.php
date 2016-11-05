<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SISTEMA VENTAS</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/datepicker3.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">

    <!--Icons-->
    <script src="assets/js/lumino.glyphs.js"></script>

    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#" ><span>Sistema De Ventas & Compras  </span>IVONNE</a>
            <a class="navbar-brand" href="#" style="font-size: small">
                <span>Sucursal :</span>
                <?php if( !empty($_SESSION['sucursal_id']))
                {echo $_SESSION['sucursal_nombre'];}
                else{ echo 'sin sucursal';} ?>
                <span>Caja :</span>
                <?php if( !empty($_SESSION['caja_id']))
                {echo $_SESSION['caja_numero'];}
                else{ echo 'sin caja';} ?>
            </a>
            <ul class="user-menu">

                <li class="dropdown pull-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
                        <?php  if( !empty($_SESSION['id'])){echo $_SESSION['nombre'].''.$_SESSION['apellido'];}else{ echo 'NO IDENTIFICADO';}?> <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Perfil</a></li>
                        <li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Configuracion</a></li>
                        <li><a href="#"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Salir</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div><!-- /.container-fluid -->
</nav>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <form role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Buscar">
        </div>
    </form>
    <ul class="nav menu">
        <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Pagina Principal</a></li>
        <li><a href="<?= $_SERVER['PHP_SELF'] ?>?module=stock&controller=producto&action=listar"> <span class="glyphicon glyphicon-tag"></span> Productos</a></li>
        <li><a href="<?= $_SERVER['PHP_SELF'] ?>?module=seguridad&controller=empleado&action=listar"> <span class="glyphicon glyphicon-tag"></span> Empleados</a></li>
        <li><a href="<?= $_SERVER['PHP_SELF'] ?>?module=movimientoProductos&controller=venta&action=crear"><span class="glyphicon glyphicon-tag"></span> venta</a></li>
        <li><a href="<?= $_SERVER['PHP_SELF'] ?>?module=stock&controller=producto&action=listarimagenes"><span class="glyphicon glyphicon-tag"></span> productos im</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-tag"></span> Opcion 4</a></li>
        <li class="parent ">
            <a href="#">
                <span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Otras Opciones
            </a>
            <ul class="children collapse" id="sub-item-1">
                <li>
                    <a class="" href="#">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Opcion 1
                    </a>
                </li>
                <li>
                    <a class="" href="#">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Opcion 2
                    </a>
                </li>
                <li>
                    <a class="" href="#">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Opcion 3
                    </a>
                </li>
            </ul>
        </li>
      </ul>

</div><!--/.sidebar-->
