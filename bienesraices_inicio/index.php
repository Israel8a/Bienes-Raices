<?php

require "includes/app.php";
incluirTemplate("heades",$inicio=true);
?> 
    <main class="contenedor seccion">
        <h1>Mas Sobre Nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="icono de seguridad" loading="lazy">
                <h1>Seguridad</h1>
                <p>Cum aspernatur maiores possimus! Obcaecati culpa autem, animi modi debitis quia veritatis sequi minima, libero error hic aperiam saepe, maxime deleniti vitae?</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="icono de Precio" loading="lazy">
                <h1>Precio</h1>
                <p>Cum aspernatur maiores possimus! Obcaecati culpa autem, animi modi debitis quia veritatis sequi minima, libero error hic aperiam saepe, maxime deleniti vitae?</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="icono de tiempo" loading="lazy">
                <h1>A Tiempo</h1>
                <p>Cum aspernatur maiores possimus! Obcaecati culpa autem, animi modi debitis quia veritatis sequi minima, libero error hic aperiam saepe, maxime deleniti vitae?</p>
            </div>
        </div>
    </main>
    <section class="seccion contenedor">
        <h2>Casas y Depas en Venta</h2>
        <div class="contenedor-anuncios">
            <?php
            $limite = 3;
             include "../bienesraices_inicio/includes/templates/anuncios.php"; ?>
        </div>
        <div class="alinear-derecha">
            <a href="anuncios.php" class="boton-verde">Ver Todas</a>
        </div>
    </section>
    <section class="imagen-contactar">
        <h2>Encuenta la casa de tus sueños</h2>
        <p>
            llena el formulario de contacto y un asesor se pondrá en contacto contigo en la brevedad
        </p>
        <a href="contacto.html" class="boton-amarillo">Contactanos</a>
    </section>
    <div class="contenedor seccion seccion-inferior">
    <section class="blog">
        <h3>Nuestro Blog</h3>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source src="build/img/blog1.webp" type="image/webp">
                    <source src="build/img/blog1.jpg" type="image/jpeg">
                    <img src="build/img/blog1.jpg" alt="Texto Entrada Blog" loading="lazy">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada.html">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p class="informacion-meta">Escrito el: <span>18/01/2023</span> por: <span>Admin</span></p>
                    <p>
                        Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero
                    </p>
                </a>
            </div>
        </article>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source src="build/img/blog2.webp" type="image/webp">
                    <source src="build/img/blog2.jpg" type="image/jpeg">
                    <img src="build/img/blog2.jpg" alt="Texto Entrada Blog" loading="lazy">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada.html">
                    <h4>Guia para la decoración de tu hogar</h4>
                    <p class="informacion-meta">Escrito el: <span>18/01/2023</span> por: <span>Admin</span></p>
                    <p>
                        Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio
                    </p>
                </a>
            </div>
        </article>
    </section>
    <section class="testimoniales">
        <h3>Testimoniales</h3>
        <div class="testimonial">
            <blockquote>
                El personal se comporti de una excelente forma, muy buena atencion y la casa que me ofrecieron cumple con todos mis expectativas.
            </blockquote>
            <p>-Martin Velazquez</p>
        </div>
    </section>
</div>
<?php incluirTemplate("footer");
?>