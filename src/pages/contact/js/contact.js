// Copy function
function copy() {
    var copyText = document.getElementById("disabledTextInput");
    copyText.select();
    document.execCommand("copy");
}

// Show popover
$(function () {
    $('[data-toggle="popover"]').popover();
})

// Hide popover
$('[data-toggle="popover"]').popover().click(function () {
    setTimeout(function () {
        $('[data-toggle="popover"]').popover('hide');
    }, 1000);
});

// menu
var menu = document.getElementById("togglemenu")
var menubtn = document.querySelector('.li-spec');
var plash = document.querySelector('.plash')
var menu2 = document.querySelector('.contact-main');
function menuToggle(){
        menubtn.classList.remove("li-closed");
        menu.classList.remove("menuclosed");
        menubtn.classList.add("li-clicked");
        menu.classList.add("menutoggled");
        plash.style="z-index:600"
        menu2.style="z-index:2";
}
function menuClose(){
        menubtn.classList.remove("li-clicked");
        menu.classList.remove("menutoggled");
        menubtn.classList.add("li-closed");
        menu.classList.add("menuclosed");
        plash.style="z-index:-600";
        menu2.style="z-index:800";
}