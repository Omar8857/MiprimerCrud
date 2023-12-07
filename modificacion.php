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
    $id_modificar = isset($_POST['id_modificar']) ? $_POST['id_modificar'] : "";
    $nuevo_nombre = isset($_POST['nuevo_nombre']) ? $_POST['nuevo_nombre'] : "";
    $nuevos_apellidos = isset($_POST['nuevos_apellidos']) ? $_POST['nuevos_apellidos'] : "";
    $nueva_edad = isset($_POST['nueva_edad']) ? $_POST['nueva_edad'] : "";
    $nuevo_domicilio = isset($_POST['nuevo_domicilio']) ? $_POST['nuevo_domicilio'] : "";

    // Validar y escapar los datos
    $id_modificar = mysqli_real_escape_string($conn, $id_modificar);
    $nuevo_nombre = mysqli_real_escape_string($conn, $nuevo_nombre);
    $nuevos_apellidos = mysqli_real_escape_string($conn, $nuevos_apellidos);
    $nueva_edad = mysqli_real_escape_string($conn, $nueva_edad);
    $nuevo_domicilio = mysqli_real_escape_string($conn, $nuevo_domicilio);

    
    $sql = "UPDATE infomacion SET nombre = '$nuevo_nombre', apellidos = '$nuevos_apellidos', edad = '$nueva_edad', domicilio = '$nuevo_domicilio' WHERE id_nombre = '$id_modificar'";

    if ($conn->query($sql) === TRUE) {
        echo "Registro actualizado correctamente";
        echo '<script>window.location.href = "informacionn.php";</script>';
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
    }
}

$conn->close();
?>


