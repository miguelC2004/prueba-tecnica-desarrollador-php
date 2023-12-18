<!DOCTYPE html>
<html>
<head>
	<title>Consulta de Vuelos</title>
	<link rel="stylesheet" type="text/css" href="./css/Registro.css">
</head>
<body>
	<center>
		<h1>Consulta de Vuelos</h1>
		
		<!-- Formulario de búsqueda por ID de vuelo -->
		<form method="post">
			<label>Ingrese el ID del Vuelo:</label><br>
			<input type="text" name="vuelo_id"><br>
            <br>
			<input type="submit" value="Buscar">
		</form>

		<?php
			$conn = new mysqli('localhost', 'root', '', 'technokey_airlines');

			if ($conn->connect_error) {
				die("Error de conexión: " . $conn->connect_error);
			}

			if (isset($_POST['vuelo_id'])) {
				$vuelo_id = $_POST['vuelo_id'];

				$sql = "SELECT * FROM vuelos_diarios WHERE id = '$vuelo_id'";
				$resultado = $conn->query($sql);

				if ($resultado->num_rows > 0) {
					$vuelo = $resultado->fetch_assoc();
					echo "<h2>Datos del Vuelo</h2>";
					echo "<p>ID: " . $vuelo['id'] . "</p>";
					echo "<p>Ruta ID: " . $vuelo['ruta_id'] . "</p>";
					echo "<p>Fecha: " . $vuelo['fecha'] . "</p>";
					echo "<p>Hora de Salida: " . $vuelo['hora_salida'] . "</p>";
					echo "<p>Plazas Disponibles: " . $vuelo['plazas_disponibles'] . "</p>";
					echo "<p>Precio: " . $vuelo['precio'] . "</p>";
				} else {
					echo "<p>No se encontró el vuelo con el ID ingresado.</p>";
				}
			}

			$conn->close();
		?>

		<!-- Formulario de filtrado -->
		<h2>Filtrar Vuelos</h2>
		<form method="post">
			<label>Fecha:</label>
			<input type="date" name="filtro_fecha"><br>
			<label>Hora:</label>
			<input type="time" name="filtro_hora"><br>
			<label>Costo Máximo:</label>
			<input type="number" name="filtro_costo"><br>
            <br>
			<input type="submit" value="Filtrar">
		</form>

		<?php
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$conn = new mysqli('localhost', 'root', '', 'technokey_airlines');

				if ($conn->connect_error) {
					die("Error de conexión: " . $conn->connect_error);
				}

				$filtro_fecha = $_POST['filtro_fecha'];
				$filtro_hora = $_POST['filtro_hora'];
				$filtro_costo = $_POST['filtro_costo'];

				$sql = "SELECT * FROM vuelos_diarios WHERE fecha = '$filtro_fecha' AND hora_salida = '$filtro_hora' AND precio <= '$filtro_costo'";
				$resultado = $conn->query($sql);

				if ($resultado->num_rows > 0) {
					echo "<h2>Resultados del Filtro</h2>";
					echo "<table border='1'>
							<tr>
								<th>ID</th>
								<th>Ruta ID</th>
								<th>Fecha</th>
								<th>Hora de Salida</th>
								<th>Plazas Disponibles</th>
								<th>Precio</th>
							</tr>";

					while($row = $resultado->fetch_assoc()) {
						echo "<tr>
								<td>" . $row["id"] . "</td>
								<td>" . $row["ruta_id"] . "</td>
								<td>" . $row["fecha"] . "</td>
								<td>" . $row["hora_salida"] . "</td>
								<td>" . $row["plazas_disponibles"] . "</td>
								<td>" . $row["precio"] . "</td>
							</tr>";
					}
					echo "</table>";
				} else {
					echo "<p>No se encontraron resultados con los criterios de búsqueda.</p>";
				}

				$conn->close();
			}
		?>
	</center>
</body>
</html>
