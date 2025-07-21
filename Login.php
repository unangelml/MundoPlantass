<?php
session_start();
include 'conexion.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND clave='$clave'";
    $resultado = $conexion->query($sql);
    if ($resultado->num_rows === 1) {
        $user = $resultado->fetch_assoc();
        $_SESSION['usuario'] = $user['usuario'];
        $_SESSION['rol'] = $user['rol'];
        header("Location: index.php");
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Login</title>
<link rel="stylesheet" href="estiloLogin.css"></head>
<body>
<br><br>
<center><header>EL MUNDO DE LAS PLANTAS</header></center><br><br>
<main>><center><h2>Iniciar sesión</h2></center>
    <center><?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?></center>
    <center><form method="POST">
    <input type="text" name="usuario" placeholder="Usuario" required>
    <input type="password" name="clave" placeholder="Contraseña" required>
    <button type="submit">Entrar</button>
    </form></center>
    <center><p>¿No tienes cuenta? <a href='registro.php'>Regístrate aquí</a></p></center>
</main><br><br>
<center><footer>Nuestra página es el lugar perfecto para ti</footer></center>
</body>
</html>