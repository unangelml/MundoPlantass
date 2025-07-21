<?php
session_start();
if ($_SESSION['rol'] !== 'admin') {
    header("Location: index.php");
    exit();
}
include 'conexion.php';
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$conexion->query("INSERT INTO plantas (nombre, descripcion) VALUES ('$nombre', '$descripcion')");
header("Location: index.php");
?>
