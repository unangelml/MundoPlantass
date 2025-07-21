<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
include 'conexion.php';
$usuario = $_SESSION['usuario'];
$is_admin = $_SESSION['rol'] === 'admin';
$datos = $conexion->query("SELECT * FROM usuarios WHERE usuario = '$usuario'")->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Plantas CRUD</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body><br><br>
<center><header>EL MUNDO DE LAS PLANTAS</header></center><br><br>
<main><center><h1>Bienvenido, <?= $datos['nombre'] . ' ' . $datos['apellido'] ?> (<?= $datos['rol'] ?>)</h1></center>
<center><p><strong>Correo electrónico:</strong> <?= $datos['correo'] ?></p></center>

<center><h2>Lista de Plantas</h2></center>
<center><ul>
<?php
$resultado = $conexion->query("SELECT * FROM plantas");
while ($fila = $resultado->fetch_assoc()) {
    echo "<li><strong>" . htmlspecialchars($fila['nombre']) . "</strong>: " . htmlspecialchars($fila['descripcion']);
    if ($is_admin) {
        echo " <a href='editar.php?id={$fila['id']}'>✏️</a> 
               <a href='eliminar.php?id={$fila['id']}'>❌</a>";
    }
    echo "</li>";
}
?>
</ul></center>

<center><?php if ($is_admin): ?>
<h2>Agregar nueva planta</h2>
<form method="POST" action="guardar.php">
  <input type="text" name="nombre" placeholder="Nombre de la planta" required>
  <textarea name="descripcion" placeholder="Descripción de la planta" required></textarea>
  <button type="submit">Guardar</button>
</form>
<?php endif; ?></center>

<center><p><a href="logout.php">Cerrar sesión</a></p></center></main><br><br><br>

<center><footer>Nuestra página es el lugar perfecto para ti</footer></center>

</body>
</html>