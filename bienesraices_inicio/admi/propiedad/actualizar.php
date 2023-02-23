<?php
use App\Propiedad;
use App\ActiveRecord;
use App\Vendedores;
use Intervention\Image\ImageManagerStatic as imagen;
require "../../includes/app.php";
iniciarSesion();
    $id = $_GET["id"];
    $verificar = filter_var($id,FILTER_VALIDATE_INT);
    if (!$verificar) {
        header("Location: /admi");
    }
    $propiedad= Propiedad::find($id);
    //select option
    Vendedores::all();
    //crear un array para aguardar los faltantes
    $errores =Propiedad::getErrores();
    if($_SERVER["REQUEST_METHOD"]==="POST"){
        //asingnar los atributos
        $args =$_POST["propiedad"];
        $propiedad->sincronizar($args);
        //validar Formulari
       $errores= $propiedad->validar();
        //subida de archivos
         //crear nombre unico
         $imagenUnica = md5(uniqid(rand(),true)).".jpg";
         //setear img
         //Realiza un reslize ala img con intervention
         if ($_FILES["propiedad"]["tmp_name"]["imagen"]) {
             $imagen =imagen::make($_FILES["propiedad"]["tmp_name"]["imagen"])->fit(800,600);
             $propiedad->setImagen($imagenUnica);
         }
        if(empty($errores)){
        if ($_FILES["propiedad"]["tmp_name"]["imagen"]) {
        $imagen->save(CARPETA_IMAGENES.$imagenUnica);
        }
        $propiedad->guardar();
        }
    }
include "../../includes/templates/heades.php";

?>
    <main class="contenedor seccion">
        <h1>Actualizar propiedad</h1>
         <a href="/admi" class="boton boton-verde">volver</a>
         <?php foreach($errores as $error):?>
        <div class="alerta error">
        <?php echo $error ?>
        </div>
        <?php endforeach; ?>
        <form class="formulario" method="post" enctype="multipart/form-data">
           <?php include "../../includes/templates/formulario-propiedades.php" ?>
            <input type="submit" class="boton boton-verde" placeholder="Actualizar propiedad">
        </form>
    </main>
    
    <?php include "../../includes/templates/footer.php";
    mysqli_close($db);
?>