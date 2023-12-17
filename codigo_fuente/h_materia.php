
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles_h_materia.css">
    <script src="script_main.js"></script>
</head>
<body>

  <div id="titulo">
        Asigna Materias
        <div id="verHorario">
          <form action=".php">
          <input type="submit" value="Ver Horario">
          </form>
        </div>
  </div>

  <div id="contenedor1">
    

        <div id="tabla-contenedor" class="tabla-contenedor">
        <form method="post">
        <table id="tabla1" class="tabla1">
                <tr>
                    <th>Id Materia</th>
                    <th>Nombre</th>
                    <th>Horas totales</th>
                    <th>Horas Semanales</th>
                </tr>
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Configuración de la conexión a la base de datos
                        $host = 'localhost';
                        $usuario = 'root';
                        $contraseña = '';
                        $base_de_datos = 'bd_gheu';

                        $conn = mysqli_connect($host, $usuario, $contraseña, $base_de_datos);

                        $conexion = new mysqli("localhost", "root", "", "bd_gheu");

                        if (!$conn) {
                            die("Error de conexión: " . mysqli_connect_error());
                        }
                        $id_grupo = $_POST["id_grupo"]; // Se recupera el valor seleccionado
                        $query = "SELECT * FROM materias WHERE
                                id_grupo = '$id_grupo'";

                        $resultado = mysqli_query($conn, $query);

                        if ($resultado->num_rows > 0) {
                            while ($fila = $resultado->fetch_assoc()) {
                                echo "<tr onclick='seleccionarFilaAula(this, " . $fila["id_grupo"] . ")'>";
                                echo "<td>" . $fila["id_materia"] . "</td>";
                                echo "<td>" . $fila["nombre_materia"] . "</td>";
                                echo "<td>" . $fila["horas_totales"] . "</td>";
                                echo "<td>" . $fila["hora_semanal"] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No se encontraron resultados.</td></tr>";
                        }

                        $conexion->close();
                    
                  }
                ?>
            </table>
        </div>

        <div id="verDisponibilidad">
            <input type="hidden" name="formulario" value="2">
            <input type="hidden" name="id_aula_seleccionada" id="id_aula_seleccionada" value="">
            <input type="submit" value="Ver Disponibilidad">
        </div>
        </form>
  </div>  


    <div id="contenedor2">
      <div id="titulo-contenedor2">
        Horario con Profesores
      </div>

      <div id="tabla-contenedor2" class="tabla-contenedor2">
      <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
  
        
        // Verificar si el valor de id_profesor_seleccionada está definido y no es vacío
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
            $id_grupo = $_POST["id_grupo"]; 
            // Query the disponibilidad_profesores table
            $sql = "SELECT id_grupo, id_materia, id_profesor, id_aula, id_hora_horario  FROM horarios WHERE id_grupo='$id_grupo'";
$result = mysqli_query($conn, $sql);

// Crear un arreglo para almacenar los datos de cada hora y su profesor correspondiente
$dataByHora = array();
while ($row = $result->fetch_assoc()) {
    $id_hora_horario = $row["id_hora_horario"];
    $dataByHora[$id_hora_horario] = array(
        "Profesor" => $row["id_profesor"],
    );
}

// Crear la tabla HTML con los resultados de la consulta
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

// Generar las filas y celdas de la tabla con los datos correspondientes
for ($hora = 7; $hora <= 20; $hora++) {
    echo '<tr>';
    echo '<td class="hora">' . $hora . ':00-' . ($hora + 1) . ':00</td>';
    for ($dia = 1; $dia <= 6; $dia++) {
        // Calcular los índices de acuerdo a la relación específica
        $i = ($hora - 6) + ($dia - 1) * 14;

        // Mostrar el ID y nombre del profesor en las celdas disponibles
        if (isset($dataByHora[$i]) && isset($dataByHora[$i]["Profesor"])) {
            $idProfesor = $dataByHora[$i]["Profesor"];
            
            // Obtener el nombre del profesor desde la base de datos usando el id_profesor
            $queryProfesor = "SELECT nombre_profesor FROM profesores WHERE id_profesor = '$idProfesor'";
            $resultProfesor = mysqli_query($conn, $queryProfesor);
            $rowProfesor = mysqli_fetch_assoc($resultProfesor);
            $nombreProfesor = $rowProfesor["nombre_profesor"];
            
            echo '<td id="' . $i . '">' . $idProfesor . ' - ' . $nombreProfesor . '</td>';
        } else {
            // Si la celda no tiene datos de profesor, mostrar una celda vacía
            echo '<td id="' . $i . '"></td>';
        }
    }
    echo '</tr>';
}

echo '</tbody>';
echo '</table>';

        
        } else {
            // El valor de id_grupo no está definido o es vacío, hacer algo para manejar este caso
            echo "Por favor, selecciona un grupo válido.";
        }

?>

      </div>  
    </div>    


    <div id="contenedor3">
    <div id="titulo-contenedor2">
        Ingresa Materias
      </div>

      <div id="tabla-contenedor2" class="tabla-contenedor2">
      <?php

        ?>

      </div>  
</div>



<div id="contenedor4">
    <div id="botones-row">
        <div id="regresar">
            <form class="boton-form" action="main_carrera.php">
                <input type="submit" value="Volver">
            </form>
        </div>
        <div id="continuar">
            <form class="boton-form" action="h_aula.php">
                <input type="submit" value="Continuar">
            </form>
        </div>
    </div>
</div>

    <div id="contenedor5">
    <div id="botones-row2">
        <div id="regresar">
            <form class="boton-form2" action="" id="boton-ingresar">
                <input type="submit" value="Ingresar">
            </form>
        </div>
        <div id="continuar">
            <form class="boton-form2" action="" id="boton-eliminar">
                <input type="submit" value="Eliminar">
            </form>
        </div>
    </div>
</div>



</body>
</html>
