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

    $nombre_materia = $_POST["nombre_materia"];
    $horas_totales = $_POST["horas_totales"];
    $hora_semanal = $_POST["hora_semanal"];


    $consulta = "INSERT INTO materias (nombre_materia, horas_totales, hora_semanal)
            VALUES ('$nombre_materia', '$horas_totales', '$hora_semanal')";

    if ($conexion->query($consulta) === TRUE) {
        // Mostrar mensaje de éxito utilizando JavaScript
        echo "<script>alert('Datos insertados correctamente');</script>";
    } else {
        // Mostrar mensaje de error utilizando JavaScript
        echo "<script>alert('Error al insertar datos');</script>";
    }

    // Redirigir a la página de origen
    echo "<script>window.location.href = 'main_materias.php';</script>";
    exit();



?>
