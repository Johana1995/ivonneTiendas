<?php
require_once("../../libs/db.php");
require_once("../../libs/conexion.php");
	
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $aColumns = array('codigo', 'nombre');//Columnas de busqueda
		 $sTable = "producto";
		 $sWhere = "";
		if ( $_GET['q'] != "" )
		{
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 7;
		$adjacents  = 4;
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './index.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			
			?>
			<div class="table-responsive">
				<table class="table">
					<tr  class="warning">
						<th>Código</th>
						<th>Producto</th>
						<th>PrecioU</th>
						<th>PrecioP</th>
						<th>PackCant</th>
						<th><span class="pull-right">Cant.</span></th>
						<th><span class="pull-right">CantPack.</span></th>
						<th class='text-center' style="width: 36px;">Agregar</th>
					</tr>
					<?php
					while ($row=mysqli_fetch_array($query)){
						$id_producto=$row['id'];
						$codigo_producto=$row['codigo'];
						$detalle_producto=$row['detalle'];
						$cantidad_producto=$row['cantidadPackin'];
						$precioU_venta=$row["precioUnidadVenta"];
						$precioU_venta=number_format($precioU_venta,2);
						$precioP_venta=$row["precioPackinVenta"];
						$precioP_venta=number_format($precioP_venta,2);
						?>
						<tr>
							<td><?php echo $codigo_producto; ?></td>
							<td><?php echo $detalle_producto; ?></td>
							<td><?php echo $precioU_venta; ?></td>
							<td><?php echo $precioP_venta; ?></td>
							<td><?php echo $cantidad_producto; ?></td>
							<td class='col-xs-1'>
								<div class="pull-right">
									<input type="text" class="form-control" style="text-align:right" id="cantidadUVenta_<?php echo $id_producto; ?>" value="1" >
								</div>
							</td>
							<td class='col-xs-1'>
								<div class="pull-right">
									<input type="text" class="form-control" style="text-align:right" id="cantidadPVenta_<?php echo $id_producto; ?>"  value="0">
								</div>
							</td>
							<td class='text-center'><a class='btn btn-info'href="#" onclick="agregar('<?php echo $id_producto ?>')"><i class="glyphicon glyphicon-plus"></i></a></td>
						</tr>
						<?php
					}
					?>
					<tr>
						<td colspan=5><span class="pull-right"><?
								echo paginate($reload, $page, $total_pages, $adjacents);
								?></span></td>
					</tr>
				</table>

			</div>
			<?php
		}
	}
?>