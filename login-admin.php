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

// Consulta para validar si el usuario es un administrador
$query = "SELECT * FROM usuarios WHERE correo = '$correo' AND contrasena = '$contrasena' AND rol = 'admin'";
$resultado = $conexion->query($query);

if ($resultado->num_rows == 1) {
  // El usuario es un administrador, iniciar sesión
  $_SESSION["correo"] = $correo;
  $_SESSION["contrasena"] = $contrasena;
  header("Location: inicio-admin.php"); // Redirigir a la página del administrador
} else {
  // El usuario no es un administrador, mostrar mensaje de error
  echo "Correo electrónico o contraseña incorrectos para un administrador.";
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
