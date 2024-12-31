<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardar Tiempo - Sistema de Competencias</title>
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

<?php
// Conexión a la base de datos
$conex = new mysqli('localhost', 'root', '', 'registro');

// Verificar conexión
if ($conex->connect_error) {
    die("Error de conexión: " . $conex->connect_error);
}

// Obtener datos del formulario
$nombre = trim($_POST['nombre']);
$tiempo = trim($_POST['tiempo']);
$deporte = trim($_POST['deporte']);

// Verificar si el atleta está registrado en la tabla 'datos'
$query_atleta = $conex->prepare("SELECT id FROM datos WHERE nombre = ?");
$query_atleta->bind_param('s', $nombre);
$query_atleta->execute();
$resultado_atleta = $query_atleta->get_result();

if ($resultado_atleta->num_rows > 0) {
    // Atleta registrado, obtener su ID
    $id_atleta = $resultado_atleta->fetch_assoc()['id'];

    // Verificar si el deporte está registrado en la tabla 'competencias'
    $query_deporte = $conex->prepare("SELECT id FROM datos WHERE competencia = ?");
    $query_deporte->bind_param('s', $deporte);
    $query_deporte->execute();
    $resultado_deporte = $query_deporte->get_result();

    if ($resultado_deporte->num_rows > 0) {
        // Deporte registrado, obtener su ID
        $id_deporte = $resultado_deporte->fetch_assoc()['id'];

        // Insertar tiempo en la tabla 'tiempos' con el nombre del atleta y el deporte
        $query_tiempo = $conex->prepare("INSERT INTO tiempos ( nombre,deporte, tiempo) VALUES (?, ?, ?)");
        $query_tiempo->bind_param('sss', $nombre,$deporte, $tiempo);


        if ($query_tiempo->execute()) {
            echo '<div class="alert alert-success">Tiempo registrado correctamente para ' . htmlspecialchars($nombre) . '</div>';
            echo "<br><a href='registrar_tiempos.html'>Registrar otro tiempo</a>";
            echo "<br><a href='results.html'>Ir a Resultados</a>";
        } else {
            echo '<div class="alert alert-danger">Error al registrar el tiempo</div>';
            echo "<br><a href='registrar_tiempos.html'>Registrar otro tiempo</a>";
            echo "<br><a href='results.html'>Ir a Resultados</a>";
        }
        $query_tiempo->close();
    } else {
        // Deporte no registrado
        echo '<div class="alert alert-warning">El deporte no está registrado.</div>';
        echo "<br><a href='registrar_tiempos.html'>Registrar otro tiempo</a>";
        echo "<br><a href='results.html'>Ir a Resultados</a>";
    }
    $query_deporte->close();
} else {
    // Atleta no registrado
    echo '<div class="alert alert-warning">El atleta no está registrado</div>';
    echo "<br><a href='registrar_tiempos.html'>Registrar otro tiempo</a>";
    echo "<br><a href='results.html'>Ir a Resultados</a>";
}

$query_atleta->close();
$conex->close();
?>
            <div class="form-actions">
                            <a href="registrar_tiempos.html" class="btn btn-secondary">Registrar otro tiempo</a>
                            <a href="results.html" class="btn btn-primary">Ver Resultados</a>
                        </div>
                    </div>
                </main>

                <footer class="main-footer">
                    <p>&copy; 2024 Sistema de Gestión de Competencias Deportivas</p>
                </footer>

</body>
</html>