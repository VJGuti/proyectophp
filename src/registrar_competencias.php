<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Competencia</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Crear Nueva Competencia</h1>
    <form action="crear_competencia.php" method="POST">
        <label for="nombre">Nombre de la Competencia:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" required><br><br>

        <label for="deporte">Deporte:</label>
        <select id="deporte" name="deporte" required>
            <option value="1">Natación</option>
            <option value="2">Ciclismo</option>
            <option value="3">Atletismo</option>
            <option value="4">Triatlon</option>
            <option value="5">Acuatlon</option>
            <option value="6">Aguas Abiertas</option>
            
        </select><br><br>

        <label for="categoria">Categoría:</label>
        <input type="text" id="categoria" name="categoria" required><br><br>

        <label for="genero">Género:</label>
        <select id="genero" name="genero" required>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
            <option value="Mixto">Mixto</option>
        </select><br><br>

        <label for="relevo">¿Es Relevo?</label>
        <input type="checkbox" id="relevo" name="relevo" value="1"><br><br>

        <button type="submit">Crear Competencia</button>
    </form>
    <?php
    include("../cofig/conexion.php");
    ?>

</body>
</html>
