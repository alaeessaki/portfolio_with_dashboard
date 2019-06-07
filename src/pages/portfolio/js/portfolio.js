
sal();
var links = document.querySelectorAll(".cat");
var active_link;
var categories = ["all","website","mobileapp","webapp","others","game"];
links.forEach(element => {
    element.addEventListener("click", () => {
        element.classList.add("active");
        active_link = element;
        target = element.getAttribute("data-target");
        categories.forEach(element2=>{
            if(element2 != target){
                project = document.getElementById(element2);
                project.classList.add("non-active");
            }
            else{
                project = document.getElementById(element2);
                project.classList.remove("non-active");
                sal();
               
            }
        })
        links.forEach(element => {
            if (element != active_link) {
                element.classList.remove("active");
            }
        })
    });
});

function getprj(name,image,desc,tech,github){
    var mtitle = document.getElementById("mtitle")
    var mimg = document.getElementById("mimg")
    var mdesc = document.getElementById("mdesc")
    var mtech = document.getElementById("mtech")
    var mlink = document.getElementById("mlink")

    mtitle.innerHTML = name;
    mimg.src = "../../assets/imgs/" +image;
    mdesc.innerHTML = desc;
    mtech.innerHTML = tech
    mlink.href = github;

    if (github == "#") {
        mlink.setAttribute("data-toggle", "modal");
        mlink.setAttribute("data-target", "#testModal");
    }
}


// menu 
var menu = document.getElementById("togglemenu")
var menubtn = document.querySelector('.li-spec');
var plash = document.querySelector('.plash')
var menu2 = document.querySelector('.portfolio-main');
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
