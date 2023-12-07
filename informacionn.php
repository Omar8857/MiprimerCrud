<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Informacion Personal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #007bff;
        }

        form {
            margin-top: 20px;
        }

        label {
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #ffffff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        .action-buttons {
            display: flex;
            gap: 5px;
        }

        .action-buttons button {
            cursor: pointer;
        }
    </style>
</head>
<body>
  <div class="container">
    <h1>Omar Mendez Coyote</h1>

<div id="content">
  <h2>Informacion Personal (Registro)</h2>

  <form action="http://localhost/Crud/informacion.php" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required>

    <label for="apellidos">Apellidos:</label>
    <input type="text" id="apellidos" name="apellidos" required>

    <label for="edad">Edad:</label>
    <input type="number" id="edad" name="edad" required>

    <label for="domicilio">Domicilio:</label>
    <input type="text" id="domicilio" name="domicilio" required>

    <input type="checkbox" id="terminos" name="terminos" required>
    <label for="terminos">Acepto los términos de uso</label>

    <input type="submit" value="Aceptar">
  </form>

  <h1>Modificación</h1>
  <form method="post" action="modificacion.php">
    <label for="id_nombre">ID a modificar:</label>
    <input type="number" name="id_modificar" required>

    <label for="nuevo_nombre">Nuevo nombre:</label>
    <input type="text" name="nuevo_nombre" required>

    <label for="nuevos_apellidos">Nuevos apellidos:</label>
    <input type="text" name="nuevos_apellidos" required>

    <label for="nueva_edad">Nueva edad:</label>
    <input type="number" name="nueva_edad" required>

    <label for="nuevo_domicilio">Nuevo domicilio:</label>
    <input type="text" name="nuevo_domicilio" required>

    <input type="submit" value="Modificar">
  </form>

  <h1>Eliminacion</h1>
  <form method="post" action="baja.php">
    <label for="id_eliminar">ID a eliminar:</label>
    <input type="number" name="id_eliminar" required>

    <input type="submit" value="Eliminar">
  </form>

  
<h2>Registros</h2>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Apellidos</th>
      <th>Edad</th>
      <th>Domicilio</th>
     
    </tr>
  </thead>
  <tbody>
    <?php
    $servername = "localhost";
$username = "root";
$password = "";
$dbname = "datos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

  
    $result = $conn->query("SELECT * FROM infomacion");
    while ($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row['id_nombre'] . "</td>";
      echo "<td>" . $row['nombre'] . "</td>";
      echo "<td>" . $row['apellidos'] . "</td>";
      echo "<td>" . $row['edad'] . "</td>";
      echo "<td>" . $row['domicilio'] . "</td>";
      echo "</tr>";
    }
    ?>
  </tbody>
  
</table>



    </div>
  </div>
</body>
</html>





