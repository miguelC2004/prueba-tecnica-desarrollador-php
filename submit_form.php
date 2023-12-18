<?php
// Establecer la conexión con la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "technokey_airlines";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recuperar los datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];

// Insertar los datos en la tabla mensajes_contacto
$sql = "INSERT INTO mensajes_contacto (nombre, email, mensaje) VALUES ('$nombre', '$email', '$mensaje')";

if ($conn->query($sql) === TRUE) {
    echo "Mensaje enviado con éxito";
} else {
    echo "Error al enviar el mensaje: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
