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
                        <li><a href="<?= $_SERVER['PHP_SELF'] ?>?module=site&controller=site&action=logout"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Salir</a></li>
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