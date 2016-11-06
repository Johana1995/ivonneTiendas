<?php
session_start();
if (!isset($_SESSION['empleado_id']) AND !isset($_SESSION['sucursal_id']) AND !isset($_SESSION['caja_id'])) {
    header("location: login.php");
    exit;
}

/*
$_SESSION['sucursal_id']=$sucursal->id;
$_SESSION['sucursal_nombre']=$sucursal->nombre;

$_SESSION['empleado_id']=$user->id;
$_SESSION['empleado_nombre']=$user->nombre;
$_SESSION['empleado_apellido']=$user->apellido;

$_SESSION['caja_id']=$caja->id;
$_SESSION['caja_numero']=$caja->numero;
*/?>