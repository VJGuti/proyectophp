<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Competencia</title>
    <link rel="stylesheet" href="../css/formularios.css">
</head>
<body>
    <h1>Crear Nueva Competencia</h1>
   
    <form action="crear_competencia.php" method="POST">
    <div class="input-wrapper">
    <label for="nombre">Nombre de la Competencia:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>
    </div>
        
    <div class="input-wrapper">
    <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" required><br><br>
    </div>
        
    <div class="input-wrapper">
    <label for="deporte">Deporte:</label>
        <select id="deporte" name="deporte" required>
            <option value="1">Natación</option>
            <option value="2">Ciclismo</option>
            <option value="3">Atletismo</option>
            <option value="4">Triatlon</option>
            <option value="5">Acuatlon</option>
            <option value="6">Aguas Abiertas</option>
            
        </select><br><br>
    </div>

    <div class="input-wrapper">
        <label for="sub">Sub:</label>
        <select id="sub" name="sub" required>
        <option value="1">Sub-14</option>
            <option value="2">Sub-16</option>
            <option value="3">Sub-18</option>
            <option value="4">Sub-20</option>
            <option value="5">Sub-22</option>
            <option value="6">Profesional</option>
        </select>
    </div>

    <div class="input-wrapper">
   
    <label for="categoria">Categoría:</label>
    <input type="text" id="categoria" name="categoria" required><br><br>
    </div>

    <div class="input-wrapper">
    <label for="genero">Género:</label>
        <select id="genero" name="genero" required>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
            <option value="Mixto">Mixto</option>
        </select><br><br>
    </div>

    <div class="checkbox-wrapper">
   
    <label for="relevo">¿Es Relevo?</label>
    <input type="checkbox" id="relevo" name="relevo" value="1"><br><br>
    </div>

        

        <button type="submit" class="btn">Crear Competencia</button>
    </form>
    <?php
   include("../conexion.php");
    ?>

</body>
</html>