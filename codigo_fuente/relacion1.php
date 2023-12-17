<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["id_grupo"])) {
        $id_grupo = $_POST["id_grupo"];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Horarios</title>
    <link rel="stylesheet" type="text/css" href="styles_crear.css">
    <script src="script_main.js"></script>
</head>
<body>

<div id="titulo">
    Relacion grupo
</div>

<div id="contenedor1">
    <div id="titulo-contenedor1">
        Ingresa el grupo
    </div>
    <div id="ingreso-datos">
        <form action="seleccionar_materia_profesor.php" method="post">
        <input type="hidden" name="id_grupo" value="<?php echo $id_grupo; ?>">
            <select id="grupo" name="id_grupo" required>
                <option value="" disabled selected>Selecciona un grupo</option>
                <!-- OPCIONES DEL SELECT -->
                <!-- PHP code for populating dropdown options -->
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

                    // Consulta para obtener los grupos de una carrera
                    $id_carrera = $_POST["id_carrera"]; // Se recupera el valor seleccionado
                    $query = "SELECT id_grupo, nombre_grupo FROM grupos WHERE id_carrera = '$id_carrera'";
                    $resultado = mysqli_query($conn, $query);

                    // Muestra los grupos como opciones en el menú desplegable
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo "<option value='" . $fila['id_grupo'] . "'>" . $fila['nombre_grupo'] . "</option>";
                    }

                    // Cierra la conexión a la base de datos
                    mysqli_close($conn);
                }
                ?>
            </select>
            <div id="boton-contenedor1">
                <button type="submit" name="Crear">Crear Horario</button>
            </div>
        </form>
    </div>

    <div id="volver">
        <form action="relacion.php">
            <input type="submit" value="Volver">
        </form>
    </div>
</div>
</body>
</html>

