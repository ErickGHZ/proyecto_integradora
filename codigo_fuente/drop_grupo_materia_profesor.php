<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" ) {
    $id_grupo_materia_profesor_seleccionado = $_POST["id_carrera_seleccionada"];

    $conexion = new mysqli("localhost", "root", "", "bd_gheu");

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    $id_grupo_materia_profesor_seleccionado = $conexion->real_escape_string($id_grupo_materia_profesor_seleccionado);

    // Construir la consulta para eliminar la fila seleccionada
    $sql = "DELETE FROM grupo_materia_profesor WHERE id_grupo_materia_profesor = '$id_grupo_materia_profesor_seleccionado'";

    if ($conexion->query($sql) === TRUE) {
        echo "<script>alert('Fila eliminada correctamente');</script>";
        echo "<script>window.location.href = 'seleccionar_materia_profesor.php';</script>";
    } else {
        echo "<script>alert('Error al eliminar la fila: ' . $conexion->error);</script>";
    }

    $conexion->close();
}
?>
