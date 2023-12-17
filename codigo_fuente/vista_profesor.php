<?php
session_start(); // Iniciar la sesión

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["id_carrera"])) {
        $_SESSION["id_carrera"] = $_POST["id_carrera"]; // Almacenar el valor en la sesión
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Asignacion</title>
    <link rel="stylesheet" type="text/css" href="styles_vista_h.css">
    <script src="script_main.js"></script>
</head>
<body>

<div id="titulo">
    Elige tu profesor
</div>

<div id="contenedor1">
    <div id="titulo-contenedor1">
        Ingresa la informaión
    </div>
    <div id="ingreso-datos">
        <form action="vista_h_profesor.php" method="post">
        <div id="centro">
        <select id="grupo" name="id_profesor" required>
                <option value="" disabled selected>Selecciona un Profesor</option>
                <!-- PHP code for populating dropdown options -->
                <?php
                    // Configuración de la conexión a la base de datos
                    $host = 'localhost';
                    $usuario = 'root';
                    $contraseña = '';
                    $base_de_datos = 'bd_gheu';

                    // ID del grupo obtenido de la sesión
                    $grupo_id = $_SESSION["id_grupo"];

                    // Conexión a la base de datos
                    $conn = mysqli_connect($host, $usuario, $contraseña, $base_de_datos);

                    // Verifica la conexión
                    if (!$conn) {
                        die("Error de conexión: " . mysqli_connect_error());
                    }

                    // Consulta para obtener los profesores asociados con el grupo especificado
                    $query = "SELECT p.id_profesor, p.nombre_profesor, p.apellidos
                              FROM profesores p
                              INNER JOIN grupo_materia_profesor gmp ON p.id_profesor = gmp.id_profesor
                              WHERE gmp.id_grupo = $grupo_id";
                    $resultado = mysqli_query($conn, $query);

                    // Muestra los profesores asociados con el grupo en el menú desplegable
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo "<option value='" . $fila['id_profesor'] . "'>" . $fila['nombre_profesor'] . " " . $fila['apellidos'] . " </option>";
                    }

                    // Cierra la conexión a la base de datos
                    mysqli_close($conn);
                ?>
            </select>
            

            <div id="ingresar">
                <button type="submit" >Ingresar</button>
            </div>
            </div>
        </form>
    </div>

    <div id="volver">
        <form action="vista.php">
            <input type="submit" value="Volver">
        </form>
    </div>
</div>
</body>
</html>
