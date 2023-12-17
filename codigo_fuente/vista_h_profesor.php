<?php
session_start(); // Iniciar la sesión

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["id_profesor"])) {
        $_SESSION["id_profesor"] = $_POST["id_profesor"]; // Almacenar el valor en la sesión
    }
}

// Verificar si el valor está almacenado en la sesión correctamente
if (isset($_SESSION["id_profesor"])) {
    $id_profesor = $_SESSION["id_profesor"];

    // Configuración de la conexión a la base de datos
    $host = 'localhost';
    $usuario = 'root';
    $contraseña = '';
    $base_de_datos = 'bd_gheu';

    // Conexión a la base de datos
    $conn = mysqli_connect($host, $usuario, $contraseña, $base_de_datos);

    // Verifica la conexión
    if (!$conn) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Consulta para obtener el nombre del profesor
    $queryProfesor = "SELECT nombre_profesor, apellidos FROM profesores WHERE id_profesor = '$id_profesor'";
    $resultProfesor = mysqli_query($conn, $queryProfesor);
    $rowProfesor = mysqli_fetch_assoc($resultProfesor);

    $nombre_profesor = $rowProfesor["nombre_profesor"] . ' ' . $rowProfesor["apellidos"];

    // Cierra la conexión a la base de datos
    mysqli_close($conn);
} else {
    echo "<script>alert('No se ha seleccionado un profesor'); window.location.href = 'ruta_hacia_formulario.php';</script>";
    exit; // Salir del script si no se ha seleccionado un profesor
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Asignacion</title>
    <link rel="stylesheet" type="text/css" href="styles_vista_h_profe.css">
    <script src="script_main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
</head>
<body>

<div id="titulo">
    Horario del profesor <?php echo $nombre_profesor; ?>
</div>
<div id="contenedor3">
    <div id="tabla-contenedor3" class="tabla-contenedor3">
        <?php

        $host = 'localhost';
        $usuario = 'root';
        $contraseña = '';
        $base_de_datos = 'bd_gheu';
            // Sanitizar el valor de id_profesor_seleccionada para evitar ataques de inyección de SQL
           
            $conn = mysqli_connect($host, $usuario, $contraseña, $base_de_datos);

            $conexion = new mysqli("localhost", "root", "", "bd_gheu");

            if (!$conn) {
                die("Error de conexión: " . mysqli_connect_error());
            }

            // Query the disponibilidad_profesores table
            $sql = "SELECT h.*, gmp.*
            FROM horarios h
            JOIN grupo_materia_profesor gmp ON h.id_grupo_materia_profesor = gmp.id_grupo_materia_profesor
            WHERE gmp.id_profesor = '{$_SESSION["id_profesor"]}'";

            $result = mysqli_query($conn, $sql);

            // Crear un arreglo para almacenar los datos de cada hora y su profesor correspondiente
            $dataByHora = array();
            while ($row = $result->fetch_assoc()) {
                $id_hora_horario = $row["id_hora_horario"];
                $dataByHora[$id_hora_horario] = array(
                    "Profesor" => $row["id_grupo_materia_profesor"],
                );
            }

            // Crear la tabla HTML con los resultados de la consulta
            echo '<table id="tabla3" class="tabla3">';
            echo '<thead>';
            echo '<tr>';
            echo '<th id="hora">Hora</th>';
            echo '<th id="lunes">Lunes</th>';
            echo '<th id="martes">Martes</th>';
            echo '<th id="miercoles">Miércoles</th>';
            echo '<th id="jueves">Jueves</th>';
            echo '<th id="viernes">Viernes</th>';
            echo '<th id="sabado">Sábado</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            // Generar las filas y celdas de la tabla con los datos correspondientes
            for ($hora = 7; $hora <= 20; $hora++) {
                echo '<tr>';
                echo '<td class="hora">' . $hora . ':00 - ' . ($hora + 1) . ':00</td>';
                for ($dia = 1; $dia <= 6; $dia++) {
                    // Calcular los índices de acuerdo a la relación específica
                    $i = ($hora - 6) + ($dia - 1) * 14;
            
                    // Mostrar el nombre del profesor, apellidos y la materia en las celdas disponibles
                    if (isset($dataByHora[$i]) && isset($dataByHora[$i]["Profesor"])) {
                        $idProfesor = $dataByHora[$i]["Profesor"];
                        
                        // Obtener el ID de la materia, el nombre del grupo, y la materia desde la base de datos
                        $queryInfo = "SELECT gmp.id_materia, g.nombre_grupo, m.nombre_materia, gmp.color
                                      FROM grupo_materia_profesor gmp
                                      JOIN grupos g ON gmp.id_grupo = g.id_grupo
                                      JOIN materias m ON gmp.id_materia = m.id_materia
                                      WHERE gmp.id_grupo_materia_profesor = '$idProfesor'";
                        
                        $resultInfo = mysqli_query($conn, $queryInfo);
                        
                        if ($rowInfo = mysqli_fetch_assoc($resultInfo)) {
                            $nombregrupo = $rowInfo["nombre_grupo"];
                            $nombreMateria = $rowInfo["nombre_materia"];
                            $color = $rowInfo["color"]; // Obtener el valor del color
                            
                            echo '<td id="' . $i . '" onmousedown="handleMouseDown(event)" onmouseover="handleMouseOver(event)" onmouseup="handleMouseUp(event)" class="' . $idProfesor . '" style="background-color: ' . $color . ';">' . $nombregrupo . '<br>' . $nombreMateria . '</td>';
                        } else {
                            // Manejo de error si no se encuentra la información
                            echo '<td id="' . $i . '" onmousedown="handleMouseDown(event)" onmouseover="handleMouseOver(event)" onmouseup="handleMouseUp(event)" style="background-color: white;">Error: Información no encontrada</td>';
                        }
                    } else {
                        // Si la celda no tiene datos de profesor, mostrar una celda vacía
                        echo '<td id="' . $i . '" onmousedown="handleMouseDown(event)" onmouseover="handleMouseOver(event)" onmouseup="handleMouseUp(event)"></td>';
                    }
                }
                echo '</tr>'; // Cierre de la fila actual
            }
            echo '</tbody>';
            echo '</table>';
            ?>
    </div>
</div>
    <div id="regresar">
        <div id="volver">
            <form action="vista.php">
                <input type="submit" value="Volver">
            </form>
        </div>
    </div>   
    <div id="imprimir">
        <div id="boton">

             <button id="imprimirButton">Imprimir</button>
        </div>
    </div>

    <div id="exportar">
    <div id="boton">
         <button id="exportarExcelButton">Exportar</button>
    </div>
</div>
    <script>
    document.getElementById("imprimirButton").addEventListener("click", function() {
        imprimirContenido();
    });

    function imprimirContenido() {
        var contenidoAImprimir = `
            <style>
                /* Estilos de impresión */
                body {
                    background-color: white;
                }
                .titulo-impresion {
                    font-size: 30px; /* Tamaño de letra más grande para el título */
                }
                .tabla3 th, .tabla3 td {
                    border: 1px solid black;
                    font-size: 14px; /* Tamaño de letra más pequeño */
                }
                .tabla3 td {
                    color: black; /* Color de texto para las celdas */
                }
                /* Copia y pega aquí los estilos de styles_vista_h_profe.css relevantes para la tabla */
                .container {
                    border: 2px solid #000;
                    padding: 10px;
                }
                .table {
                    border-collapse: collapse;
                    width: 100%;
                    margin-top: 10px;
                }
                /* Agrega otros estilos de impresión aquí */
            </style>
            <div class="titulo-impresion">${document.getElementById("titulo").innerHTML}</div>
            ${document.getElementById("contenedor3").outerHTML}
        `;
        
        var ventanaImprimir = window.open("", "_blank");
        ventanaImprimir.document.write(contenidoAImprimir);
        ventanaImprimir.document.close();
        ventanaImprimir.print();
        ventanaImprimir.close();
    }
</script>

<script>
    document.getElementById("exportarExcelButton").addEventListener("click", function() {
        exportarAExcel();
    });

    function exportarAExcel() {
        const tabla = document.querySelector('.tabla3');
        const nombreArchivo = "horario_profesor.xlsx";
        const hojaNombre = "Horario";

        const filas = tabla.querySelectorAll('tr');
        const data = [];

        // Agregar la cabecera de la tabla como la primera fila en los datos
        const cabecera = tabla.querySelector('thead tr');
        const cabeceraData = [];
        for (const celda of cabecera.querySelectorAll('th')) {
            cabeceraData.push(celda.innerText);
        }
        data.push(cabeceraData);

        for (const fila of filas) {
            const celdas = fila.querySelectorAll('td');
            const filaData = [];
            for (const celda of celdas) {
                filaData.push(celda.innerText);
            }
            data.push(filaData);
        }

        const wb = XLSX.utils.book_new();
        const ws = XLSX.utils.aoa_to_sheet(data);

        XLSX.utils.book_append_sheet(wb, ws, hojaNombre);
        XLSX.writeFile(wb, nombreArchivo);
    }
</script>


</div>
</body>
</html>
