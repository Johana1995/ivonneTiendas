<style type="text/css">
<!--
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
.midnight-blue{
	background:#2c3e50;
	padding: 4px 4px 4px;
	color:white;
	font-weight:bold;
	font-size:12px;
}
.silver{
	background:white;
	padding: 3px 4px 3px;
}
.clouds{
	background:#ecf0f1;
	padding: 3px 4px 3px;
}
.border-top{
	border-top: solid 1px #bdc3c7;
	
}
.border-left{
	border-left: solid 1px #bdc3c7;
}
.border-right{
	border-right: solid 1px #bdc3c7;
}
.border-bottom{
	border-bottom: solid 1px #bdc3c7;
}
table.page_footer {width: 100%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;}
}
-->
</style>
<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial" >
        <page_footer>
        <table class="page_footer">
            <tr>

                <td style="width: 50%; text-align: left">
                    P&aacute;gina [[page_cu]]/[[page_nb]]
                </td>
                <td style="width: 50%; text-align: right">
                    &copy; <?php echo "johana  zamora"; echo  $anio=date('Y'); ?>
                </td>
            </tr>
        </table>
    </page_footer>
    <table cellspacing="0" style="width: 100%;">
        <tr>
            <td style="width: 25%; color: #444444;">
                <img style="width: 100%;" src="../../img/logo.jpg" alt="Logo"><br>
                
            </td>
			<td style="width: 50%; color: #34495e;font-size:12px;text-align:center">
                <span style="color: #34495e;font-size:14px;font-weight:bold">Tiendas Ivonne</span>
				<br>Ramada .Av. Cañoto local 2341<br>
				Teléfono: 75517394<br>
				Email: tiendasivonne@gmail.com
                
            </td>
			<td style="width: 25%;text-align:right">
			VENTA Nº <?php echo $numero_venta;?>
			</td>
			
        </tr>
    </table>
    <br>
    

	
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
           <td style="width:50%;" class='midnight-blue'>CLIENTE :</td>
        </tr>
		<tr>
           <td style="width:50%;" >
			<?php 
				$sql_cliente=mysqli_query($con,"select * from listarclientes where cliente_id='$id_cliente'");
				$rw_cliente=mysqli_fetch_array($sql_cliente);
				echo $rw_cliente['nombre'];
				echo "<br>";
				echo $rw_cliente['apellido'];
				echo "<br> Nit: ";
				echo $rw_cliente['nit'];
				echo "<br> Nacimiento: ";
				echo $rw_cliente['nacimiento'];
			?>
		   </td>
        </tr>

    </table>
       <br>
		<table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
           <td style="width:35%;" class='midnight-blue'>VENDEDOR</td>
		  <td style="width:25%;" class='midnight-blue'>FECHA</td>
		   <td style="width:40%;" class='midnight-blue'>FORMA DE PAGO</td>
        </tr>
		<tr>
           <td style="width:35%;">
			<?php 
				$sql_user=mysqli_query($con,"select * from listarempleados where id='$id_vendedor'");
				$rw_user=mysqli_fetch_array($sql_user);
				echo $rw_user['nombre']." ".$rw_user['apellido'];
			?>
		   </td>
		  <td style="width:25%;"><?php echo date("d/m/Y");?></td>
		   <td style="width:40%;" >
				<?php 
				echo "Efectivo";
				?>
		   </td>
        </tr>
		
        
   
    </table>
	<br>

	<table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
		<tr>
			<th style="width: 45%;text-align:center" class='midnight-blue'>DESCRIPCION</th>
			<th style="width: 10%;text-align: right" class='midnight-blue'>PRECIO.U</th>
			<th style="width: 10%;text-align: right" class='midnight-blue'>PRECIO.P</th>
			<th style="width: 5%;text-align: right" class='midnight-blue'>CANT.P</th>
			<th style="width: 10%;text-align: right" class='midnight-blue'>CANT.U</th>
			<th style="width: 10%;text-align: right" class='midnight-blue'>CANT.P</th>
			<th style="width: 10%;text-align: right" class='midnight-blue'>SUBTOTAL</th>

		</tr>
		<?php
		$nums=1;
		$sumador_total = 0;
		$sumador_subtotal = 0;
		$sql = mysqli_query($con, "select * from producto, tmp where id=id_producto_tmp");

		while ($row = mysqli_fetch_array($sql)) {
			$id_producto = $row['id'];
			$codigo_producto = $row['codigo'];
			$detalle_producto = $row['detalle'];
			$cantidadU = $row['cantidadU_tmp'];//cantidad de unidades solicitadas
			$cantidadP = $row['cantidadP_tmp'];//cantidad de packetes solicitados
			$cantidadPackin = $row['cantidadPackin'];//cantidad de unidades en packete

			$precioU_venta = $row['precioUnidadVenta'];//precio de unidad para la venta
			$precioU_venta_f = number_format($precioU_venta, 2);//Formateo variables

			$precioU_venta_r = str_replace(",", "", $precioU_venta_f);//Reemplazo las comas
			$precioU_total = $precioU_venta_r * $cantidadU;
			$precioU_total_f = number_format($precioU_total, 2);//Precio total formateado
			$precioU_total_r = str_replace(",", "", $precioU_total_f);//Reemplazo las comas
			$sumador_subtotal += $precioU_total_r;
			$sumador_total += $precioU_total_r;//Sumador

			$precioP_venta = $row['precioPackinVenta'];//precio de packete para la venta
			$precioP_venta_f = number_format($precioP_venta, 2);//Formateo variables

			$precioP_venta_r = str_replace(",", "", $precioP_venta_f);//Reemplazo las comas
			$precioP_total = $precioP_venta_r * $cantidadP;
			$precioP_total_f = number_format($precioP_total, 2);//Precio total formateado
			$precioP_total_r = str_replace(",", "", $precioP_total_f);//Reemplazo las comas
			$sumador_subtotal += $precioP_total_r;
			$sumador_total += $precioP_total_r;//Sumador
			if ($nums%2==0){
				$clase="clouds";
			} else {
				$clase="silver";
			}
			?>
        <tr>
            <td class='<?php echo $clase;?>' style="width: 40%; text-align: center"><?php echo $detalle_producto; ?></td>
            <td class='<?php echo $clase;?>' style="width: 10%; text-align: left"><?php echo $precioU_venta;?></td>
            <td class='<?php echo $clase;?>' style="width: 10%; text-align: right"><?php echo $precioP_venta;?></td>
            <td class='<?php echo $clase;?>' style="width: 5%; text-align: right"><?php echo $cantidadPackin;?></td>
			<td class='<?php echo $clase;?>' style="width: 10%; text-align: right"><?php echo $cantidadU;?></td>
			<td class='<?php echo $clase;?>' style="width: 10%; text-align: right"><?php echo $cantidadP;?></td>
			<td class='<?php echo $clase;?>' style="width: 10%; text-align: right"><?php echo $sumador_subtotal;?></td>
        </tr>
	<?php 
	$insert_detail=mysqli_query($con, "INSERT INTO detalle_venta VALUES ('$id_detalleventa','$id_venta','$id_producto','$cantidadU','$cantidadP')");
	$nums++;
	}
	$subtotal=number_format($sumador_total,2,'.','');
	$total_iva=($subtotal * TAX )/100;
	$total_iva=number_format($total_iva,2,'.','');
	$total_factura=$subtotal+$total_iva;
?>
        <tr>
            <td colspan="3" style="widtd: 85%; text-align: right;">SUBTOTAL ; </td>
            <td style="widtd: 15%; text-align: right;"> <?php echo number_format($subtotal,2);?></td>
        </tr>
		<tr>
            <td colspan="3" style="widtd: 85%; text-align: right;">IVA (<?php echo TAX; ?>)% ; </td>
            <td style="widtd: 15%; text-align: right;"> <?php echo number_format($total_iva,2);?></td>
        </tr><tr>
            <td colspan="3" style="widtd: 85%; text-align: right;">TOTAL  </td>
            <td style="widtd: 15%; text-align: right;"> <?php echo number_format($total_factura,2);?></td>
        </tr>
    </table>
	<br>
	<div style="font-size:11pt;text-align:center;font-weight:bold">Gracias por su compra y Felices Fiestas Le desea la Cadena de Tiendas Ivonne !!!</div>
</page>
<?php
$date=date("Y-m-d H:i:s");
$insert=mysqli_query($con,"INSERT INTO venta VALUES ('$id_venta','$numero_venta','$date','$subtotal','$total_factura',0,'$total_iva',0,0,0,1,'$id_cliente','$id_vendedor',1,1)");
$delete=mysqli_query($con,"DELETE FROM tmp ");
?>