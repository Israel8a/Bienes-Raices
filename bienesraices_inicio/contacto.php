<?php
require "includes/app.php";

incluirTemplate("heades");
?>
    <main class="contenedor seccion">
        <h1>Contacto</h1>
        <picture>
            <source src="build/img/destacada3.webp" type="img/webp">
            <source src="build/img/destacada3.jpg" type="img/jpeg">
            <img loading="lazy" src="build/img/destacada3.jpg"  type="imagen contacto" >
        </picture>
        <h2>Llene el formulario de Contacto</h2>
        <form class="formulario">
            <fieldset>
                <legend>Informacion Personal</legend>
               
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" placeholder="Tu Nombre">
                
                <label for="email">E-mail</label>
                <input type="email" id="email" placeholder="Tu Email">

                <label for="telefono">Telefono</label>
                <input type="tel" id="telefono" placeholder="Tu Telefono">
            
                <label for="mensaje">Mensaje</label>
               <textarea id="mensaja" placeholder="Tu Mensaje"></textarea>
            </fieldset>
            <fieldset>
                <legend>Informacion sobre la propiedad</legend>
                
                <label for="opciones">Vende o Compra: </label>
                <select id="opciones">
                    <option value="" disabled selected>--seleccione--</option>
                    <option value="vende">Vende</option>
                    <option value="compra">Compra</option>
                </select>
                <label for="presupuesto">Precio o Presupuesto</label>
                <input type="number" id="presupuesto" placeholder="Tu Precio o Presupuesto">
            </fieldset>
            <fieldset>
                <legend>Informacion sobre la propiedad</legend>
                <p>Como desea ser contactado</p>
                <div class="forma-contacto">
                    <label for="contactar-telefono">Telefono</label>
                    <input name="codigo" type="radio" id="contactar-telefono">
                    <label for="contactar-email">E-mail</label>
                    <input name="codigo" type="radio" id="contactar-email">
                </div>
                <p>Si eligio telefono, elija la fecha y la hora</p>
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha">
                <label for="hora">Hora:</label>
                <input type="time" id="hora" min="09:00" max="18:00">
            </fieldset>
            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>
    <?php incluirTemplate("footer");
?>