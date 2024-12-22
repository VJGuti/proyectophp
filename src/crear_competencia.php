<?php
// Incluir el archivo de conexión a la base de datos
include("../cofig/conexion.php");

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar que los campos obligatorios no estén vacíos
    if (!empty($_POST['nombre']) && !empty($_POST['fecha']) && !empty($_POST['deporte']) && !empty($_POST['categoria']) && !empty($_POST['genero'])) {
        // Obtener los datos del formulario
        $nombre = mysqli_real_escape_string($conex, $_POST['nombre']);
        $fecha = mysqli_real_escape_string($conex, $_POST['fecha']);
        $deporte = mysqli_real_escape_string($conex, $_POST['deporte']);
        $categoria = mysqli_real_escape_string($conex, $_POST['categoria']);
        $genero = mysqli_real_escape_string($conex, $_POST['genero']);
        $relevo = isset($_POST['relevo']) ? 1 : 0; // Si se marca el checkbox, se guarda como 1, sino 0

        // Preparar la consulta SQL para insertar los datos
        $sql = "INSERT INTO competencias (nombre, fecha, deporte, categoria, genero, relevo)
                VALUES ('$nombre', '$fecha', '$deporte', '$categoria', '$genero', '$relevo')";

        // Ejecutar la consulta
        $resultado = mysqli_query($conex, $sql);

        if ($resultado) {
            ?>
            <h3 class="success">Registrado</h3>
            <?php
        } else {
            ?>
            <h3 class="error">Occurio un error</h3>
            <?php
        }
    } else {
        ?>
            <h3 class="error">Llene los campos</h3>
            <?php
    }
}
?>
