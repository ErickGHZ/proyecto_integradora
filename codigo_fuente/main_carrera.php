<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd_gheu";

// Crear una conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener los datos de la tabla aulas
$sql = "SELECT * FROM carreras";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles_main_carrera.css">
    <script src="script_main.js"></script>
</head>
<body>
<div id="header">
    <!-- Botón desplegable -->
  <div class="dropdown">
      <img class="dropbtn" onclick="toggleMenu()" src="img/menu.png" alt="Imagen" width="25" height="25"></img>
      <div class="dropdown-content" id="menuContent">
        <img class="close-button" onclick="toggleMenu()" src="img/menu.png" alt="Imagen" width="25" height="25"></img>
        <!-- Opciones del botón desplegable -->
        <a class="opcion-des">Carreras</a>
        <a href="main_grupos.php">Grupos</a>
        <a href="main_materias.php">Materias</a>
        <a href="main_profesores.php">Profesores</a>
        <a href="crear.php">Crear</a>
      </div>


    <!-- Otras opciones del header -->
    <a class="opcion-destacada">Ingresar</a>
    <a href="modificar_carrera.php">Modificar</a>
    <a href="eliminar_carrera.php">Eliminar</a>
    <a href="crear.php">Crear</a>
    <a href="perfil.php">
        <img src="img/usuario.png" alt="Imagen" width="25" height="25">
      </a>
  </div>
</div>



    <div id="titulo">COMIENZA&nbsp; A&nbsp; CREAR</div>


    <div id="contenedor1">
      <div id="titulo-contenedor1">
        <p id="p">Ingresa la carrera</p>
      </div>

      <div id="ingreso-datos">
        <form action="insertar_carrera.php" method="post" >
          <div><input type="text" id="nombre_carrera" name="nombre_carrera" placeholder="Nombre de la carrera" required autocomplete="off"></div>
          <div><select id="tipo" name="tipo" required>
              <option value="" disabled selected>Tipo</option>
              <option value="Licenciatura">Licenciatura</option>
              <option value="Ingenieria">Ingenieria</option>
              <option value="TSU">TSU</option>  </select></div>
          <div><select id="tipo" name="modelo" required>
            <option value="" disabled selected>Modelo de la carrera</option>
            <option value="Cuatrimestre">Cuatrimestres</option>
            <option value="Semestre">Semestres</option>
            <option value="Trimestre">Trimestres</option>
            <option value="Bimestre">Bimestres</option>
              </select></div>  
            <div>
              <input type="number" id="duracion" name="duracion" placeholder="Duracion del modelo" min="1" max="14" oninput="valorMaximo1(this)" required></div>
            </div>  
        <div id="boton-contenedor1">
          <input type="submit" value="Ingresar Informacion" >
        </div>
      </form>  
      </div>

      <div id="contenedor2">
  <div id="titulo-contenedor2">
    <p>Datos</p>
  </div>

<div id="tabla-contenedor" class="tabla-contenedor">
<table>
        <tr>
            <th>Nombre de la carrera</th>
            <th>Tipo de carrera</th>
            <th>Modelo de la Carrera</th>
            <th>Duracion de la carrera</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["nombre_carrera"] . "</td>";
                echo "<td>" . $row["tipo"] . "</td>";
                echo "<td>" . $row["modelo"] . "</td>";
                echo "<td>" . $row["duracion"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No hay datos almacenados en la tabla.</td></tr>";
        }
        ?>
    </table>
</div>  

<div id="boton-contenedor2">
  <form action="disponibilidad_aulas.php">
    <input type="submit" value="Agregar disponibilidad">
  </form>
</div>
</div>
</body>
</html>
