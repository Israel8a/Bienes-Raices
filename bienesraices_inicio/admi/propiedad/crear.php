<?php
require "../../includes/app.php";
use App\Propiedad;
use App\Vendedores;
use Intervention\Image\ImageManagerStatic as imagen;
iniciarSesion();
$vendedores = Vendedores::all();

    //crear un array para aguardar los faltantes
    $errores =Propiedad::getErrores();
    
    $propiedad = new Propiedad();
    if($_SERVER["REQUEST_METHOD"]==="POST"){
        //crea una nueva instancia
        $propiedad = new Propiedad($_POST["propiedad"]);
        //crear nombre unico
        $imagenUnica = md5(uniqid(rand(),true)).".jpg";
        //setear img
        //Realiza un reslize ala img con intervention
        if ($_FILES["propiedad"]["tmp_name"]["imagen"]) {
            $imagen =imagen::make($_FILES["propiedad"]["tmp_name"]["imagen"])->fit(800,600);
            $propiedad->setImagen($imagenUnica);   
        }
        //validar
        $errores=$propiedad->validar();

        if(empty($errores)){
        //crear la carpeta para subir img
        if (!is_dir(CARPETA_IMAGENES)) {
            mkdir(CARPETA_IMAGENES);
        }
        //guarda la img en el serividor
        $imagen->save(CARPETA_IMAGENES.$imagenUnica);
        //GUARDA ENLA BD
        $propiedad->guardar();
        //mensaje de exito o error
        
        }
    }
include "../../includes/templates/heades.php";

?>
    <main class="contenedor seccion">
        <h1>Crear</h1>
         <a href="/admi" class="boton boton-verde">volver</a>
         <?php foreach($errores as $error):?>
        <div class="alerta error">
        <?php echo $error ?>
        </div>
        <?php endforeach; ?>
        <form class="formulario" method="post" enctype="multipart/form-data">
           <?php include "../../includes/templates/formulario-propiedades.php" ?>
            <input type="submit" class="boton boton-verde" placeholder="Enviar">
        </form>
    </main>
    <?php include "../../includes/templates/footer.php"
?>