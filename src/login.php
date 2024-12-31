<?php

include("../conexion.php");

if(isset($_POST['register'])){
   if(
    strlen( $_POST['name'])>= 1 &&
    strlen( $_POST['email'])>= 1 &&
    strlen( $_POST['direction'])>= 1 &&
    strlen( $_POST['phone'])>= 1 &&
    strlen( $_POST['age'])>= 1 &&
    strlen( $_POST['genero'])>= 1 &&
    strlen( $_POST['competencia'])>= 1 &&
    strlen( $_POST['categoria'])>= 1 &&
    strlen( $_POST['status'])>= 1 &&
    strlen( $_POST['password'])>= 1
    )

    {
     $name = trim($_POST['name']);
     $email = trim($_POST['email']);
     $direction= trim($_POST['direction']);
     $phone = trim($_POST['phone']);
     $age = trim($_POST['age']);
     $genero = trim($_POST['genero']);
     $competencia = trim($_POST['competencia']);
     $categoria = trim($_POST['categoria']);
     $status= trim($_POST['status']);
     $password = trim($_POST['password']);

     $fecha = date('y/m/d');
     $consulta ="INSERT INTO datos(nombre, email, direccion, telefono,edad,genero,competencia,categoria,estado,contraseña,fecha)

        VALUES('$name', '$email','$direction','$phone','$age','$genero','$competencia','$categoria','$status','$password','$fecha')";
        $resultado=mysqli_query($conex,$consulta);
        if($resultado){
           
            header("Location: index.html");

        } else{
            ?>
            <h3 class="error">Occurio un error</h3>
            <?php
        }
    }else{
        ?>
            <h3 class="error">Llene todos los campos</h3>
        <?php
    }
}
