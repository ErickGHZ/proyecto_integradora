<?php
$conexion = new mysqli("localhost", "root", "", "bd_gheu");

if ($conexion->connect_error) {
    die("La conexión falló: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idProfesor = $_POST["id_profesor"];
    $nombreProfesor = $_POST["nombre_profesor"];
    $apellidos = $_POST["apellidos"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];

    $sqlActualizarCarrera = "UPDATE profesores SET nombre_profesor='$nombreProfesor', apellidos='$apellidos', email='$email', telefono='$telefono' WHERE id_profesor='$idProfesor'";

    if ($conexion->query($sqlActualizarCarrera) === TRUE) {
        echo "<script>alert('Datos actualizados correctamente');</script>";

    } else {
        echo "Error al actualizar la información del profesor: " . $conexion->error;
    }
}
echo "<script>window.location.href = 'modificar_profesores.php';</script>";
$conexion->close();
?>
