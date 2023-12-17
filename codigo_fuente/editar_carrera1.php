<?php
$conexion = new mysqli("localhost", "root", "", "bd_gheu");

if ($conexion->connect_error) {
    die("La conexión falló: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idCarrera = $_POST["id_carrera_seleccionada"];
    $nombreCarrera = $_POST["nombre_carrera"];
    $tipo = $_POST["tipo"];
    $modelo = $_POST["modelo"];
    $duracion = $_POST["duracion"];

    $sqlActualizarCarrera = "UPDATE carreras SET nombre_carrera='$nombreCarrera', tipo='$tipo', modelo='$modelo', duracion='$duracion' WHERE id_carrera='$idCarrera'";

    if ($conexion->query($sqlActualizarCarrera) === TRUE) {
        echo "<script>alert('Datos actualizados correctamente');</script>";

    } else {
        echo "Error al actualizar la información de la carrera: " . $conexion->error;
    }
}
echo "<script>window.location.href = 'modificar_carrera.php';</script>";
$conexion->close();
?>
