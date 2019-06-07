<?php
session_start();
if(isset($_SESSION['auth'])){
    unset($_SESSION['auth']);
    session_destroy();
    header("location:login.php");
}
else{
    echo "something went wrong";
}
?>