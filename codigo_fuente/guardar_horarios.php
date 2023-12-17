<?php
session_start(); // Iniciar la sesión

// Verificar si se ha establecido el ID del grupo en la sesión
if (isset($_SESSION["id_grupo"])) {
    $idGrupo = $_SESSION["id_grupo"];

    // Configuración de la conexión a la base de datos
    $host = 'localhost';
    $usuario = 'root';
    $contraseña = '';
    $base_de_datos = 'bd_gheu';

    $conexion = new mysqli($host, $usuario, $contraseña, $base_de_datos);

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Comenzar una transacción
    $conexion->autocommit(false);

    // Sentencia DELETE con JOIN para eliminar registros relacionados con el grupo
    $query = "DELETE h FROM horarios h
            JOIN grupo_materia_profesor gmp ON h.id_grupo_materia_profesor = gmp.id_grupo_materia_profesor
            WHERE gmp.id_grupo = '$idGrupo'";

    if ($conexion->query($query)) {
       

        // Continuar con la inserción de horarios

        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["datosHorarios"])) {
            $datosHorariosJSON = $_POST["datosHorarios"];
            $datosHorarios = json_decode($datosHorariosJSON, true); // Decodificar el JSON en un arreglo asociativo

            // Escribir los datos en un archivo de registro para depuración
     

            $successCount = 0;

            foreach ($datosHorarios as $datos) {
                $idHoraHorario = $datos["idHoraHorario"];
                $idGrupoMateriaProfesor = $datos["idGrupoMateriaProfesor"];

                $sqlInsert = "INSERT INTO horarios (id_grupo_materia_profesor, id_hora_horario) VALUES ('$idGrupoMateriaProfesor', '$idHoraHorario')";

                try {
                    if ($conexion->query($sqlInsert)) {
                        echo "Horario insertado exitosamente.<br>";
                        $successCount++;
                    } else {
                        throw new Exception("Error al insertar horario: " . $conexion->error);
                    }
                } catch (Exception $e) {
                    // Mostrar un alert y redirigir a la página anterior
                    echo "<script>alert('" . $e->getMessage() . "'); window.location.href = 'crear_horario.php';</script>";
                    exit;
                }
            }

            if ($successCount == count($datosHorarios)) {
                // Si no se detectaron errores en ninguno de los registros, confirmar la transacción
                $conexion->commit();
                echo "<script>window.location.href = 'crear_horario.php';</script>";
            } else {
                // Si hubo errores en algunos registros, realizar un rollback y redirigir
                $conexion->rollback();
                echo "<script>alert('Se produjeron errores al insertar los horarios.');</script>";
                echo "<script>window.location.href = 'crear_horario.php';</script>"; // Cambia 'tu_pagina.php' por la página a la que deseas redirigir
            }
        } else {
            echo "Acceso no autorizado.";
        }
    } else {
        // Manejar el caso de error en la eliminación de registros
    }

    // Cerrar la conexión
    $conexion->close();
} else {
    echo "No se ha proporcionado un ID de grupo.";
}
?>
