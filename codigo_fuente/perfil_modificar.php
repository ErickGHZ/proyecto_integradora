<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['username'])) {
    header("Location: main.php");
    exit();
}

// Conexión a la base de datos (ajusta los valores de acuerdo a tu configuración)
$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "bd_gheu";

$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

$username = $_SESSION['username'];

// Procesar la modificación del perfil
if (isset($_POST['nuevo_nombre']) && isset($_POST['password']) && isset($_POST['nuevo_correo'])) {
    $nuevoNombre = $conn->real_escape_string($_POST['nuevo_nombre']);
    $nuevoPassword = md5($conn->real_escape_string($_POST['password'])); // Cambiar a password_hash en producción
    $nuevoCorreo = $conn->real_escape_string($_POST['nuevo_correo']);

    // Actualizar los datos del usuario en la base de datos
    $update_query = "UPDATE usuario SET username = '$nuevoNombre', password1 = '$nuevoPassword', email = '$nuevoCorreo' WHERE username = '$username'";

    if ($conn->query($update_query) === TRUE) {
        echo "<script>alert('Perfil actualizado exitosamente.');</script>";
        echo "<script>window.location.href = 'perfil.php';</script>";
    } else {
        $errorMessage = "Error al actualizar el perfil: " . $conn->error;
        echo "<script>alert('$errorMessage');</script>";
        echo "<script>window.location.href = 'perfil.php';</script>";
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
