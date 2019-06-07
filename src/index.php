<?php
require "admin/database.php";
include "admin/lang.php";

$db = Database::connect();
$sql = "SELECT * FROM projects WHERE favorite=1";
$stmt = $db->query($sql);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
Database::disconnect();


// Default Language
$default_lang = "eng";
if (isset($_GET['lang'])) {
    $default_lang = $_GET['lang'];
}
if (isset($_GET['lang'])) {
    if ($_GET['lang'] == 'eng') {
        $default_lang = "eng";
    }
    if ($_GET['lang'] == 'fr') {
        $default_lang = "fr";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- FavIcon -->
    <link rel="shortcut icon" href="favicon.ico?v=2" type="image/x-icon">
    <!--Bootstrap-->
    <link rel="stylesheet" href="lib/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <!--Main-->
    <link rel="stylesheet" href="css/main.css">
    <!-- font awsome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <!-- Sal Style -->
    <link rel="stylesheet" href="lib/sal/css/sal.css">

    <title>Portfolio</title>

    <meta name="description" content="I'M ALAE ES-SAKI, I'M A FULL STACK WEB DEVELOPER PASSIONATE ABOUT PRODUCING HIGH QUALITY RESPONSIVE WEBSITES AND EXCEPTIONAL USER EXPERIENCE.YOU CAN CHECK MY GITHUB TO SEE MY PROJECTS, AND IF YOU WANT TO KNOW MORE ABOUT ME YOU CAN VISITE ABOUT SECTION.">
    <meta name="keywords" content="Developpeur Web, Création des sites web, service web, responsive designe, service de designe,web design, custom web design services, web design services, web design studio, web design boutique, web design solutions, responsive web design services, brochure design services, logo design, web design for startups, web design for small businesses, cheap website design, inexpensive web design">

</head>

<body>
    <!-- Header section -->
    <header>
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="index.php?lang=<?= $default_lang ?>" data-sal="fade" data-sal-delay="150" data-sal-easing="ease-out-bounce" data-sal-duration="800">AE</a>
            <span class="li-spec" onclick="menuToggle()"><i class="fas fa-bars"></i></span>

            <div class="collapse navbar-collapse" id="navbarSupportedContent" data-sal="slide-down" data-sal-delay="300" data-sal-easing="ease-out-bounce" data-sal-duration="800">
                <ul class="navbar-nav ml-auto mr-4">
                    <li class="nav-item mr-4">
                        <a class="nav-link hov" href="index.php?lang=<?= $default_lang ?>"><?= $lang[$default_lang]['menu'][0] ?></a>
                    </li>
                    <li class="nav-item mr-4">
                        <a class="nav-link hov" href="pages/about/about.php?lang=<?= $default_lang ?>"><?= $lang[$default_lang]['menu'][1] ?></a>
                    </li>
                    <li class="nav-item mr-4">
                        <a class="nav-link hov" href="pages/portfolio/portfolio.php?lang=<?= $default_lang ?>"><?= $lang[$default_lang]['menu'][2] ?></a>
                    </li>
                    <li class="nav-item mr-4">
                        <a class="nav-link spec" href="pages/contact/contact.php?lang=<?= $default_lang ?>"><?= $lang[$default_lang]['menu'][3] ?></a>
                    </li>
                </ul>
            </div>

            <!-- This splash is for closing the menu in media query -->
            <div class="plash" onclick="menuClose()"></div>
            <div id="togglemenu">
                <div class="container">
                    <ul>
                        <li>
                            <a href="index.php?lang=<?= $default_lang ?>"><?= $lang[$default_lang]['menu'][0] ?></a>
                        </li>
                        <li>
                            <a href="pages/about/about.php?lang=<?= $default_lang ?>"><?= $lang[$default_lang]['menu'][1] ?></a>
                        </li>
                        <li>
                            <a href="pages/portfolio/portfolio.php?lang=<?= $default_lang ?>"><?= $lang[$default_lang]['menu'][2] ?></a>
                        </li>
                        <li>
                            <a href="pages/contact/contact.php?lang=<?= $default_lang ?>"><?= $lang[$default_lang]['menu'][3] ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- First section -->
        <div class="first-section d-flex flex-column flex-sm-column flex-md-row flex-lg-row flex-xl-row">
            <div class="hero">

            </div>
            <div class="pres" data-sal="slide-up" data-sal-delay="150" data-sal-easing="ease-out-bounce" data-sal-duration="800">
                <h4 data-sal="slide-up" data-sal-delay="150" data-sal-easing="ease-out-bounce" data-sal-duration="800"><?= $lang[$default_lang]['title'] ?>
                    <br data-sal="slide-up" data-sal-delay="150" data-sal-easing="ease-out-bounce" data-sal-duration="800"><?= $lang[$default_lang]['title2'] ?></h4>
                <div class="d-flex justify-content-center">
                    <a class="p-4" href="https://drive.google.com/file/d/1egZS-PLDdvIgSE_qYnr_E36zxs4oG0e3/view" data-sal="slide-right" data-sal-delay="400" data-sal-easing="ease-out-bounce" data-sal-duration="800"><?= $lang[$default_lang]['btn1'] ?></a>
                    <a class="p-4" href="pages/contact/contact.php?lang=<?= $default_lang ?>" data-sal="slide-left" data-sal-delay="400" data-sal-easing="ease-out-bounce" data-sal-duration="800"><?= $lang[$default_lang]['btn2'] ?></a>
                </div>
            </div>
        </div>


        <!-- right brand -->
        <div class="right-brand d-flex justify-content-center">
            <p>ALAE PORTFOLIO</p>
            <hr>
            <img src="assets/imgs/mouse.png" alt="mouse img">
        </div>
        <!-- Default dropup button -->
        <div class="btn-group dropleft shadow-none" data-sal="slide-left" data-sal-delay="150" data-sal-easing="ease-out-bounce" data-sal-duration="800">
            <button class="btn btn-secondary dropdown-toggle shadow-none" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Lang
            </button>
            <div class="dropdown-menu shadow-none" aria-labelledby="dropdownMenuButton">
                <form action="" method="GET">
                    <a class="dropdown-item" href="index.php?lang=eng">ENGLISH</a>
                    <a class="dropdown-item text-uppercase" href="index.php?lang=fr">Français</a>
                </form>
            </div>
        </div>

    </header>

    <!-- second section -->
    <section class="decription-section mt-5 mt-sm-5 mt-md-0 mt-lg-0 mt-xl-0">
        <div class="single-row" data-sal="fade" data-sal-delay="50" data-sal-easing="ease-out-bounce" data-sal-duration="800">
            <h4><?= $lang[$default_lang]['aboutmetitle'] ?></h4>
            <p><?= $lang[$default_lang]['aboutmepara'] ?></p>
            <a href="pages/about/about.php?lang=<?= $default_lang ?>" data-sal="slide-left" data-sal-delay="150" data-sal-easing="ease-out-bounce" data-sal-duration="800"><?= $lang[$default_lang]['btn3'] ?></a>
        </div>
    </section>

    <!-- cards section -->
    <section class="cards-container">
        <div class="single-row text-center">
            <div class="single-sec">
                <h3 class="title-right" data-sal="slide-left" data-sal-delay="300" data-sal-easing="ease-out-bounce" data-sal-duration="800"><?= $lang[$default_lang]['cmptitle'][0] ?></h3>
                <hr>
                <p class="right" data-sal="slide-left" data-sal-delay="300" data-sal-easing="ease-out-bounce" data-sal-duration="800">
                    <?= $lang[$default_lang]['comppara'][0][0] ?><br>
                    <?= $lang[$default_lang]['comppara'][0][1] ?><br>
                    <?= $lang[$default_lang]['comppara'][0][2] ?><br>
                    <?= $lang[$default_lang]['comppara'][0][3] ?><br>
                    <?= $lang[$default_lang]['comppara'][0][4] ?><br>
                    <?= $lang[$default_lang]['comppara'][0][5] ?><br>
                    <?= $lang[$default_lang]['comppara'][0][6] ?><br>
                    <?= $lang[$default_lang]['comppara'][0][7] ?><br>
                </p>
            </div>
            <div class="single-sec">
                <h3 class="title-left" data-sal="slide-right" data-sal-delay="300" data-sal-easing="ease-out-bounce" data-sal-duration="800"><?= $lang[$default_lang]['cmptitle'][1] ?></h3>
                <hr>
                <p class="left text-right" data-sal="slide-right" data-sal-delay="300" data-sal-easing="ease-out-bounce" data-sal-duration="800">
                    <?= $lang[$default_lang]['comppara'][1][0] ?><br>
                    <?= $lang[$default_lang]['comppara'][1][1] ?><br>
                    <?= $lang[$default_lang]['comppara'][1][2] ?><br>
                    <?= $lang[$default_lang]['comppara'][1][3] ?><br>
                    <?= $lang[$default_lang]['comppara'][1][4] ?><br>
                    <?= $lang[$default_lang]['comppara'][1][5] ?><br>
                    <?= $lang[$default_lang]['comppara'][1][6] ?><br>
                    <?= $lang[$default_lang]['comppara'][1][7] ?><br>
                </p>
            </div>
            <div class="single-sec">
                <h3 class="title-right t-spec" data-sal="slide-left" data-sal-delay="300" data-sal-easing="ease-out-bounce" data-sal-duration="800"><?= $lang[$default_lang]['cmptitle'][2] ?></h3>
                <hr class="hrspec">
                <p class="right p-spec" data-sal="slide-left" data-sal-delay="300" data-sal-easing="ease-out-bounce" data-sal-duration="800">
                    <?= $lang[$default_lang]['comppara'][2] ?>
                </p>
            </div>
            <div class="single-sec">
                <h3 class="title-left tl-spec" data-sal="slide-right" data-sal-delay="300" data-sal-easing="ease-out-bounce" data-sal-duration="800"><?= $lang[$default_lang]['cmptitle'][3] ?></h3>
                <hr>
                <p class="left text-right text-uppercase" data-sal="slide-right" data-sal-delay="300" data-sal-easing="ease-out-bounce" data-sal-duration="800">
                    <?= $lang[$default_lang]['comppara'][3][0] ?><br>
                    <?= $lang[$default_lang]['comppara'][3][1] ?><br>
                    <?= $lang[$default_lang]['comppara'][3][2] ?><br>
                    <?= $lang[$default_lang]['comppara'][3][3] ?><br>
                    <?= $lang[$default_lang]['comppara'][3][4] ?><br>
                    <?= $lang[$default_lang]['comppara'][3][5] ?><br>
                    <?= $lang[$default_lang]['comppara'][3][6] ?><br>
                </p>
            </div>
        </div>
    </section>

    <!-- Portfolio section -->
    <section class="recent-work mt-5 mb-5">
        <div class="single-row">
            <div class="title text-center mb-5">
                <h4><?= $lang[$default_lang]['myrecentw'] ?></h4>
            </div>

            <!-- cards -->
            <div class="work-cont d-flex justify-content-center flex-row flex-wrap position-relative">
                <?php foreach ($rows as $row) : ?>
                    <div class="card mr-sm-0 mr-md-5 mr-lg-5 mr-xl-5 mb-5 position-relative" style="width: 18rem;" data-sal="slide-down" data-sal-delay="100" data-sal-easing="ease-out-bounce" data-sal-duration="800">
                        <img class="card-img-top" src="assets/imgs/<?= $row['image'] ?>" data-toggle="modal" data-target="#exampleModal" onclick="getrow('<?= $row['name'] ?>','<?= $row['image'] ?>','<?= $row['description'] ?>','<?= $row['technologies'] ?>','<?= $row['github'] ?>')" alt='<?= $row['name'] ?>'>
                        <p class="vplus position-absolute" data-toggle="modal" data-target="#exampleModal" onclick="getrow('<?= $row['name'] ?>','<?= $row['image'] ?>','<?= $row['description'] ?>','<?= $row['technologies'] ?>','<?= $row['github'] ?>')"><?= $lang[$default_lang]['seemore'] ?></p>
                        <a class="text-decoration-none p-1 d-flex align-items-center justify-content-center" href="<?= $row['github'] ?>">
                            <p class="m-0">github source <i class="fab fa-github-square"></i> </p>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="body">
                            <h3 class="text-center mb-5" id="mtitle"></h3>
                            <img class="mb-5" src="#" id="mimg" alt="project-img">
                            <p class="mb-5" id="mdesc"></p>
                            <h5><?= $lang[$default_lang]['modal'][0] ?></h5>
                            <h6 id="mtech"></h6>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" data-dismiss="modal"><?= $lang[$default_lang]['modal'][1] ?></button>
                            <a href="" id="mlink">
                                <button type="button" class="btn"><?= $lang[$default_lang]['modal'][2] ?><i class="fab fa-github-square" style="padding-left: .6rem;"></i></button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Error Modal -->

            <div class="modal fade" id="testModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body d-flex justify-content-center align-items-center flex-column" id="errorbody">
                            <h3 class="errortitle">Sorry but this project is not linked yet</h3>
                            <img class="errorImg" src="assets/imgs/error.png" style="width:60%" alt="error img">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border:none">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- See more button -->
            <div class="af-suite text-center mb-5 mt-5">
                <a href="pages/portfolio/portfolio.php?lang=<?= $default_lang ?>"><?= $lang[$default_lang]['seemore'] ?></a>
            </div>
        </div>
    </section>

    <!-- What i can do section -->
    <section class="what-i-can-do-sec">
        <div class="single-row">

            <div class="red-sec d-flex flex-column justify-content-center align-items-center p-5">
                <h5 class="text-center mb-md-5 mb-lg-5 mb-xl-5" data-sal="slide-down" data-sal-delay="100" data-sal-easing="ease-out-bounce" data-sal-duration="800"><?= $lang[$default_lang]['whaticando'] ?></h5>
                <ul data-sal="slide-right" data-sal-delay="100" data-sal-easing="ease-out-bounce" data-sal-duration="800">
                    <li><?= $lang[$default_lang]['whaticandoli1'] ?></li>
                    <li><?= $lang[$default_lang]['whaticandoli2'] ?></li>
                    <li><?= $lang[$default_lang]['whaticandoli3'] ?></li>
                    <li><?= $lang[$default_lang]['whaticandoli4'] ?></li>
                </ul>
                <div class="button">
                    <a href="pages/contact/contact.php?lang=<?= $default_lang ?>"><?= $lang[$default_lang]['contactme'] ?></a>
                </div>
            </div>
        </div>
    </section>

    <!-- footer section -->

    <footer>
        <div class="single-row d-flex justify-content-center align-items-center flex-column">
            <div class="logo">
                <a href="#">AE</a>
            </div>
            <div class="redaction mt-4">
                <p class="text-center">email : alaeessaki@gmail.com<br>Num : +2126 93 43 80 16</p>
            </div>

            <div class="barcode">
                <img src="assets/imgs/frame.png" alt="barcode img">
            </div>

            <div class="reseaux d-flex flex-row flex-sm-wrap flex-md-wrap mt-4">
                <a href="https://www.facebook.com/alae.essaki1" aria-label="facebook link"><i class="fab fa-facebook-square"></i></a>
                <a href="https://github.com/alaeessaki?tab=repositories" aria-label="github link"><i class="fab fa-github-square"></i></a>
                <a href="https://www.linkedin.com/in/alae-essaki-15485016a/" aria-label="linkedin link"><i class="fab fa-linkedin"></i></a>
                <a href="https://twitter.com/es_alae" aria-label="twitter link"><i class="fab fa-twitter-square"></i></a>
                <a href="https://www.instagram.com/alaeessaki/" aria-label="instagram link"><i class="fab fa-instagram"></i></a>
            </div>
            
            <!-- Copyright -->
            <div class="copyrights mt-5">
                <p>copyrights &copy; 2019: <a href="#">Alae ES-SAKI</a></p>
            </div>
        </div>
    </footer>


    <!--other Libraries-->
    <script src="lib/jQuery-3-4-1/jquery-3.4.1.min.js"></script>
    <script src="lib/popper/popper.min.js"></script>
    <script src="lib/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>

    <!--Main Js-->

    <script src="lib/sal/js/sal.js"></script>
    <script src="js/main.js"></script>
    <script src="js/menu.js"></script>
    <script src="js/loader.js"></script>

    <div class="loader-wrapper">
        <span class="loader"><span class="loader-inner"></span></span>
    </div>

</body>

</html>