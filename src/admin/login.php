<?php
require 'database.php';

$userError="";
$passError = "";
$loginError = "";

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $error =false;
    $db = Database::connect();
    $sql ="SELECT * FROM admin";
    $stmt = $db->query($sql);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    Database::disconnect();
    
    if(empty($_POST['username'])){
        $userError = "Username is required";
        $error = true;
    }
    if(empty($_POST['password'])){
        $passError = "password is required";
        $error = true;
    }
    if($error == false){
        foreach($rows as $row){ 
            if($row['username']==$username && $row['password']==$password){
                session_start();
                $_SESSION['auth']=$username;
                header('location:dashboard.php');
            }
            else{
                $loginError = "Username or password is unvalid";
            }
        }
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../lib/bootstrap-4.3.1-dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="css/login/login.css">
    <title>Login</title>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center">
        <form action="" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username" name="username">
                <small id="emailHelp" class="form-text text-muted"><?=$userError?></small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                <small id="emailHelp" class="form-text text-muted"><?=$passError?></small>
                <small id="emailHelp" class="form-text text-muted"><?=$loginError?></small>
            </div>
            <div class="button d-flex justify-content-center align-items-center">
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <div>
        </form>
        <div>


            <!--other Libraries-->
            <script src="../lib/jQuery-3-4-1/jquery-3.4.1.min.js"></script>
            <script src="../lib/popper/popper.min.js"></script>
            <script src="../lib/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>

</body>

</html>