<!DOCTYPE html>
<html>
<head>
    <title>Asignacion</title>
    <link rel="stylesheet" type="text/css" href="styles_vista.css">
    <script src="script_main.js"></script>
</head>
<body>

<div id="titulo">
    VISTA
</div>

<div id="contenedor1">
    <div id="titulo-contenedor1">
        SOBRE QUE QUIERES VER?
    </div>
    <div id="centro">
        <div id="ingreso-datos">
            <form action="vista_profesor.php">
                <div id="ingresar">
                    <button type="submit" >Profesor</button>
                </div>
            </form>
        </div>

        <div id="ingreso-datos">
            <form action="vista_grupo.php">
                <div id="ingresar">
                    <button type="submit" >Grupo</button>
                </div>
            </form>
        </div>
    </div>

    <div id="volver">
        <form action="crear_horario.php">
            <input type="submit" value="Volver">
        </form>
    </div>
</div>
</body>
</html>
