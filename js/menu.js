const despleMenu = document.querySelectorAll(".menu");
for(let i=0; i<despleMenu.length; i++){
    despleMenu[i].addEventListener("click", function(){
        if(window.innerWidth<1024){
            const submenu = this.nextElementSibling;
            const heigt = submenu.scrollHeight;
            if(submenu.classList.contains("desplegar")){
                submenu.classList.remove("desplegar");
                submenu.removeAttribute("style");
            }else{
                submenu.classList.add("desplegar");
                submenu.style.height = height + "px";
            }
        }
    });
}
