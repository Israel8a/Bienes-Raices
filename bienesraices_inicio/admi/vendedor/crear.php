<?php
require "../../includes/app.php";
use App\Vendedores;
iniciarSesion();
$vendedor = new Vendedores;
//Arreglo con mensajes de errores
$errores = Vendedores::getErrores();
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $vendedor = new Vendedores($_POST["vendedor"]);
    $errores =$vendedor->validar();
    if(empty($errores)){
        $vendedor->guardar();
    }
}
include "../../includes/templates/heades.php";

?>
    <main class="contenedor seccion">
        <h1>Registrar Vendedor(a)</h1>
         <a href="/admi" class="boton boton-verde">volver</a>
         <?php foreach($errores as $error):?>
        <div class="alerta error">
        <?php echo $error ?>
        </div>
        <?php endforeach; ?>
        <form class="formulario" method="post" enctype="multipart/form-data">
           <?php include "../../includes/templates/formularios-vendedores.php" ?>
            <input type="submit" class="boton boton-verde" value="Crear Vendedor(a)">
        </form>
    </main>
    <?php include "../../includes/templates/footer.php"
?>