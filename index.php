<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aerolínea TECHNOKEY - Gestión de Rutas</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      background-color: #f2f2f2;
    }

    header {
      text-align: center;
      background-color: #003366; /* Color de la aerolínea TECHNOKEY */
      color: #fff;
      padding: 1em;
    }

    h1 {
      font-size: 3em;
    }

    nav ul {
      list-style: none;
      padding: 0;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    nav ul li {
      margin: 0 10px;
    }

    nav ul li a {
      display: block;
      padding: 20px;
      color: #fff;
      background-color: #004080; /* Color secundario de la aerolínea TECHNOKEY */
      border-radius: 10px;
      transition: background-color 0.3s ease;
      font-size: 20px;
      text-decoration: none;
    }

    nav ul li a:hover,
    nav ul li a:focus {
      background-color: #0066cc; /* Color de resalte de la aerolínea TECHNOKEY */
      cursor: pointer;
      transform: translateY(-5px);
    }

    main {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      min-height: calc(100vh - 2em);
    }

    .container {
      width: 80%;
      background-color: #fff;
      padding: 2em;
      border-radius: 1em;
      box-shadow: 0 0 10px rgba(0, 51, 102, 0.5); /* Sombra con el color de la aerolínea TECHNOKEY */
    }

    h1,
    h2,
    h3 {
      text-align: center;
    }

    form {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-top: 2em;
    }

    form label {
      margin-bottom: 0.5em;
    }

    form input[type="submit"] {
      background-color: #003366; /* Color de botón de la aerolínea TECHNOKEY */
      color: #fff;
      padding: 0.5em 1em;
      border: none;
      border-radius: 0.5em;
      font-size: 1em;
      cursor: pointer;
    }

    form input[type="submit"]:hover {
      background-color: #004080; /* Color de resalte de botón de la aerolínea TECHNOKEY */
      color: #fff;
    }

    footer {
      background-color: #003366; /* Color de pie de página de la aerolínea TECHNOKEY */
      color: #fff;
      text-align: center;
      padding: 10px;
    }

    .download-image {
      display: flex;
      justify-content: center;
      margin: 2em 0;
    }

    .download-image img {
      max-width: 80%;
      height: auto;
    }
  </style>
</head>

<body>
  <header>
    <h1>Aerolínea TECHNOKEY - Gestión de Rutas</h1>
    <nav>
      <ul>
        <li><a href="#inicio">Inicio</a></li>
        <li><a href="info.html">Acerca</a></li>
        <li><a href="#contacto">contacto</a></li>
      </ul>
    </nav>
  </header>

  <br>
  <center>
    <nav>
      <h2>INICIE SESIÓN COMO:</h2>
      <ul>
        <li><a href="user.php">USUARIO</a></li>
        <li><a href="admin.php">ADMINISTRADOR</a></li>
      </ul>
    </nav>
  </center>
 
  <div class="download-image">
    <img src="img/descarga.jpg" alt="Descarga" style="max-width: 1800px; height: 800px;" />
  </div>

  <br>
  <div class="container" id="contacto">
    <h2>Formulario de contacto</h2>
    <form action="submit_form.php" method="POST">
      <label for="nombre">Nombre:</label>
      <input type="text" id="nombre" name="nombre" required>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
      <label for="mensaje">Mensaje:</label>
      <textarea id="mensaje" name="mensaje" rows="5" required></textarea>
      <input type="submit" value="Enviar">
    </form>
  </div>
  <br>

  <footer>
    <p>&copy; 2023 Aerolínea TECHNOKEY - Gestión de Rutas</p>
    <p>&copy; Web programada por: Miguel Angel Cataño Zapata</p>
  </footer>
</body>

</html>
