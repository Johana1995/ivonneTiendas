<?php


	
	/* Connect To Database*/
	include '../../libs/db.php';
	include("../../libs/conexion.php");
	$session_id= session_id();
	$sql_count=mysqli_query($con,"select * from tmp ");
	$count=mysqli_num_rows($sql_count);
	if ($count==0)
	{
	echo "<script>alert('No hay productos agregados a la factura')</script>";
	echo "<script>window.close();</script>";
	exit;
	}

	require_once(dirname(__FILE__).'/../html2pdf.class.php');
		
	//Variables por GET
	$id_cliente=intval($_GET['id_cliente']);
	$id_vendedor=intval($_GET['id_vendedor']);
	$condiciones=mysqli_real_escape_string($con,(strip_tags($_REQUEST['condiciones'], ENT_QUOTES)));


	$sql=mysqli_query($con, "select LAST_INSERT_ID(numero) as last from venta order by id desc limit 0,1 ");
	$rw=mysqli_fetch_array($sql);
$numero_venta=$rw['last']+1;


$sql2=mysqli_query($con, "select LAST_INSERT_ID(id) as lastid from venta order by id desc limit 0,1 ");
$rw2=mysqli_fetch_array($sql2);
$id_venta=$rw2['lastid']+1;


$sql3=mysqli_query($con, "select LAST_INSERT_ID(id) as lastid from detalle_venta order by id desc limit 0,1 ");
$rw3=mysqli_fetch_array($sql3);
$id_detalleventa=$rw3['lastid']+1;
// get the HTML
     ob_start();
     include(dirname('__FILE__').'/res/factura_html.php');
    $content = ob_get_clean();

    try
    {
        // init HTML2PDF
        $html2pdf = new HTML2PDF('P', 'LETTER', 'es', true, 'UTF-8', array(0, 0, 0, 0));
        // display the full page
        $html2pdf->pdf->SetDisplayMode('fullpage');
        // convert
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        // send the PDF
        $html2pdf->Output('Factura.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
