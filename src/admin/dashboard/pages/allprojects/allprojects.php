<?php
require_once "../../../auth.inc.php";
require "../../../database.php";
$user = $_SESSION['auth'];

$db = Database::connect();
$sql = "SELECT * FROM projects";
$stmt = $db->query($sql);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
    <link href="css/allprojects.css" rel="stylesheet">
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
                    <a class="dropdown-item" href="../add/addproject.php">
                        <i class="fas fa-plus"></i>
                        <span>Add Project</span>
                    </a>
                    <a class="dropdown-item" href="#">
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

        <table border="2" style="width:100%; margin-top:20px; margin-bottom: 20rem; font-size:14px" class="mr-2 ml-2">
            <tr class="text-center">
                <th width='20%''>project image</th>
                <th width="20%">project name</th>
                <th>project categorie</th>
                <th width='20%'>project githublink</th>
                <th width="30%"></th>
            </tr>
            <?php foreach ($rows as $row) : ?>
                <tr class="text-center">
                    <td>
                        <img src="../../../../assets/imgs/<?= $row['image'] ?>" style="width:70%; padding:5px;">
                    </td>
                    <td class="p-2">
                        <?= $row['name'] ?>
                    </td>
                    <td class="p-2">
                        <?= $row['categorie'] ?>
                    </td>
                    <td class="p-2">
                        <?= $row['github'] ?>
                    </td>
                    <td class="p-2">
                    <button type="button" class="btn btn-primary" style="font-size:12px;">View</button>
                    <a href="edit.php?id=<?=$row['id']?>"><button type="button" class="btn btn-secondary" style="font-size:12px;">Edit</button></a>
                    <a href="delete.php?id=<?=$row['id']?>"><button type="button" class="btn btn-danger" style="background-color:red!important; color:white; font-size:12px;">delete</button></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright © Alae Es-saki</span>
                </div>
            </div>
        </footer>




        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>

</html>