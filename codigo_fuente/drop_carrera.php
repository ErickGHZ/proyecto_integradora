<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id_carrera_seleccionada"])) {
    $id_carrera_seleccionada = $_POST["id_carrera_seleccionada"];
    echo $id_carrera_seleccionada;
    $conexion = new mysqli("localhost", "root", "", "bd_gheu");

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    $id_carrera_seleccionada = $conexion->real_escape_string($id_carrera_seleccionada);

        $sql = "DELETE FROM carreras WHERE id_carrera = '$id_carrera_seleccionada'";

        if ($conexion->query($sql) === TRUE) {
            echo "<script>alert('carrera eliminada correctamente');</script>";
            echo "<script>window.location.href = 'eliminar_carrera.php';</script>";
  
        } else {
            
            echo "<script>alert('Error al eliminar la carrera: ' . $conexion->error);</script>";
            echo "<script>window.location.href = 'eliminar_carrera.php';</script>";
  
        }

  
    }
?>
