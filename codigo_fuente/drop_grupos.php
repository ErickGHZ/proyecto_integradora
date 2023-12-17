<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id_grupo_seleccionada"])) {
    $id_grupo_seleccionada = $_POST["id_grupo_seleccionada"];

    $conexion = new mysqli("localhost", "root", "", "bd_gheu");

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    $id_grupo_seleccionada = $conexion->real_escape_string($id_grupo_seleccionada);


        $sql = "DELETE FROM grupos WHERE id_grupo = '$id_grupo_seleccionada'";
        if ($conexion->query($sql) === TRUE) {
            echo "<script>alert('Grupo eliminado correctamente');</script>";
            echo "<script>window.location.href = 'eliminar_grupos.php';</script>";
        } else {
            echo "<script>alert('Error al eliminar el grupo: ' . $conexion->error);</script>";
            echo "<script>window.location.href = 'eliminar_grupos.php';</script>";
        }
    }
?>
