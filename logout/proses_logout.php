<?php
session_start();
if(!isset($_SESSION['username'])){
  echo "<script>alert('Silahkan Login terlebih dahulu'); window.location='login/login.php';</script>";
}
session_destroy();
echo "<script>location.href='../login/login.php';</script>";
?>