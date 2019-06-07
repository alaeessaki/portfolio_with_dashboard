function getrow(name,image,desc,tech,github){
    var mtitle = document.getElementById("mtitle")
    var mimg = document.getElementById("mimg")
    var mdesc = document.getElementById("mdesc")
    var mtech = document.getElementById("mtech")
    var mlink = document.getElementById("mlink")

    mtitle.innerHTML = name;
    mimg.src = "assets/imgs/" +image;
    mdesc.innerHTML = desc;
    mtech.innerHTML = tech
    mlink.href = github;

    if (github == "#") {
        mlink.setAttribute("data-toggle", "modal");
        mlink.setAttribute("data-target", "#testModal");
    }

}

sal();



