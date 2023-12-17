<?php
// Verificar si se recibieron datos mediante POST
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id_profesor"]) && isset($_POST["horas_disponibles"])) {
    // Imprimir los datos recibidos para depurar
    echo "Datos recibidos por POST:<br>";
    $idProfesor = $_POST["id_profesor"];
    $horasDisponibles = $_POST["horas_disponibles"];

    if (empty($horasDisponibles)) {
        $horasDisponibles = "85";
    }
    // Validar que se recibieron los datos requeridos
    if (empty($idProfesor) || empty($horasDisponibles)) {
        die("Error: Datos incompletos.");
    }

    // Sanitizar los datos para evitar ataques de inyección de SQL
    $idProfesor = intval($idProfesor); // Convertir a entero
    $horasDisponibles = explode(",", $horasDisponibles); // Convertir la cadena en un array

    // Convertir cada elemento del array a entero
    $horasDisponibles = array_map('intval', $horasDisponibles);

    // Crear una conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bd_gheu";
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Iniciar una transacción para asegurar la integridad de los datos
    $conn->autocommit(false);

    try {
        // Verificar si existen registros en la tabla horarios para el profesor
        $sqlCheckHorarios = "SELECT COUNT(*) as count FROM horarios h
                             INNER JOIN grupo_materia_profesor gmp ON h.id_grupo_materia_profesor = gmp.id_grupo_materia_profesor
                             WHERE gmp.id_profesor = $idProfesor";
        $resultCheckHorarios = $conn->query($sqlCheckHorarios);

        if (!$resultCheckHorarios) {
            throw new Exception("Error al verificar horarios: " . $conn->error);
        }

        $row = $resultCheckHorarios->fetch_assoc();
        $horariosCount = intval($row["count"]);

        if ($horariosCount > 0) {
            echo "<script>alert('No se pueden guardar los datos. El profesor ya tiene registros en la tabla de horarios.');</script>";
            echo "<script>window.location.href = 'disponibilidad_profesores.php';</script>";
        } else {
            // Eliminar todos los registros de disponibilidad del profesor previos
            $sqlDelete = "DELETE FROM disponibilidad_profesores WHERE id_profesor = $idProfesor";
            if (!$conn->query($sqlDelete)) {
                throw new Exception("Error al eliminar registros anteriores: " . $conn->error);
            }

            // Insertar los nuevos registros de disponibilidad
            foreach ($horasDisponibles as $idHora) {
                $sqlInsert = "INSERT INTO disponibilidad_profesores (id_profesor, id_hora_profesor) VALUES ($idProfesor, $idHora)";
                if (!$conn->query($sqlInsert)) {
                    throw new Exception("Error al insertar disponibilidad: " . $conn->error);
                }
            }

            // Confirmar la transacción
            $conn->commit();
            echo "<script>alert('Datos guardados correctamente');</script>";
            echo "<script>window.location.href = 'disponibilidad_profesores.php';</script>";
        }
    } catch (Exception $e) {
        // Si ocurre algún error, deshacer la transacción
        $conn->rollback();
        echo "Error al guardar datos de disponibilidad: " . $e->getMessage();
    }

    // Cerrar la conexión
    $conn->close();
} else {
    echo "Acceso no autorizado.";
}
?>
