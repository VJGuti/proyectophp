<?php
    include '../config/conexion.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Torneos y Competencias</title>
    <style>
        body {
            background-color: #2f026e; /* Fondo azul oscuro */
            color: white;             /* Letra blanca */
            font-family: Arial, sans-serif;
            text-align: center;       /* Centrar todo el contenido */
            margin: 0;
            padding: 0;
        }
        h1 {
            margin-top: 20px;         /* Separar el título del borde superior */
        }
        a {
            display: block;           /* Cada enlace se comporta como un botón */
            background-color: #8b48cf; /* Botones de color naranja */
            color: white;
            text-decoration: none;   /* Eliminar subrayado */
            padding: 15px 20px;
            margin: 20px auto;       /* Centrar los botones horizontalmente */
            width: 200px;
            border-radius: 10px;     /* Bordes redondeados */
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3); /* Añadir un sombreado suave */
        }
        a:hover {
            background-color: #6505ff; /* Cambiar color al pasar el ratón */
        }
        .image-container {
            margin-top: 30px; /* Separar la imagen de los botones */
            text-align: center; /* Centrar la imagen */
        }
        .image-container img {
            width: 300px; /* Ajusta el ancho según sea necesario */
            height: auto; /* Mantener proporción */
            border-radius: 10px; /* Bordes redondeados */
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5); /* Sombra para la imagen */
        }
    </style>
</head>
<body>
    <h1>Bienvenido a la Administracion de Torneos y Competencias</h1>
    <a href="registro.html">Inscripción de atletas por Competencia</a>
    <a href="login.html">Iniciar Sesion para ver mi Registro</a>
    <a href="login.html">Registro de tiempos</a>

    
 <!-- Contenedor de imágenes -->
 <div class="image-container">
    <!-- Imagen de Natación -->
    <div class="image-container">
        <img src="natacion 1.jpg" alt="" />
        <div class="caption">Natacion</div>
    </div>

    <!-- Imagen de Atletismo -->
    <div class="image-container">
        <img src="atletismo 1.jpg" alt="" />
        <div class="caption">Atletismo</div>
    </div>
</div>
</body>
</html>
