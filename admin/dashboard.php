<?php
// Incluir la conexión a la base de datos
include("../conexion.php");

// Consulta SQL para contar los atletas registrados
$query_atletas = "SELECT COUNT(*) AS total_atletas FROM datos";
$result_atletas = mysqli_query($conex, $query_atletas);
if ($result_atletas) {
    $row_atletas = mysqli_fetch_assoc($result_atletas);
    $total_atletas = $row_atletas['total_atletas'];
} else {
    $total_atletas = 0;
}

// Consulta SQL para contar las competencias 
$query_competencias = "SELECT COUNT(*) AS total_competencias FROM competencias" ;
$result_competencias = mysqli_query($conex, $query_competencias);
if ($result_competencias) {
    $row_competencias = mysqli_fetch_assoc($result_competencias);
    $total_competencias = $row_competencias['total_competencias'];
} else {
    $total_competencias = 0;
}

// Consulta SQL para contar los tiempos
$query_tiempos = "SELECT COUNT(*) AS total_tiempos FROM tiempos" ;
$result_tiempos = mysqli_query($conex, $query_tiempos);
if ($result_tiempos) {
    $row_tiempos = mysqli_fetch_assoc($result_tiempos);
    $total_tiempos = $row_tiempos['total_tiempos'];
} else {
    $total_tiempos = 0;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrativo - Competencias Deportivas</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body class="admin-body">
    <header class="main-header">
        <nav class="nav-container">
            <div class="logo">
                <h1>Panel Administrativo</h1>
            </div>
            <div class="menu-toggle" id="menuToggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <ul class="nav-menu" id="navMenu">
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="competitions.php">Gestionar Competencias</a></li>
                <li><a href="atletas.php">Atletas</a></li>
                <li><a href="results.html">Resultados</a></li>
                <li><a href="../src/index.html">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>

    <main class="admin-content">
        <div class="dashboard-grid">
            <div class="dashboard-card">
                <h3>Competencias</h3>
                <p class="dashboard-number"><?php echo htmlspecialchars($total_competencias); ?></p>
                <a href="competitions.php" class="dashboard-link">Ver Detalles</a>
            </div>
            <div class="dashboard-card">
                <h3>Atletas Registrados</h3>
                <p class="dashboard-number"><?php echo htmlspecialchars($total_atletas); ?></p>
                <a href="atletas.php" class="dashboard-link">Buscar Atleta</a>
            </div>
           
            <div class="dashboard-card">
                <h3>Resultados</h3>
                <p class="dashboard-number"><?php echo htmlspecialchars($total_tiempos); ?></p>
                <a href="results.html" class="dashboard-link">Ver tiempos</a>
            </div>
        </div>
    </main>

    <footer class="main-footer">
        <p>&copy; 2024 Sistema de Gestión de Competencias Deportivas</p>
    </footer>

    
</body>
</html>