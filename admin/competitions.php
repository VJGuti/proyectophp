<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Competencias - Admin</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body class="admin-content">
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
        <div class="admin-header">
            <h2>Gestión de Competencias</h2>
            <button class="btn-primary" onclick="window.location.href='registrar_competencias.php'">Nueva Competencia</button>
        </div>

        <div class="competitions-list">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Deporte</th>
                        <th>Categoría</th>
                        <th>Sub</th>
                        <th>Género</th>
                        <th>Relevo</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Conexión a la base de datos
                    include("../conexion.php");

                    // Consulta para obtener las competencias
                    $query = "SELECT nombre, deporte, categoria, sub, genero, relevo, fecha FROM competencias";
                    $result = mysqli_query($conex, $query);

                    // Verificar si hay resultados
                    if (mysqli_num_rows($result) > 0) {
                        // Iterar sobre los resultados
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['deporte']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['categoria']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['sub']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['genero']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['relevo']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['fecha']) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No hay competencias registradas.</td></tr>";
                    }

                    // Cerrar la conexión
                    mysqli_close($conex);
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