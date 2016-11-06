<?php

if (isset($_POST['id'])){
	$id=$_POST['id'];}


if (isset($_POST['cantidadU'])){
	$cantidadU=$_POST['cantidadU'];}


if (isset($_POST['cantidadP'])){
	$cantidadP=$_POST['cantidadP'];}
require_once("../../libs/db.php");
require_once("../../libs/conexion.php");

if (!empty($id) and !empty($cantidadU) and !empty($cantidadP)) {
$insert_tmp = mysqli_query($con, "INSERT INTO tmp VALUES ('$id','$cantidadU','$cantidadP')");

?>
<table class="table">
	<tr>
		<th class='text-center'>CODIGO</th>
		<th>DESCRIPCION</th>
		<th>PRECIOU</th>
		<th>PRECIO P</th>
		<th>CANT PACK</th>
		<th class='text-center'>CANT U.</th>
		<th class='text-center'>CANT P.</th>
		<th class='text-right'>SUBTOTAL</th>
		<th></th>
	</tr>
	<?php
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

		?>
		<tr>
			<td class='text-center'><?php echo $codigo_producto; ?></td>
			<td><?php echo $detalle_producto; ?></td>
			<td><?php echo $precioU_venta; ?></td>
			<td><?php echo $precioP_venta; ?></td>
			<td><?php echo $cantidadPackin; ?></td>
			<td class='text-center'><?php echo $cantidadU; ?></td>
			<td class='text-center'><?php echo $cantidadP; ?></td>
			<td class='text-right'><?php echo $sumador_subtotal; ?></td>
			<td class='text-center'><a href="#" onclick="eliminar('<?php echo $id_producto_tmp ?>')"><i class="glyphicon glyphicon-trash"></i></a></td>
		</tr>
		<?php
	}
	$subtotal = number_format($sumador_total, 2, '.', '');
	$total_iva = ($subtotal * TAX) / 100;
	$total_iva = number_format($total_iva, 2, '.', '');
	$total_factura = $subtotal + $total_iva;
	?>
	<tr>
		<td class='text-right' colspan=4>SUBTOTAL(SIN IVA)</td>
		<td class='text-right'><?php echo number_format($subtotal, 2); ?></td>
		<td></td>
	</tr>
	<tr>
		<td class='text-right' colspan=4>IVA (<?php echo TAX ?>)% $</td>
		<td class='text-right'><?php echo number_format($total_iva, 2); ?></td>
		<td></td>
	</tr>
	<tr>
		<td class='text-right' colspan=4>TOTAL $</td>
		<td class='text-right'><?php echo number_format($total_factura, 2); ?></td>
		<td></td>
	</tr>

</table>
	<?php
}
?>

