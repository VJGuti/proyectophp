
<?php
// Incluir el archivo de conexión a la base de datos
include("../conexion.php");

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar que los campos obligatorios no estén vacíos
    if (!empty($_POST['nombre']) && !empty($_POST['fecha']) && !empty($_POST['deporte']) && !empty($_POST['categoria']) && !empty($_POST['genero'])&& !empty($_POST['sub'])){
        // Obtener los datos del formulario
        $nombre = mysqli_real_escape_string($conex, $_POST['nombre']);
        $fecha = mysqli_real_escape_string($conex, $_POST['fecha']);
        $deporte = mysqli_real_escape_string($conex, $_POST['deporte']);
        $categoria = mysqli_real_escape_string($conex, $_POST['categoria']);
        $sub = mysqli_real_escape_string($conex, $_POST['sub']);
        $genero = mysqli_real_escape_string($conex, $_POST['genero']);

        $relevo = isset($_POST['relevo']) ? 1 : 0; // Si se marca el checkbox, se guarda como 1, sino 0

        // Preparar la consulta SQL para insertar los datos
        $sql = "INSERT INTO competencias (nombre, fecha, deporte, categoria, genero, relevo,sub)
                VALUES ('$nombre', '$fecha', '$deporte', '$categoria', '$genero', '$relevo','$sub')";

        // Ejecutar la consulta
        $resultado = mysqli_query($conex, $sql);

        if ($resultado) {
            ?>
            <h3 class="message success">Registrado</h3>
            <?php
             echo "<br><a href='registrar_competencias.php'>Registrar nueva competencia</a>";
             echo "<br><a href='competitions.php'>Ir a Competencias</a>";

        } else {
            ?>
            <h3 class="message error">Occurio un error</h3>
            <?php
             echo "<br><a href='registrar_competencias.php'>Intentar de nuevo</a>";
             echo "<br><a href='competitions.php'>Ir a Competencias</a>";
        }
    } else {
        ?>
            <h3 class="message error">Llene los campos</h3>
            <?php
           
    }
}
?>