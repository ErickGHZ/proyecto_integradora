<!DOCTYPE html>
<html>
<head>
    <title>Horarios</title>
    <link rel="stylesheet" type="text/css" href="styles_crear.css">
    <script src="script_main.js"></script>
</head>
<body>

    <div id="titulo">
        Disponibilidad Aulas
  </div>

  
  <div id="contenedor1">
    <div id="titulo-contenedor1">
        Ingresa la carrera
    </div>
    <div id="ingreso-datos">
        <form action="crear1.php" method="post">
            <select id="carrera" name="id_carrera" required>
            <option value="" disabled selected>Selecciona una carrera</option>
            <!-- PHP code for populating dropdown options -->
            <?php
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

            // Consulta para obtener las carreras
            $query = "SELECT id_carrera, nombre_carrera FROM carreras";
            $resultado = mysqli_query($conn, $query);

            // Muestra las carreras como opciones en el menú desplegable
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<option value='" . $fila['id_carrera'] . "'>" . $fila['nombre_carrera'] . "</option>";
            }

            // Cierra la conexión a la base de datos
            mysqli_close($conn);
            ?>
            </select>
            
        <div id="boton-contenedor1">
            <input type="submit" value="Ingresar Informacion">
        </div>
        </form>  
        </div>


    <div id="volver">
          <form action="main_carrera.php">
          <input type="submit" value="Volver">
          </form>
    </div>
        



</div>
</body>
</html>
