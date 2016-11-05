<?php

if (isset($_POST['id'])){$id=$_POST['id'];}
if (isset($_POST['cantidad'])){$cantidad=$_POST['cantidad'];}
if (isset($_POST['precio_Unidad_venta'])){$precio_Unidad_venta=$_POST['precio_Unidad_venta'];}
if (isset($_POST['precio_Packin_venta'])){$precio_Packin_venta=$_POST['precio_Packin_venta'];}
if (isset($_POST['cant_Packin_venta'])){$cant_Packin_venta=$_POST['cant_Packin_venta'];}

	/* Connect To Database*/
	require_once("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	
if (!empty($id) and !empty($cant_Packin_venta) and !empty($precio_Packin_venta)and !empty($precio_Unidad_venta)and !empty($cantidad))
{
$insert_tmp=mysqli_query($con, "INSERT INTO tmp (id_producto,cantidad_tmp,preciou,preciop,cantp) VALUES ('$id','$cantidad','$precio_Unidad_venta','$precio_Packin_venta','$cant_Packin_venta')");

}
if (isset($_GET['id']))//codigo elimina un elemento del array
{
$id_tmp=intval($_GET['id']);	
$delete=mysqli_query($con, "DELETE FROM tmp WHERE id_tmp='".$id_tmp."'");
}

?>
<table class="table">
<tr>
	<th class='text-center'>CODIGO</th>
	<th class='text-center'>CANT.</th>
	<th class='text-center'>PRECIOU</th>
	<th class='text-center'>PRECIOPACK</th>
	<th class='text-center'>CANTPACK</th>
	<th class='text-center'>CANT.</th>
	<th>DESCRIPCION</th>
	<th class='text-right'>PRECIO UNIT.</th>
	<th class='text-right'>PRECIO TOTAL</th>
	<th></th>
</tr>
<?php
	$sumador_total=0;
	$sql=mysqli_query($con, "select * from producto, tmp where producto.id=tmp.id_producto");
	while ($row=mysqli_fetch_array($sql))
	{
	$id_tmp=$row["id_tmp"];
	$codigo=$row['codigo'];
	$cantidad=$row['cantidad_tmp'];
	$detalle=$row['detalle'];

	$precio_Unidad_venta=$row['preciou'];
		$precio_Unidad_venta_f=number_format($precio_Unidad_venta,2);//Formateo variables
		$precio_Unidad_venta_r=str_replace(",","",$precio_Unidad_venta_f);//Reemplazo las comas

	$precio_total=$precio_Unidad_venta_r*$cantidad;
	$precio_total_f=number_format($precio_total,2);//Precio total formateado
	$precio_total_r=str_replace(",","",$precio_total_f);//Reemplazo las comas

	$sumador_total+=$precio_total_r;//Sumador
	
		?>
		<tr>
			<td class='text-center'><?php echo $codigo;?></td>
			<td class='text-center'><?php echo $cantidad;?></td>
			<td><?php echo $detalle;?></td>
			<td class='text-right'><?php echo $precio_Unidad_venta_f;?></td>
			<td class='text-right'><?php echo $precio_total_f;?></td>
			<td class='text-center'><a href="#" onclick="eliminar('<?php echo $id_tmp ?>')"><i class="glyphicon glyphicon-trash"></i></a></td>
		</tr>		
		<?php
	}
	$subtotal=number_format($sumador_total,2,'.','');
	$total_iva=($subtotal * TAX )/100;
	$total_iva=number_format($total_iva,2,'.','');
	$total_factura=$subtotal+$total_iva;

?>
<tr>
	<td class='text-right' colspan=4>SUBTOTAL $</td>
	<td class='text-right'><?php echo number_format($subtotal,2);?></td>
	<td></td>
</tr>
<tr>
	<td class='text-right' colspan=4>IVA (<?php echo TAX?>)% $</td>
	<td class='text-right'><?php echo number_format($total_iva,2);?></td>
	<td></td>
</tr>
<tr>
	<td class='text-right' colspan=4>TOTAL $</td>
	<td class='text-right'><?php echo number_format($total_factura,2);?></td>
	<td></td>
</tr>

</table>
