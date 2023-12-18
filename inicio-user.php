<!DOCTYPE html>
<html lang="es">
<head>
	<title>Registro - Aerolínea TECHNOKEY</title>
	<link rel="stylesheet" type="text/css" href="./css/Registro.css">
</head>
<body>
	<center>
		<h2>Registro de Usuario</h2>

		<?php
		$conn = new mysqli('localhost', 'root', '', 'technokey_airlines');

		if ($conn->connect_error) {
		    die("Error de conexión: " . $conn->connect_error);
		}

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		    $nombre = $_POST['nombre'];
		    $correo = $_POST['correo'];
		    $contrasena = $_POST['contrasena'];
		    $destino_id = $_POST['destino'];

		    // Insertar usuario en la tabla usuarios
		    $sql = "INSERT INTO usuarios (nombre, correo, contrasena) VALUES ('$nombre', '$correo', '$contrasena')";
		    $conn->query($sql);

		    // Obtener el ID del usuario recién insertado
		    $usuario_id = $conn->insert_id;

		    // Insertar preferencias de destino en la tabla preferencias_destino
		    $sql = "INSERT INTO preferencias_destino (usuario_id, destino_id) VALUES ('$usuario_id', '$destino_id')";
		    $conn->query($sql);

		    echo "<p>¡Registro exitoso!</p>";
		}

		$conn->close();
		?>

		<form method="post" action="">
			<label>Nombre:</label> <br>
			<input type="text" name="nombre" required>
			<br>
			<label>Correo Electrónico:</label> <br>
			<input type="email" name="correo" required>
			<br>
			<label>Contraseña:</label> <br>
			<input type="password" name="contrasena" required>
			<br>
			<label>Selecciona tu destino:</label> <br>
			<select name="destino" required>
				<option value="1">Aeropuerto Internacional El Dorado, Bogotá</option>
				<option value="2">Aeropuerto José María Córdova, Medellín</option>
				<option value="3">Aeropuerto Internacional Rafael Núñez, Cartagena</option>
			</select>
			<br>
			<input type="submit" value="Registrarse">
		</form>
	</center>
</body>
</html>
