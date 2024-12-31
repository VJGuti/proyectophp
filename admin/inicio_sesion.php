<?php
// Conexión a la base de datos
include("../conexion.php");

// Inicializar variables
$mensaje_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['correo']);
    $password = trim($_POST['contrasena']);

    if (!empty($email) && !empty($password)) {
        // Verificar si el usuario existe en la base de datos
        $query = "SELECT * FROM datos WHERE email = ? AND contraseña = ?";
        $stmt = $conex->prepare($query);
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            // Usuario encontrado
            header("Location: resultado_atleta.html"); 
            exit();
        } else {
            // Usuario no encontrado
            $mensaje_error = "No estás registrado. Por favor, regístrate.";
        }
    } else {
        $mensaje_error = "Por favor, completa todos los campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="../css/formularios.css">
</head>
<body>
    <form class="login-form" method="POST" action="">
        <h2>Iniciar Sesión</h2>

        <?php if (!empty($mensaje_error)): ?>
            <p class="error"><?php echo $mensaje_error; ?></p>
        <?php endif; ?>

        <div class="form-group">
            <label for="correo">Correo Electrónico</label>
            <input type="email" id="correo" name="correo" required>
        </div>
        <div class="form-group">
            <label for="contrasena">Contraseña</label>
            <input type="password" id="contrasena" name="contrasena" required>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn">Iniciar Sesión</button>
            <a href="../src/index_registro.php" class="btn">Registrarse</a>
        </div>
    </form>
</body>
</html>
