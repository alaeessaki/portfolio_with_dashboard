<?php
include "lang.php";
$default_lang = 'eng';

if(isset($_GET['lang'])){
    $default_lang = $_GET['lang'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!--Bootstrap-->
  <link rel="stylesheet" href="../../lib/bootstrap-4.3.1-dist/css/bootstrap.min.css">
  <!-- font awsome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <!-- Main css -->
  <link rel="stylesheet" href="css/contact.css">

  <title>Contact</title>
</head>

<body>

<header>
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg" data-sal="slide-down" data-sal-delay="300" data-sal-easing="ease-out-bounce" data-sal-duration="800">
            <a class="navbar-brand" href="../../index.php?lang=<?= $default_lang ?>">AE</a>
            <span class="li-spec" onclick="menuToggle()"><i class="fas fa-bars"></i></span>


            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mr-4">
                    <li class="nav-item mr-4">
                        <a class="nav-link hov" href="../../index.php?lang=<?=$default_lang?>"><?= $lang[$default_lang]['menu'][0] ?></a>
                    </li>
                    <li class="nav-item mr-4">
                        <a class="nav-link hov" href="../../pages/about/about.php?lang=<?=$default_lang?>"><?= $lang[$default_lang]['menu'][1] ?></a>
                    </li>
                    <li class="nav-item mr-4">
                        <a class="nav-link hov" href="../../pages/portfolio/portfolio.php?lang=<?=$default_lang?>"><?= $lang[$default_lang]['menu'][2] ?></a>
                    </li>
                    <li class="nav-item mr-4">
                        <a class="nav-link spec" href="contact.php?lang=<?=$default_lang?>"><?= $lang[$default_lang]['menu'][3] ?></a>
                    </li>
                </ul>
            </div>
            <div class="plash" onclick="menuClose()"></div>
            <div id="togglemenu">
                <div class="container">
                    <ul>
                        <li>
                            <a href="../../index.php?lang=<?=$default_lang?>"><?= $lang[$default_lang]['menu'][0] ?></a>
                        </li>
                        <li>
                            <a href="../about/about.php?lang=<?=$default_lang?>"><?= $lang[$default_lang]['menu'][1] ?></a>
                        </li>
                        <li>
                            <a href="../portfolio/portfolio.php?lang=<?=$default_lang?>"><?= $lang[$default_lang]['menu'][2] ?></a>
                        </li>
                        <li>
                            <a href="../contact/contact.php?lang=<?=$default_lang?>"><?= $lang[$default_lang]['menu'][3] ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

  <main class="m-sm-1 m-md-5 m-1 mt-5 contact-main">
    <div class="contact-cont d-flex flex-column justify-content-center align-items-center">
      <div class="title pl-5 pr-5 mb-5 pb-2">
        <h1><?= $lang[$default_lang]['contact'][0] ?></h1>
      </div>
      <form action="sendmail.php" method="POST" role="form">
        <div class="form-group d-flex flex-column flex-sm-row flex-md-row flex-lg-row flex-xl-row justify-content-center align-items-center">
          <label for="inputEmail" class="col-sm-2 col-form-label title2"><?= $lang[$default_lang]['contact'][1] ?></label>
          <div class="col-sm-10 input-group">
            <input type="email" class="form-control" id="inputEmail" placeholder="email@example.com" name="useremail">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-user"></i></span>
            </div>
          </div>
        </div>

        <div class="form-group d-flex flex-column flex-sm-row flex-md-row flex-lg-row flex-xl-row justify-content-center align-items-center">
          <label for="disabledTextInput" class="col-sm-2 col-form-label title2"><?= $lang[$default_lang]['contact'][2] ?></label>
          <div class="col-sm-10  input-group input-group-spec">
            <input type="text" name="myemail" readonly class="form-control" id="disabledTextInput" value="alaeessaki3@gmail.com">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupPrepend"><a id="copy-btn" onclick="copy()" data-container="body" data-toggle="popover" data-placement="top" data-content="Copied"><?= $lang[$default_lang]['contact'][3] ?></a></span>

            </div>
          </div>
        </div>
        <div class="form-group d-flex flex-column flex-sm-row flex-md-row flex-lg-row flex-xl-row justify-content-center align-items-center">
          <label for="inputObject" class="col-sm-2 col-form-label title2"><?= $lang[$default_lang]['contact'][4] ?></label>
          <div class="col-sm-10  input-group">
            <input type="text" name="object" class="form-control" id="inputObject" placeholder="<?= $lang[$default_lang]['contact'][4] ?>">
          </div>
        </div>
        <div class="form-group d-flex flex-column flex-sm-row flex-md-row flex-lg-row flex-xl-row justify-content-center align-items-center">
          <label for="Textarea1" class="col-sm-2 col-form-label title2"><?= $lang[$default_lang]['contact'][5] ?></label>
          <div class="col-sm-10  input-group">
            <textarea class="form-control" name="Message" id="Textarea1" style="height: 8rem;"></textarea>
          </div>
        </div>
        <div class="d-flex justify-content-center">
          <button type="submit" name="submit" class="btn"><?= $lang[$default_lang]['contact'][6] ?></button>
        </div>
      </form>


    </div>
    <div class="btn-group dropleft shadow-none" data-sal="slide-left" data-sal-delay="150" data-sal-easing="ease-out-bounce" data-sal-duration="800">
            <button class="btn btn-secondary dropdown-toggle shadow-none" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Lang
            </button>
            <div class="dropdown-menu shadow-none" aria-labelledby="dropdownMenuButton">
                <form action="" method="GET">
                    <a class="dropdown-item" href="contact.php?lang=eng">ENGLISH</a>
                    <a class="dropdown-item text-uppercase" href="contact.php?lang=fr">Français</a>
                </form>
            </div>
        </div>
  </main>


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
                <img src="../../assets/imgs/frame.png">
            </div>

            <div class="reseaux d-flex flex-row flex-sm-wrap flex-md-wrap mt-4">
                <a href="https://www.facebook.com/alae.essaki1"><i class="fab fa-facebook-square"></i></a>
                <a href="https://github.com/alaeessaki?tab=repositories"><i class="fab fa-github-square"></i></a>
                <a href="https://www.linkedin.com/in/alae-essaki-15485016a/"><i class="fab fa-linkedin"></i></a>
                <a href="https://twitter.com/es_alae"><i class="fab fa-twitter-square"></i></a>
                <a href="https://www.instagram.com/alaeessaki/"><i class="fab fa-instagram"></i></a>
            </div>

            <!-- Copyright -->
            <div class="copyrights mt-5">
                <p>copyrights &copy; 2019: <a href="#">Alae ES-SAKI</a></p>
            </div>
        </div>
    </footer>


  <!--other Libraries-->
  <script src="../../lib/jQuery-3-4-1/jquery-3.4.1.min.js"></script>
  <script src="../../lib/popper/popper.min.js"></script>
  <script src="../../lib/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>

  <!--Main Js-->
  <script src="js/contact.js"></script>
  <script src="../../js/menu.js"></script>
  <script src="../../js/loader.js"></script>


    <div class="loader-wrapper">
        <span class="loader"><span class="loader-inner"></span></span>
    </div>
</body>

</html>