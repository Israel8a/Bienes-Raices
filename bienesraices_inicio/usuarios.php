<?php
//importar conexion
require "includes/app.php";
$db = conectarDB();
//crear email y password
$email = "correo.correo.com";
$password = "123456"; 
$passwordhash = password_hash($password,PASSWORD_DEFAULT);
//query para que el usuario
$query = "INSERT INTO usuarios (email,password) VALUES ('{$email}','{$passwordhash}')";
echo $query;

//agregarlo ala base de datos
mysqli_query($db,$query);

