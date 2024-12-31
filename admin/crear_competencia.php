<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Competencia - Sistema de Competencias</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="stylesheet" href="../css/formularios.css">
</head>
<body>
    <header class="main-header">
        <nav class="nav-container">
            <div class="logo">
                <h1>Competencias Deportivas</h1>
            </div>
            <div class="menu-toggle" id="menuToggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <ul class="nav-menu" id="navMenu">
                
                <li><a href="competitions.php">Competencias</a></li>
                <li><a href="admin/dashboard.php">Panel Admin</a></li>
            </ul>
        </nav>
    </header>

    <main class="main-content">
        <div class="form-container">
            <h2>Crear Nueva Competencia</h2>

            <?php
            // Incluir el archivo de conexión a la base de datos
            include("../conexion.php");

            // Verificar si el formulario fue enviado
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Validar que los campos obligatorios no estén vacíos
                if (!empty($_POST['nombre']) && !empty($_POST['fecha']) && !empty($_POST['deporte']) && 
                    !empty($_POST['categoria']) && !empty($_POST['genero']) && !empty($_POST['sub'])) {
                    
                    // Obtener los datos del formulario
                    $nombre = mysqli_real_escape_string($conex, $_POST['nombre']);
                    $fecha = mysqli_real_escape_string($conex, $_POST['fecha']);
                    $deporte = mysqli_real_escape_string($conex, $_POST['deporte']);
                    $categoria = mysqli_real_escape_string($conex, $_POST['categoria']);
                    $sub = mysqli_real_escape_string($conex, $_POST['sub']);
                    $genero = mysqli_real_escape_string($conex, $_POST['genero']);
                    $relevo = isset($_POST['relevo']) ? 1 : 0;

                    // Preparar la consulta SQL para insertar los datos
                    $sql = "INSERT INTO competencias (nombre, fecha, deporte, categoria, genero, relevo, sub)
                            VALUES ('$nombre', '$fecha', '$deporte', '$categoria', '$genero', '$relevo', '$sub')";

                    // Ejecutar la consulta
                    $resultado = mysqli_query($conex, $sql);

                    if ($resultado) {
                        echo '<div class="alert alert-success">Competencia registrada exitosamente</div>';
                    } else {
                        echo '<div class="alert alert-danger">Ocurrió un error al registrar la competencia</div>';
                    }
                } else {
                    echo '<div class="alert alert-warning">Por favor, complete todos los campos requeridos</div>';
                }
            }
            ?>

    <div class="form-actions">
        <a href="registrar_competencias.php" class="btn-secondary">Registrar nueva competencia</a>
        <a href="competitions.php" class="btn-primary">Ver Competencias</a>
    </div>
</div>
</main>



    

    <footer class="main-footer">
        <p>&copy; 2024 Sistema de Gestión de Competencias Deportivas</p>
    </footer>

    </main>
    
</body>
</html>




