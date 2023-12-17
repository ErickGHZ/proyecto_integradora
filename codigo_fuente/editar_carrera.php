<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles_modificar_carrera1.css">
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
        <a href="main_profesores.php">Profesores</a>
        <a href="main_materias.php">Materias</a>
        <a href="main_grupos.php">Grupos</a>
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
        <form action="editar_carrera1.php" method="post" >            
        <?php
        $conexion = new mysqli("localhost", "root", "", "bd_gheu");
        // Obtener la información de la carrera seleccionada
        $idCarreraSeleccionada = $_POST["id_carrera_seleccionada"];
        $sqlObtenerCarrera = "SELECT * FROM carreras WHERE id_carrera = '$idCarreraSeleccionada'";
        $resultadoCarrera = $conexion->query($sqlObtenerCarrera);
        
        if ($resultadoCarrera->num_rows > 0) {
            $filaCarrera = $resultadoCarrera->fetch_assoc();
            $idCarrera = $filaCarrera["id_carrera"];
            $nombreCarrera = $filaCarrera["nombre_carrera"];
            $tipo = $filaCarrera["tipo"];
            $modelo = $filaCarrera["modelo"];
            $duracion = $filaCarrera["duracion"];
            // ... (obtener los valores de otros campos)
        }
        ?>
            <div><input type="hidden" id="id_carrera_seleccionada" name="id_carrera_seleccionada" value="<?php echo $idCarreraSeleccionada; ?>"></div>
            <div><input type="text" id="nombre_carrera" name="nombre_carrera" placeholder="Nombre de la Carrera" required value="<?php echo $nombreCarrera; ?>"></div>
            <div>
            <select id="tipo" name="tipo" required>
                <option value="" disabled>Tipo</option>
                <option value="licenciatura" <?php if ($tipo === 'Licenciatura') echo 'selected'; ?>>Licenciatura</option>
                <option value="ingenieria" <?php if ($tipo === 'Ingenieria') echo 'selected'; ?>>Ingenieria</option>
                <option value="TSU" <?php if ($tipo === 'TSU') echo 'selected'; ?>>TSU</option>
            </select>
            </div>

            <div>
            <select id="modelo" name="modelo" required>
                <option value="" disabled>Modelo de la carrera</option>
                <option value="Cuatrimestre" <?php if ($modelo === 'Cuatrimestre') echo 'selected'; ?>>Cuatrimestres</option>
                <option value="Semestre" <?php if ($modelo === 'Semestre') echo 'selected'; ?>>Semestres</option>
                <option value="Trimestre" <?php if ($modelo === 'Trimestre') echo 'selected'; ?>>Trimestres</option>
                <option value="Bimistre" <?php if ($modelo === 'Bimistre') echo 'selected'; ?>>Bimestres</option>
            </select>
            </div>

          <div><input type="number" id="duracion" name="duracion" placeholder="Duracion del modelo" min="1" max="14" step="1" oninput="valorMaximo1(this)" value="<?php echo $duracion; ?>"></div>
      </div>
            <div id="boton-contenedor2">
              <input type="submit" value="Ingresar Informacion">
          </div>
        </form>
  </div>
</body>
</html>
