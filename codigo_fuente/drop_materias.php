<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id_materia_seleccionada"])) {
    $id_materia_seleccionada = $_POST["id_materia_seleccionada"];

    $conexion = new mysqli("localhost", "root", "", "bd_gheu");

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    $id_materia_seleccionada = $conexion->real_escape_string($id_materia_seleccionada);

    // Verificar si hay registros relacionados en la tabla disponibilidad_aulas
    $sql_relacionados = "SELECT id_materia FROM grupo_materia_profesor WHERE id_materia = '$id_materia_seleccionada'";
    $resultado_relacionados = $conexion->query($sql_relacionados);

    if ($resultado_relacionados->num_rows > 0) {
        echo "<script>alert('No se puede eliminar la materia seleccionada porque tiene registros relacionados en la tabla Horarios.');</script>";
        echo "<script>window.location.href = 'eliminar_materias.php';</script>";
  
    } else {
        // Construir la consulta para eliminar el aula seleccionada
        $sql = "DELETE FROM materias WHERE id_materia = '$id_materia_seleccionada'";

        if ($conexion->query($sql) === TRUE) {
            echo "<script>alert('Materia eliminada correctamente');</script>";
            echo "<script>window.location.href = 'eliminar_materias.php';</script>";
  
        } else {
            echo "<script>alert('Error al eliminar el materia: ' . $conexion->error);</script>";
            echo "<script>window.location.href = 'eliminar_materias.php';</script>";
  
        }

  
    }
   
}
?>
