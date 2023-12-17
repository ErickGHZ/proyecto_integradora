<?php
session_start(); // Iniciar la sesión

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_SESSION["id_grupo"])) {
        $id_grupo = $_SESSION["id_grupo"];
    }

    $id_profesor = $_POST['id_profesor'];
    $id_materia = $_POST['id_materia'];
    $color = $_POST['color'];

    // Consulta para obtener la hora_semanal desde la tabla materias
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bd_gheu";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta para obtener la hora_semanal
    $query_hora_semanal = "SELECT hora_semanal FROM materias WHERE id_materia = '$id_materia'";
    $result_hora_semanal = $conn->query($query_hora_semanal);

    if ($result_hora_semanal->num_rows > 0) {
        $row = $result_hora_semanal->fetch_assoc();
        $hora_semanal = $row['hora_semanal'];
    } else {
        $hora_semanal = "No disponible";
    }

    // Resto del código de procesamiento y manejo de la base de datos
    echo "ID del profesor: " . $id_profesor . "<br>";
    echo "ID de la materia: " . $id_materia . "<br>";
    echo "Color seleccionado: " . $color . "<br>";
    echo "Horas semanales: " . $hora_semanal . "<br>";

    $sql_insert = "INSERT INTO grupo_materia_profesor (id_grupo, id_materia, id_profesor, horas_asignadas, horas_semanal, color) VALUES ('$id_grupo', '$id_materia', '$id_profesor','$hora_semanal','$hora_semanal', '$color')";

    if ($conn->query($sql_insert) === TRUE) {
        echo "<script>alert('Datos insertados correctamente');</script>";
        echo "<script>window.location.href = 'seleccionar_materia_profesor.php';</script>";
    } else {
        echo "Error al insertar datos: " . $conn->error;
    }

    $conn->close();
}
?>
