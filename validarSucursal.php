<?php
session_start();
require("site/DataBase.php");
$db = DataBase::singleton();
$sucursal_id=$_POST['select-sucursal'];
$caja_id=$_POST['select-caja'];

$sql2="select id,nombre  FROM sucursal WHERE id='".$sucursal_id."'";
$query2= $db->prepare($sql2);
$query2->execute();
$sucursal=$query2->fetch(PDO::FETCH_OBJ);
$_SESSION['sucursal_id']=$sucursal->id;
$_SESSION['sucursal_nombre']=$sucursal->nombre;
$db = DataBase::singleton();
$sql="select c.id ,c.numero   FROM caja c WHERE id='".$caja_id."'";
$query= $db->prepare($sql);
$query->execute();
$caja=$query->fetch(PDO::FETCH_OBJ);
$_SESSION['caja_id']=$caja->id;
$_SESSION['caja_numero']=$caja->numero;

header('Location: index.php?module=site&controller=site&action=inicio');

