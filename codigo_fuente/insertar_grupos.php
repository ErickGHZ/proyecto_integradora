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

// Insertar datos en la tabla grupos
    $nombre_grupo = $_POST["nombre_grupo"];
    $id_carrera = $_POST["id_carrera"];
    $numero_estudiantes = $_POST["numero_estudiantes"];
    $grado_academico = $_POST["grado_academico"];


    $consulta = "INSERT INTO grupos (nombre_grupo, id_carrera, numero_estudiantes, grado_academico) 
            VALUES ('$nombre_grupo', '$id_carrera', '$numero_estudiantes', '$grado_academico')";

    if ($conexion->query($consulta) === TRUE) {
        // Mostrar mensaje de éxito utilizando JavaScript
        echo "<script>alert('Datos insertados correctamente');</script>";
    } else {
        // Mostrar mensaje de error utilizando JavaScript
        echo "<script>alert('Error al insertar datos');</script>";
    }

    // Redirigir a la página de origen
    echo "<script>window.location.href = 'main_grupos.php';</script>";
    exit();
?>
