<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "datos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verificar si los campos específicos están definidos en el array $_POST
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
    $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : "";
    $edad = isset($_POST['edad']) ? $_POST['edad'] : "";
    $domicilio = isset($_POST['domicilio']) ? $_POST['domicilio'] : "";

    // Validar y escapar los datos del formulario
    $nombre = mysqli_real_escape_string($conn, $nombre);
    $apellidos = mysqli_real_escape_string($conn, $apellidos);
    $edad = mysqli_real_escape_string($conn, $edad);
    $domicilio = mysqli_real_escape_string($conn, $domicilio);

    $sql = "INSERT INTO infomacion (nombre, apellidos, edad, domicilio) VALUES ('$nombre', '$apellidos', '$edad', '$domicilio')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro insertado correctamente";
        echo '<script>window.location.href = "informacionn.php";</script>';
    } else {
        echo "Error al insertar datos: " . $conn->error;
    }
} else {
    echo "Formulario no enviado";
}

$conn->close();
?>
