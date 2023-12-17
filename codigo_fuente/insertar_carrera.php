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

// Obtener los datos del formulario
$nombre_carrera = $_POST["nombre_carrera"];
$tipo = $_POST["tipo"];
$modelo = $_POST["modelo"];
$duracion = $_POST["duracion"];

// Preparar la consulta SQL para insertar datos en la tabla
$consulta = "INSERT INTO carreras (nombre_carrera, tipo, modelo, duracion) VALUES ('$nombre_carrera', '$tipo', '$modelo', $duracion)";
// Ejecutar la consulta
    if ($conexion->query($consulta) === TRUE) {
        // Mostrar mensaje de éxito utilizando JavaScript
        echo "<script>alert('Datos insertados correctamente');</script>";
    } else {
        // Mostrar mensaje de error utilizando JavaScript
        echo "<script>alert('Error al insertar datos');</script>";
    }

    // Redirigir a la página de origen
    echo "<script>window.location.href = 'main_carrera.php';</script>";
    exit();


?>
