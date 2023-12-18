<?php
session_start();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "technokey_airlines";

// Crear conexión
$conexion = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}




// Recibir datos del formulario
$correo = $_POST["correo"];
$contrasena = $_POST["contrasena"];

// Consulta para validar si el usuario existe
$query = "SELECT * FROM usuarios WHERE correo = '$correo' AND contrasena = '$contrasena' AND rol = 'usuario'";
$resultado = $conexion->query($query);

if ($resultado->num_rows == 1) {
  // El usuario es un usuario normal, iniciar sesión
  $_SESSION["correo"] = $correo;
  $_SESSION["contrasena"] = $contrasena;
  header("Location: inicio-user.php"); // Redirigir
} else {
  // El usuario no existe
  echo "Correo electrónico o contraseña incorrectos.";
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
