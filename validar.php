<?php
session_start();
require("site/DataBase.php");
$db = DataBase::singleton();
$username=$_POST['username'];
$pass=$_POST['password'];

$sql2="select e.id as id, p.nombre as nombre , p.apellido as apellido  FROM empleado e,persona p ";
$sql2 .= " where e.persona_id = p.id and e.username='".$username."' and e.password='".$pass."'";
$query= $db->prepare($sql2);
$query->execute();
$user=$query->fetch(PDO::FETCH_OBJ);
if($query->rowCount() >0){
	$_SESSION['id']=$user->id;
	$_SESSION['nombre']=$user->nombre;
	$_SESSION['apellido']=$user->apellido;

	header('Location: index.php?module=site&controller=site&action=listarsucursales');

}else{

	echo '<script>alert("ESTE USUARIO NO EXISTE, PORFAVOR REGISTRESE PARA PODER INGRESAR")</script> ';

	echo "<script>location.href='login.php'</script>";

}

