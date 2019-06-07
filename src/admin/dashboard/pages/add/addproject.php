<?php
require_once "../../../auth.inc.php";
require "../../../database.php";

$user = $_SESSION['auth'];
$projectError = "";
$descError = "";
$techError = "";
$catError = "";
$gitError = "";

if(isset($_POST['submit'])){
  $filename = $_POST['filename'];
  $filedesc = $_POST['filedesc'];
  $filetech = $_POST['filetech'];
  $filecat = $_POST['filecat'];
  $filelink = $_POST['filelink'];
  if(isset($_POST['fileshow'])){
    $fileshow = 1;
  }
  if(!isset($_POST['fileshow'])){
    $fileshow = 0;
  }
  $filephtoname = $_FILES['filepic']['name'];
  $tmp_name = $_FILES['filepic']['tmp_name'];
  if($_FILES['filepic']['error']==0){
      move_uploaded_file($tmp_name, "../../../../assets/projects-imgs/$filephtoname");
  }
  $db = Database::connect();
  $sql = "INSERT INTO projects VALUES(NULL,?,?,?,?,?,?,?)";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(1,$filename,PDO::PARAM_STR);
  $stmt->bindValue(2,$filephtoname,PDO::PARAM_STR);
  $stmt->bindValue(3,$filedesc,PDO::PARAM_STR);
  $stmt->bindValue(4,$filetech,PDO::PARAM_STR);
  $stmt->bindValue(5,$filecat,PDO::PARAM_STR);
  $stmt->bindValue(6,$filelink,PDO::PARAM_STR);
  $stmt->bindValue(7,$fileshow,PDO::PARAM_INT);

  $stmt->execute();
  header("location:addproject.php?projectadded");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Add project</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!--  -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

  <!-- Custom styles for this template-->
  <link href="../../../css/dashboard/sb-admin.css" rel="stylesheet">
  <link href="css/add.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark static-top">

    <a class="navbar-brand mr-1" href="../../../dashboard.php">Welcome <?= $user ?></a>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="badge badge-danger">7</span>
          <i class="fas fa-envelope fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Settings</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../../../logout.php">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="../../../dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Projects</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="#">
            <i class="fas fa-plus"></i>
            <span>Add Project</span>
          </a>
          <a class="dropdown-item" href="register.html">
            <i class="fas fa-project-diagram" style="font-size:12px;"></i>
            <span>All Projects</span>
          </a>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li>
    </ul>


    <form action="" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="exampleInputEmail1">Project Name</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Project name" name="filename">
        <small id="emailHelp" class="form-text text-muted"><?= $projectError ?></small>
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Description</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="filedesc"></textarea>
        <small id="emailHelp" class="form-text text-muted"><?= $descError ?></small>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">technologies</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter technologies" name="filetech">
        <small id="emailHelp" class="form-text text-muted">Enter technologies seperated with /</small>
        <small id="emailHelp" class="form-text text-muted"><?= $techError ?></small>
      </div>
      <label>Categorie : </label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="filecat" id="inlineRadio1" value="website">
        <label class="form-check-label" for="inlineRadio1">website</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="filecat" id="inlineRadio1" value="mobileapp">
        <label class="form-check-label" for="inlineRadio1">mobile app</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="filecat" id="inlineRadio1" value="webapp">
        <label class="form-check-label" for="inlineRadio1">web app</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="filecat" id="inlineRadio1" value="game">
        <label class="form-check-label" for="inlineRadio1">game</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="filecat" id="inlineRadio1" value="others">
        <label class="form-check-label" for="inlineRadio1">others</label>
      </div>
      <small id="emailHelp" class="form-text text-muted"><?= $catError ?></small><br>
      <div class="form-group">
        <label for="exampleInputEmail1">Github link</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Project name" name="filelink">
        <small id="emailHelp" class="form-text text-muted"><?= $gitError ?></small>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" name="fileshow" type="checkbox" id="inlineCheckbox1" value="1">
        <label class="form-check-label" for="inlineCheckbox1">Show it in home page ?</label>
      </div><br><br>
      <div class="form-group">
        <label for="exampleFormControlFile1">project image</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="filepic">
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>


    <div class="container-fluid">
      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Alae Es-saki</span>
          </div>
        </div>
      </footer>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>








</body>

</html>