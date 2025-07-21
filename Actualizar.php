<?php
session_start();
if ($_SESSION['rol'] !== 'admin') {
    header("Location: index.php");
    exit();
}
include 'conexion.php';
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$conexion->query("UPDATE plantas SET nombre='$nombre', descripcion='$descripcion' WHERE id=$id");
header("Location: index.php");
?>
