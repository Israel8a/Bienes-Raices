<?php
require "includes/app.php";
$db = conectarDB();
$errores=[];
if ($_SERVER["REQUEST_METHOD"]==="POST") {
    $email =mysqli_real_escape_string($db,filter_var($_POST["email"],FILTER_VALIDATE_EMAIL));
    $password =mysqli_real_escape_string($db,$_POST["password"]);
    if (!$email) {
        $errores[]="El email es obligatorio o no es valido";
    }
    if (!$password) {
        $errores[]="EL Password es obligatorio";
    }
    if(empty($errores)){
        $query = "SELECT * FROM usuarios WHERE email = '{$email}'";
        $resultado = mysqli_query($db,$query);
        if ($resultado->num_rows) {
            $usuario = mysqli_fetch_assoc($resultado);
            //var_dump($usuario);
            $has = password_verify($password,$usuario["password"]);
            //var_dump($has);
            if ($has) {
                session_start();
                $_SESSION["usuario"]=$usuario["email"];
                $_SESSION["login"] = true;
                header('Location: /admi');
            } else {
                $errores[] = "El password es incorrecto";
            }
            
        } else {
            $errores[]="El usuario no existe";
        }
        
    }
}

incluirTemplate("heades");
?>
    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesión</h1>
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error ?>
            </div>
        <?php endforeach; ?>    
        <form class="formulario" method="post" novalidate>
            <fieldset>
            <legend>Email y Password</legend>
                <label for="email">E-mail</label>
                <input type="text" id="email" placeholder="Tu Emai" name="email" >

                <label for="password">password</label>
                <input type="password" id="password" placeholder="Tu Password" name="password" >
            </fieldset>
            <input type="submit" value="Iniciar sesion" class="boton boton-verde">
        </form>
    </main>
    <?php incluirTemplate("footer");
?>