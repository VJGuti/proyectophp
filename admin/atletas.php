<?php
// Conexión a la base de datos
include("../conexion.php");

// Variable para almacenar el resultado
$resultado_busqueda = null;

// Procesar la búsqueda si se envía el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['buscar'])) {
    $nombre = mysqli_real_escape_string($conex, $_POST['nombre_busqueda']); // Filtrar el nombre ingresado
    if (!empty($nombre)) {
        // Consulta a la base de datos
        $sql = "SELECT * FROM datos WHERE nombre LIKE '%$nombre%'";
        $resultado_busqueda = mysqli_query($conex, $sql);
    } else {
        $error = "Por favor, ingrese un nombre para buscar.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Atletas - Admin</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/athletes.css">
</head>
<body class="admin-body">
    <header class="main-header">
        <nav class="nav-container">
            <div class="logo">
                <h1>Panel Administrativo</h1>
            </div>
            <ul class="nav-menu">
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="competitions.php">Gestionar Competencias</a></li>
                <li><a href="atletas.php">Atletas</a></li>
                <li><a href="results.html">Resultados</a></li>
                <li><a href="../src/index.html">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>

    <main class="admin-content">
        <div class="admin-header">
            <h2>Gestión de Atletas</h2>
            <div class="header-actions">
                <form method="POST" action="">
                    <input type="text" name="nombre_busqueda" placeholder="Buscar atleta..." class="search-input">
                    <button type="submit" name="buscar" class="btn-primary">Buscar</button>
                </form>
                <button class="btn-primary" onclick="window.location.href='../src/index_registro.php'">Nuevo Atleta</button>
            </div>
        </div>

        <div class="athletes-list">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Edad</th>
                        <th>Género</th>
                        <th>Competencia</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($resultado_busqueda && mysqli_num_rows($resultado_busqueda) > 0) {
                        while ($fila = mysqli_fetch_assoc($resultado_busqueda)) {
                            echo "<tr>";
                            echo "<td>" . $fila['nombre'] . "</td>";
                            echo "<td>" . $fila['categoria'] . "</td>";
                            echo "<td>" . $fila['edad'] . "</td>";
                            echo "<td>" . $fila['genero'] . "</td>";
                            echo "<td>" . $fila['competencia'] . "</td>";
                            echo "<td>" . $fila['estado'] . "</td>";
                            echo "</tr>";
                        }
                    } elseif ($resultado_busqueda) {
                        echo "<tr><td colspan='6'>No registrado</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>

    <footer class="main-footer">
        <p>&copy; 2024 Sistema de Gestión de Competencias Deportivas</p>
    </footer>
</body>
</html>
