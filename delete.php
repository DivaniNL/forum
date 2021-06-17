<?php
include 'connect.php';
session_start();

if (isset($_SESSION['login'])) {
} else {
  header('Location: index.php');
  exit();
}

$id = $_GET['id'];
$sql="DELETE FROM berichten where id = $id";
echo $sql;
if ($conn->query($sql) === TRUE) {
  header("location: home.php");
}
else {
}

 ?>
