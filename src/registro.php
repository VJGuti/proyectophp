<?php
include '../config/conexion.php'

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre']; $_POST['apellido']; $_POST['email']; $_POST['password'])){

    // Obtener datos del formuario
    $nombre = $_POST['$nombre'];
    $email = $_POST['$email'];
    $password =
        password_hash($_POST['password'], PASSWORD_DEFAULT);
    $rol = 'atleta';

    //Preparar y ejecutar la consulta
    $stmt = $conn -> prepare("INSERT INTO usuarios (nombre, email, password, rol) VALUES (?, ?, ?, ?)");
    $stmt -> bind_param("ssss", $nombre, $email, $password, $rol);


    if ($stmt -> execute()) {
        echo "Registro Exitoso";
    } else {
        echo "Erorr: " . $stmt -> error; 
    }

    // Cerrar la conexion
$stmt -> close();
$conn -> close();

}  else {
    echo "Por favor, complete todos los campos del formulario "
}
?>
