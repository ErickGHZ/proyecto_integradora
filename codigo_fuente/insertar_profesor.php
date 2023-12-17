<?php
// Configura los datos de conexión a la base de datos
$host = "localhost";
$usuario = "root";
$password = "";
$base_datos = "bd_gheu";

// Conectar a la base de datos
$conexion = new mysqli($host, $usuario, $password, $base_datos);

// Verificar si la conexión fue exitosa
if ($conexion->connect_error) {
    die("Error al conectar con la base de datos: " . $conexion->connect_error);
}


// Insertar datos en la tabla profesores
    $nombre_profesor = $_POST["nombre_profesor"];
    $apellidos = $_POST["apellidos"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];


    // Aquí deberías ajustar la consulta según la estructura de tu tabla
    $consulta = "INSERT INTO profesores (nombre_profesor, apellidos, email, telefono)
            VALUES ('$nombre_profesor', '$apellidos', '$email', '$telefono')";

    if ($conexion->query($consulta) === TRUE) {
        // Mostrar mensaje de éxito utilizando JavaScript
        echo "<script>alert('Datos insertados correctamente');</script>";
    } else {
        // Mostrar mensaje de error utilizando JavaScript
        echo "<script>alert('Error al insertar datos');</script>";
    }

    // Redirigir a la página de origen
    echo "<script>window.location.href = 'main_profesores.php';</script>";
    exit();



?>
