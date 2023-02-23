<fieldset>
                <legend>Infromacion General</legend>
                <label for="titulo" name=>Titulo:</label>
                <input type="text" name="propiedad[titulo]" id="titulo" placeholder="Titulo Propiedad" value="<?php

use App\Vendedores;

 echo s($propiedad->titulo)?>">

                <label for="precio">Precio:</label>
                <input type="number"min="1" name="propiedad[precio]" id="precio" placeholder="Precio Propiedad" value="<?php echo s($propiedad->precio)?>">
            
                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="imagen/jpeg ,imagen/jpg " name="propiedad[imagen]">

                <?php if ($propiedad->imagen) {?>
                    <img src="/imagenes/<?php echo $propiedad->imagen?>" class="small-image">
                <?php } ?>

                <label for="descripcion">Descripcion:</label>
                <textarea id="descripcion" name="propiedad[descripcion]"><?php echo s($propiedad->descripcion)?></textarea>
            </fieldset>

            <fieldset>
                <legend>Informacion Propiedad</legend>
                <label for="habitaciones">Habitaciones:</label>
                <input type="number" id="habitaciones" name="propiedad[habitaciones]" placeholder="eje: 3" min="1" max="10" value="<?php echo s($propiedad->habitaciones)?>">

                <label for="wc">Baños:</label>
                <input type="number" id="wc" name="propiedad[wc]" placeholder="eje: 3" min="1" max="10" value="<?php echo s($propiedad->wc)?>">

                <label for="estacionamiento">Estacionamientos:</label>
                <input type="number" id="estacionamiento" name="propiedad[estacionamiento]" placeholder="eje: 3" min="1" max="10" value="<?php echo s($propiedad->estacionamiento)?>">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>
                <label for="vendedor">Vendedor</label>
                <select name="propiedad[vendedores_id]" id="vendedor">
                    <option value="" disabled selected>--Seleccione Vendedor--</option>
                    <?php foreach ($vendedores as $vendedor) {?>
                        <option <?php echo $propiedad->vendedores_id==$vendedor->id ?  "selected": ""  ?> value="<?php echo $vendedor->id?>"><?php echo $vendedor->nombre . " ". $vendedor->apellido ?></option>
                    <?php }?>
                </select>
                </select>
            </fieldset>