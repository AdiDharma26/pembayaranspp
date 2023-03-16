<?php 
session_start();
if(!isset($_SESSION['username'])){
  echo "<script>alert('Silahkan Login terlebih dahulu'); window.location='login/login.php';</script>";
}

?>