<?php
$conexion = new mysqli("localhost", "root", "", "bd_gheu");

if ($conexion->connect_error) {
    die("La conexión falló: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idMateria = $_POST["id_materia"];
    $nombreMateria = $_POST["nombre_materia"];
    $horasTotales = $_POST["horas_totales"];
    $horaSemanal = $_POST["hora_semanal"];

    $sqlActualizarCarrera = "UPDATE materias SET nombre_materia='$nombreMateria', horas_totales='$horasTotales', hora_semanal='$horaSemanal' WHERE id_materia='$idMateria'";

    if ($conexion->query($sqlActualizarCarrera) === TRUE) {
        echo "<script>alert('Datos actualizados correctamente');</script>";

    } else {
        echo "Error al actualizar la información de la materia: " . $conexion->error;
    }
}
echo "<script>window.location.href = 'modificar_materias.php';</script>";
$conexion->close();
?>
