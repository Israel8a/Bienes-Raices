<?php
require "includes/app.php";
incluirTemplate("heades");
?>
    <main class="contenedor seccion">
        <h1>Conoce Sobre Nosotros</h1>
        <div class="contenido-nosotros">
            <div class="imagen">
                <picture> 
                    <source srcset="build/img/nosotros.webp" type="img/webp">
                    <source srcset="build/img/nosotros.jpg" type="img/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre nosotros">
                </picture>
            </div>
            <div class="texto-nosotros">
                <blockquote>25 Años de Esperiencia</blockquote>
                <p> dicta tenetur odio obcaecati magnam. Commodi? Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, dolores. Deserunt itaque voluptatibus, placeat a eveniet vero veniam facilis corrupti eum, alias deleniti vel explicabo nostrum eius magnam facere dolorem. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi aut autem fugiat dolore minima aliquam quibusdam nisi architecto necessitatibus beatae molestias iusto earum, odit quam accusamus magnam voluptate molestiae eius! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nesciunt animi sed possimus, vel rem consequatur nostrum a sapiente beatae nihil consequuntur voluptate eum eligendi doloremque delectus, velit quo minus? Id?</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum qui culpa quas, itaque corrupti quam, non molestiae quasi quod sit impedit. Enim dicta odit omnis, alias porro iure asperiores sunt?</p>
            </div>
        </div>
    </main>
    <section class="contenedor seccion">
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
    </section> 
    <?php incluirTemplate("footer");
?>