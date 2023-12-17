<?php
session_start(); // Iniciar la sesión

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["id_grupo"])) {
        $_SESSION["id_grupo"] = $_POST["id_grupo"]; // Almacenar el valor en la sesión
        $id_grupo = $_POST["id_grupo"]; // Asignar el valor a la variable local
    }
}

?>



<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles_seleccionar_materia_profesor.css">
    <script src="script_main.js"></script>
</head>
<body>

<div id="titulo">COMIENZA&nbsp; A&nbsp; REGISTRAR</div>

    <div id="contenedor1">
        <div id="titulo-contenedor1">
            <p id="p">Ingresa materia, profesor y color</p>
        </div>

        <!-- Formulario combinado -->
        <div class="formulario">
            <form action="insertar_g_m_p.php" method="post">
                <div>
                    <select id="selecciona_profesor" name="id_profesor" required>
                    <option value="" disabled selected>Selecciona un profesor</option>
                        <?php
                        $host = 'localhost';
                        $usuario = 'root';
                        $contraseña = '';
                        $base_de_datos = 'bd_gheu';

                        $conn = mysqli_connect($host, $usuario, $contraseña, $base_de_datos);

                        if (!$conn) {
                            die("Error de conexión: " . mysqli_connect_error());
                        }

                        $query = "SELECT id_profesor, nombre_profesor, apellidos FROM profesores";
                        $resultado = mysqli_query($conn, $query);

                        while ($fila = mysqli_fetch_assoc($resultado)) {
                            echo "<option value='" . $fila['id_profesor'] . "'>" . $fila['nombre_profesor'] . " " . $fila['apellidos'] . "</option>";
                        }

                        mysqli_close($conn);
                        ?>
                    </select>
                </div>
                <div>
                    <select id="selecciona_materia" name="id_materia" required>
                    <option value="" disabled selected>Selecciona una materia</option>
                    <?php
                        $conn = mysqli_connect($host, $usuario, $contraseña, $base_de_datos);

                        if (!$conn) {
                            die("Error de conexión: " . mysqli_connect_error());
                        }

                        $query = "SELECT id_materia, nombre_materia, hora_semanal FROM materias";
                        $resultado = mysqli_query($conn, $query);

                        while ($fila = mysqli_fetch_assoc($resultado)) {
                            $id_materia = $fila['id_materia'];
                            $nombre_materia = $fila['nombre_materia'];
                            $hora_semanal = $fila['hora_semanal'];
                        
                            echo "<option value='" . $id_materia . "'>" . $nombre_materia . "</option>";
                        }
                        

                        mysqli_close($conn);

                        // Ahora puedes usar $valor_para_otro_lugar en otra parte del código
                    ?>


                    </select>
                </div>

                <div class="selecciona_color" id="selecciona_color">
                    <label for="color">Selecciona un color:</label>
                    <input type="color" id="colorPicker" name="color" required>
                </div>



                
                <!-- Dentro del formulario -->
            

                <input type="hidden" name="id_grupo" value="<?php echo $id_grupo; ?>">
            
                <div id="boton-contenedor1">
                    <input type="submit" value="Ingresar Información">
                </div>
             
            </form>
        </div> 
        
        <div id="volver">
          <form action="relacion.php">
          <input type="submit" value="Volver">
        </form>
    </div>

    <div id="volver">
        <form action="crear_horario.php">
            <input type="submit" value="Crear Horario">
        </form>
        

    </div>




<div id="contenedor2">
    <div id="titulo-contenedor2">
        <p>Datos</p>
    </div>

    <div id="tabla-contenedor" class="tabla-contenedor">
    <form action="drop_grupo_materia_profesor.php" method="post" onsubmit="return confirm('¿Estás seguro de eliminar la fila seleccionada?');">
            <table>
            <tr>
                    <th>ID Grupo-Materia-Profesor</th> <!-- Nueva columna para el ID -->
                    <th>Nombre del grupo</th>
                    <th>Nombre de la materia</th>
                    <th>Nombre del profesor</th> 
                    <th>Color</th>   
                </tr>
                <?php
                $id_grupo = $_SESSION["id_grupo"]; 
     
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "bd_gheu";

                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                }

                

                $sql = "SELECT grupo_materia_profesor.id_grupo_materia_profesor, grupos.nombre_grupo, materias.nombre_materia, profesores.nombre_profesor, profesores.apellidos, grupo_materia_profesor.color
                    FROM grupo_materia_profesor
                    INNER JOIN grupos ON grupo_materia_profesor.id_grupo = grupos.id_grupo
                    INNER JOIN materias ON grupo_materia_profesor.id_materia = materias.id_materia
                    INNER JOIN profesores ON grupo_materia_profesor.id_profesor = profesores.id_profesor
                    WHERE grupo_materia_profesor.id_grupo = '$id_grupo'";

                
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($fila = $result->fetch_assoc()) {
                        echo "<tr onclick='seleccionarFilaCarrera(this, " . $fila["id_grupo_materia_profesor"] . ")'>";
                        echo "<td>" . $fila["id_grupo_materia_profesor"] . "</td>";
                        echo "<td>" . $fila["nombre_grupo"] . "</td>";
                        echo "<td>" . $fila["nombre_materia"] . "</td>";
                        echo "<td>" . $fila["nombre_profesor"] . " " . $fila["apellidos"] . "</td>";
                        echo "<td style='background-color: " . $fila["color"] . ";'></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No hay datos almacenados en la tabla.</td></tr>";
                }
                

                $conn->close();

                ?>
            </table>
            </div>
            <div id="boton-contenedor2">

            <input type="hidden" name="id_carrera_seleccionada" id="id_carrera_seleccionada" value="">
            <input type="submit" value="Eliminar">
            </div> 
        </form>
   
 
</div>

</body>
</html>
