<?php
session_start();
if ($_SESSION['rol'] !== 'admin') {
    header("Location: index.php");
    exit();
}
include 'conexion.php';
$id = $_GET['id'];
$conexion->query("DELETE FROM plantas WHERE id=$id");
header("Location: index.php");
?>