<?php
require "includes/";//algoiba aqui fiajate error

incluirTemplate("heades");
?>
    <main class="contenedor seccion">
        <h2>Casas y Depas en Venta</h2>
        <div class="contenedor-anuncios">
        <?php
            $limite = 10;
             include "../bienesraices_inicio/includes/templates/anuncios.php"; ?>
            
        </div>
    </main>
    <?php incluirTemplate("footer");
?>