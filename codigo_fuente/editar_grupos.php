<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles_modificar_grupos.css">
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
        <a href="main_carrera.php">Carreras</a>
        <a class="opcion-des">Grupos</a>
        <a href="main_materias.php">Materias</a>
        <a href="main_profesores.php">Profesores</a>
        <a href="crear.php">Crear</a>
      </div>
   

    <!-- Otras opciones del header -->
    <a href="main_carrera.php">Ingresar</a>
    <a class="opcion-destacada">Modificar</a>
    <a href="Eliminar_carrera.php">Eliminar</a>
    <a href="crear.php">Crear</a>
    <a href="perfil.php">
        <img src="img/usuario.png" alt="Imagen" width="25" height="25">
      </a>
  </div>
</div>
<div id="titulo">
  Te equivocaste? Edita tu Informacion
</div>

  <div id="contenedor2">
    <div id="titulo-contenedor2">
      <p id="p">Nueva Informacion</p>
    </div>
      <div id="ingreso-datos2">
        <form action="editar_grupos1.php" method="post" >            
        <?php
        $conexion = new mysqli("localhost", "root", "", "bd_gheu");
        // Obtener la información del grupo seleccionado
        $idGrupoSeleccionada = $_POST["id_grupo_seleccionada"];
        $sqlObtenerGrupo = "SELECT * FROM grupos WHERE id_grupo = '$idGrupoSeleccionada'";
        $resultadoGrupo = $conexion->query($sqlObtenerGrupo);
        
        if ($resultadoGrupo->num_rows > 0) {
            $filaGrupo = $resultadoGrupo->fetch_assoc();
            $idGrupo = $filaGrupo['id_grupo'];
            $nombreGrupo = $filaGrupo['nombre_grupo'];
            $idCarrera = $filaGrupo['id_carrera'];
            $numeroEstudiantes = $filaGrupo['numero_estudiantes'];
            $gradoAcademico = $filaGrupo['grado_academico'];
            // ... (obtener los valores de otros campos)
        }
                ?>
            <div> <input type="hidden" id="id_grupo" name="id_grupo" placeholder="Id del grupo"  value="<?php echo $idGrupo; ?>"></div>
            <div> <input type="text" id="nombre_grupo" name="nombre_grupo" placeholder="Nombre del Grupo"  value="<?php echo $nombreGrupo; ?>"></div>
            <div>
              <select id="id_carrera" name="id_carrera" required value="<?php echo $idCarrera; ?>">
                    <option value="" disabled selected>Selecciona una carrera</option>
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
            </div>
            <div> <input type="number" id="numero_estudiantes" name="numero_estudiantes" placeholder="Número de estudiantes" min="17" max="30" oninput="valorMaximo2(this)" required value="<?php echo $numeroEstudiantes; ?>"></div>
            <div> <input type="number" id="grado_academico" name="grado_academico" placeholder="Grado académico" min="1" max="14" oninput="valorMaximo1(this)" required value="<?php echo $gradoAcademico; ?>"></div>
        </div>
        <div id="boton-contenedor2">
              <input type="submit" value="Ingresar Informacion">
          </div>
        </form>
  </div>
</body>
</html>
