<?php
require "../../includes/app.php";
use App\Vendedores;
iniciarSesion();
//optener el id seleccionado en la url
$id = $_GET["id"];
//verificamos si el id es int
$id =filter_var($id,FILTER_VALIDATE_INT);
// si no exista el id redirecionamos
if (!$id) {
    header("Location: /admi");
}
//le hablamos ala clase vendedor con el metodo de traer todoel obj
$vendedor=Vendedores::find($id);
//Arreglo con mensajes de errores
$errores = Vendedores::getErrores();
if($_SERVER["REQUEST_METHOD"]==="POST"){
    #traemos la lista
    $args =$_POST["vendedor"];
    //actualizamos la lista que el usuario puso
    $vendedor->sincronizar($args);
    //validaccion
    $errores = $vendedor->validar();
    if(empty($errores)){
        $vendedor->guardar();
    }
    
}
include "../../includes/templates/heades.php";

?>
    <main class="contenedor seccion">
        <h1>Actualizar Vendedor(a)</h1>
         <a href="/admi" class="boton boton-verde">volver</a>
         <?php foreach($errores as $error):?>
        <div class="alerta error">
        <?php echo $error ?>
        </div>
        <?php endforeach; ?>
        <form class="formulario" method="post" enctype="multipart/form-data">
           <?php include "../../includes/templates/formularios-vendedores.php" ?>
            <input type="submit" class="boton boton-verde" value="Guardar Cambios">
        </form>
    </main>
    <?php include "../../includes/templates/footer.php"
?>