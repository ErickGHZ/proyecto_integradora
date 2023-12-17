<?php
$conexion = new mysqli("localhost", "root", "", "bd_gheu");

if ($conexion->connect_error) {
    die("La conexión falló: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idGrupo = $_POST['id_grupo'];
    $nombreGrupo = $_POST['nombre_grupo'];
    $idCarrera = $_POST['id_carrera'];
    $numeroEstudiantes = $_POST['numero_estudiantes'];
    $gradoAcademico = $_POST['duracion'];

    $sqlActualizarCarrera = "UPDATE grupos SET nombre_grupo='$nombreGrupo', id_carrera='$idCarrera', numero_estudiantes='$numeroEstudiantes', grado_academico='$gradoAcademico' WHERE id_grupo='$idGrupo'";

    if ($conexion->query($sqlActualizarCarrera) === TRUE) {
        echo "<script>alert('Datos actualizados correctamente');</script>";

    } else {
        echo "Error al actualizar la información del grupo: " . $conexion->error;
    }
}
echo "<script>window.location.href = 'modificar_carrera.php';</script>";
$conexion->close();
?>
