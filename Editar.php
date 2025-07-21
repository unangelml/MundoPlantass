<?php
session_start();
if ($_SESSION['rol'] !== 'admin') {
    header("Location: index.php");
    exit();
}
include 'conexion.php';
$id = $_GET['id'];
$planta = $conexion->query("SELECT * FROM plantas WHERE id=$id")->fetch_assoc();
?>
<form action="actualizar.php" method="POST">
  <input type="hidden" name="id" value="<?= $planta['id'] ?>">
  <input type="text" name="nombre" value="<?= $planta['nombre'] ?>" required>
  <textarea name="descripcion" required><?= $planta['descripcion'] ?></textarea>
  <button type="submit">Actualizar</button>
</form>
