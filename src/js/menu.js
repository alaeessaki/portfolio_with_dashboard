var menu = document.getElementById("togglemenu")
var menubtn = document.querySelector('.li-spec');
var plash = document.querySelector('.plash')
function menuToggle(){
        menubtn.classList.remove("li-closed");
        menu.classList.remove("menuclosed");
        menubtn.classList.add("li-clicked");
        menu.classList.add("menutoggled");
        plash.style="z-index:600"
        plash.style = "display:block";
}
function menuClose(){
        menubtn.classList.remove("li-clicked");
        menu.classList.remove("menutoggled");
        menubtn.classList.add("li-closed");
        menu.classList.add("menuclosed");
        plash.style="z-index:-600";
        plash.style = "display:none";
}
