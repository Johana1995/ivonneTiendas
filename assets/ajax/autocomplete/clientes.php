<?php

	include '../../../libs/db.php';
	include("../../../libs/conexion.php");
	$return_arr = array();
	if ($con) {
		$fetch = mysqli_query($con, "SELECT * FROM listarclientes where nombre like '%" . mysqli_real_escape_string($con, ($_GET['term'])) . "%' Or nombre like '%" . mysqli_real_escape_string($con, ($_GET['term'])) . "%' LIMIT 0 ,50");

		/* Retrieve and store in array the results of the query.*/
		while ($row = mysqli_fetch_array($fetch)) {
			$id_cliente = $row['cliente_id'];
			$row_array['value'] = $row['nombre'];
			$row_array['id_cliente'] = $id_cliente;
			$row_array['nombre_cliente'] = $row['nombre'];
			$row_array['telefono_cliente'] = $row['nacimiento'];
			$row_array['email_cliente'] = $row['nit'];
			array_push($return_arr, $row_array);
		}

	}
	mysqli_close($con);

	echo json_encode($return_arr);


?>