<?php
 include '../config/conexion.php';
 session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];

    $stmt = $conn  -> prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt -> bind_param ("s", $email);
    $stmt -> execute();

    $result = $stmt -> get_result();
    $user = $result -> fetch_assoc();

    if (user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_role'] = $user['rol'];
            header("location: dashboard.php"); 
                exit();
    } else {
        echo "Credenciales incorrectas";
    }
}
?>