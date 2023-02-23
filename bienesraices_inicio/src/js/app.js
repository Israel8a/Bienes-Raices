document.addEventListener("DOMContentLoaded",function(){
    eventListeners();
    darckMode();
});
function darckMode() { 
    const prefiereDarckMode =window.matchMedia("(preferes-color-sheme:darck)");
    if (prefiereDarckMode.matches) {
        document.body.classList.add("darckMode");
    } else {
        document.body.classList.remove("darckMode");
    }
    prefiereDarckMode.addEventListener("change",function () {
        if (prefiereDarckMode.matches) {
            document.body.classList.add("darckMode");
        } else {
            document.body.classList.remove("darckMode");
        }
    })
    const botonDarckMode = document.querySelector(".dark-mode-boton");
    botonDarckMode.addEventListener("click",function(){
        document.body.classList.toggle("darckMode")
    });
}
function eventListeners(){
    const movileMenu = document.querySelector(".img-amburguesa");
    movileMenu.addEventListener("click",navegacionResponsive);
};
function navegacionResponsive() {
   const navegacion = document.querySelector(".navegacion");
   if (navegacion.classList.contains("mostrar")) {
    navegacion.classList.remove("mostrar");
   } else {
    navegacion.classList.add("mostrar");
   }  
}