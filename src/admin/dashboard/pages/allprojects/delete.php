<?php
require_once "../../../auth.inc.php";
require "../../../database.php";
$user = $_SESSION['auth'];

$id = $_GET['id'];
$db = Database::connect();
$sql = "DELETE FROM projects WHERE id=$id";
$stmt = $db->query($sql);
$stmt->execute();
header('location:allprojects.php?project_is_deleted');
?>