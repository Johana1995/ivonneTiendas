<ul class="nav menu">
    <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Pagina Principal</a></li>
    <li><a href="<?= $_SERVER['PHP_SELF'] ?>?module=stock&controller=producto&action=listar"> <span class="glyphicon glyphicon-tag"></span> Productos</a></li>
    <li><a href="<?= $_SERVER['PHP_SELF'] ?>?module=seguridad&controller=empleado&action=listar"> <span class="glyphicon glyphicon-tag"></span> Empleados</a></li>
    <li><a href="<?= $_SERVER['PHP_SELF'] ?>?module=movimiento&controller=venta&action=listar"><span class="glyphicon glyphicon-tag"></span> venta</a></li>
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

</div>