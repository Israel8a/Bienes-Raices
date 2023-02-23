<?php
use App\Propiedad;
use App\Vendedores;
require "../includes/app.php";
iniciarSesion();
$resultado = Propiedad::all();
$vendedores = Vendedores::all();
//muestra mensaje condicional
$registrado = $_GET["registrado"]?? null;
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $id = $_POST["id"];
    $id = filter_var($id,FILTER_VALIDATE_INT);
    if($id){
        $tipo = $_POST["metodo"];
    if(verificarMetodo($tipo)){
        if ($tipo==="propiedad") {
            $propiedad = Propiedad::find($id);
            $propiedad->eliminar();
        }else if($tipo==="vendedor"){
        $vendedor = Vendedores::find($id);
        $vendedor->eliminar();
        }
    }
}
}
//incluye un tempate
include "../includes/templates/heades.php"
?>
    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>
        <a href="/admi/propiedad/crear.php" class="boton boton-verde">Nueva Propiedad</a>
        <a href="/admi/vendedor/crear.php" class="boton boton-amarillo">Nuevo Vendedor(a)</a>
        <h2>Propiedades</h2>
        <?php
        $mensaje = mostarNotificacion(intval($registrado));
         if($mensaje){ ?>
            <p class="alerta exito"><?php echo s($mensaje) ?></p>
        <?php } ?>
    

        <table class="propiedades">
            <thead>
                <tr>
                    <th>id</th>
                    <th>titulo</th>
                    <th>imagen</th>
                    <th>precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($resultado as $propiedad): ?>
                <tr>
                    <td><?php echo $propiedad->id; ?></td>
                    <td><?php echo $propiedad->titulo; ?></td>
                    <td><img src="../imagenes/<?php echo $propiedad->imagen; ?>" class="imagen-tabla"></td>
                    <td>$<?php echo $propiedad->precio; ?></td>
                    <td>
                        <form method="post" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id ?>">
                            <input type="hidden" name="metodo" value="propiedad">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="../admi/vendedor/actualizar.php?id=<?php echo $propiedad->id ?> " class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h2>Vendedores</h2>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>id</th>
                    <th>nombre</th>
                    <th>telefono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($vendedores as $vendedor): ?>
                <tr>
                    <td><?php echo $vendedor->id; ?></td>
                    <td><?php echo $vendedor->nombre." ".$vendedor->apellido ?></td>
                    <td><?php echo $vendedor->telefono; ?></td>
                    <td>
                        <form method="post" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $vendedor->id ?>">
                            <input type="hidden" name="metodo" value="vendedor">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="../admi/vendedor/actualizar.php?id=<?php echo $vendedor->id ?> " class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
<?php
    include "../includes/templates/footer.php"
?>