<?php
          if ($_SERVER["REQUEST_METHOD"] === "POST") {
         
                
                // Verificar si el valor de id_profesor_seleccionada está definido y no es vacío
                if (isset($_POST["id_profesor_seleccionada"]) && !empty($_POST["id_profesor_seleccionada"])) {
                    $terminoBusqueda = $_POST["id_profesor_seleccionada"];
    
                    $conexion = new mysqli("localhost", "root", "", "bd_gheu");
    
                    if ($conexion->connect_error) {
                        die("Conexión fallida: " . $conexion->connect_error);
                    }
    
                    // Sanitizar el valor de id_profesor_seleccionada para evitar ataques de inyección de SQL
                    $terminoBusqueda = mysqli_real_escape_string($conexion, $terminoBusqueda);
    
                    // Query the disponibilidad_profesores table
                    $sql = "SELECT id_profesor, id_hora_profesor FROM disponibilidad_profesores WHERE id_profesor=$terminoBusqueda";
                    $result = $conexion->query($sql);
    
                    echo '<table id="tabla2" class="tabla2">';
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
                    
                    // Definir un arreglo para almacenar el estado de cada celda (available o occupied)
                    $estadoCeldas = array();
                    
                    // Inicializar todas las celdas como occupied
                    for ($i = 1; $i <= 84; $i++) {
                        $estadoCeldas[$i] = "occupied";
                    }
                    
                    // Actualizar el estado de las celdas a available si corresponden a la disponibilidad del profesor
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $id_hora_profesor = $row["id_hora_profesor"];
                            $estadoCeldas[$id_hora_profesor] = "available";
                        }
                    }
                    
                    // Generar las filas y celdas de la tabla con los estados correspondientes
                    for ($hora = 7; $hora <= 20; $hora++) {
                        echo '<tr>';
                        echo '<td class="hora">' . $hora . ':00 - ' . ($hora + 1) . ':00</td>';
                        for ($dia = 1; $dia <= 6; $dia++) {
                            $i = ($dia - 1) * 14 + $hora - 6; // Calcular el índice correcto
                            $estado = $estadoCeldas[$i];
                            echo '<td id="' . $i . '" class="' . $estado . '" onmousedown="handleMouseDown(event)" onmouseover="handleMouseOver(event)" onmouseup="handleMouseUp(event)"></td>';
                        }
                        echo '</tr>';
                    }
                    
                    echo '</tbody>';
                    echo '</table>';
                    
                    
                } 
            }
        
    ?>