<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id_profesor_seleccionada"])) {
    $id_profesor_seleccionada = $_POST["id_profesor_seleccionada"];

    $conexion = new mysqli("localhost", "root", "", "bd_gheu");

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    $id_profesor_seleccionada = $conexion->real_escape_string($id_profesor_seleccionada);

    // Verificar si hay registros relacionados en la tabla disponibilidad_aulas
    $sql_relacionados_disponibilidad_profesores = "SELECT id_profesor FROM disponibilidad_profesores WHERE id_profesor = '$id_profesor_seleccionada'";
    $resultado_relacionados_disponibilidad_profesores = $conexion->query($sql_relacionados_disponibilidad_profesores);

    $sql_relacionados_horarios = "SELECT id_profesor FROM horarios WHERE id_profesor = '$id_profesor_seleccionada'";
    $resultado_relacionados_horarios = $conexion->query($sql_relacionados_horarios);

    if ($resultado_relacionados_disponibilidad_profesores->num_rows > 0 && $resultado_relacionados_horarios->num_rows > 0) {
        echo "<script>alert('No se puede eliminar el profesor seleccionado porque tiene registros relacionados en ambas tablas: disponibilidada_profesores y horarios.');</script>";
        echo "<script>window.location.href = 'eliminar_profesores.php';</script>";
    } elseif ($resultado_relacionados_disponibilidad_profesores->num_rows > 0) {
        echo "<script>alert('No se puede eliminar el profesor seleccionado porque tiene registros relacionados en la tabla disponibilidada_profesores.');</script>";
        echo "<script>window.location.href = 'eliminar_profesores.php';</script>";
    } elseif ($resultado_relacionados_horarios->num_rows > 0) {
        echo "<script>alert('No se puede eliminar el grupo seleccionado porque tiene registros relacionados en la tabla horarios.');</script>";
        echo "<script>window.location.href = 'eliminar_profesores.php';</script>";
    } else {
        // Construir la consulta para eliminar el aula seleccionada
        $sql = "DELETE FROM profesores WHERE id_profesor = '$id_profesor_seleccionada'";

        if ($conexion->query($sql) === TRUE) {
            echo "<script>alert('Profesor eliminada correctamente');</script>";
            echo "<script>window.location.href = 'eliminar_profesores.php';</script>";
  
        } else {
            echo "<script>alert('Error al eliminar el rofesor: ' . $conexion->error);</script>";
            echo "<script>window.location.href = 'eliminar_profesores.php';</script>";
  
        }

  
    }
   
}
?>
