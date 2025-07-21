<?php
include 'conexion.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $rol = 'user';
    $sql = "INSERT INTO usuarios (usuario, clave, rol, nombre, apellido, correo) 
            VALUES ('$usuario', '$clave', '$rol', '$nombre', '$apellido', '$correo')";
    if ($conexion->query($sql)) {
        header("Location: login.php");
    } else {
        $error = "Error al registrar usuario.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Registro</title>
<link rel="stylesheet" href="estiloRe.css"></head>
<body><br><br>
<center><header>EL MUNDO DE LAS PLANTAS</header></center><br><br>
<main><center><h2>Crear nueva cuenta</h2></center>
<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
<center><form method="POST">
  <input type="text" name="nombre" placeholder="Nombre" required>
  <input type="text" name="apellido" placeholder="Apellido" required>
  <input type="email" name="correo" placeholder="Correo electrónico" required>
  <input type="text" name="usuario" placeholder="Nombre de usuario" required>
  <input type="password" name="clave" placeholder="Contraseña" required>
  <button type="submit">Registrarse</button>
</form></center>
<center><p><a href="login.php">Volver a iniciar sesión</a></p></center></main><br>
<center><footer>Nuestra página es el lugar perfecto para ti</footer></center>
</body>
</html>


