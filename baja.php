<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "datos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_eliminar = isset($_POST['id_eliminar']) ? $_POST['id_eliminar'] : "";

    // Validar y escapar los datos
    $id_eliminar = mysqli_real_escape_string($conn, $id_eliminar);

    // Realizar la eliminación
    $sql = "DELETE FROM infomacion WHERE id_nombre = '$id_eliminar'";

    if ($conn->query($sql) === TRUE) {
        echo "Registro eliminado correctamente";
        echo '<script>window.location.href = "informacionn.php";</script>';
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }
}

$conn->close();
?>
