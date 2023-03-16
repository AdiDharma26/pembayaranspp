<?php
session_start();
include "../koneksi.php";
 $username = $_POST['username'];
 $pass = $_POST['password'];

$queryadmin = mysqli_query($koneksi, "SELECT * FROM tb_petugas WHERE username='$username' AND password='$pass' AND tingkat='admin'") or die(mysqli_error($koneksi));
$querypetugas = mysqli_query($koneksi, "SELECT * FROM tb_petugas WHERE username='$username' AND password='$pass' AND tingkat='petugas'") or die(mysqli_error($koneksi));
$querysiswa = mysqli_query($koneksi, "SELECT * FROM tb_siswa WHERE nis='$username' AND password='$pass'") or die(mysqli_error($koneksi));

if (mysqli_num_rows($queryadmin) > 0) { //cek user admin
    $data_admin = mysqli_fetch_assoc($queryadmin);
    $_SESSION['id'] = $data_admin['id'];
    $_SESSION['username'] = $data_admin['username'];
    $_SESSION['tingkat'] = 'admin';
    echo "<script>window.location='../dashboard/dashboard.php';</script>";

} elseif (mysqli_num_rows($querypetugas) > 0) { //cek user petugas
    $data_petugas = mysqli_fetch_assoc($querypetugas);
    $_SESSION['id'] = $data_petugas['id'];
    $_SESSION['username'] = $data_petugas['username'];
    $_SESSION['tingkat'] = 'petugas';
    echo "<script>window.location='../dashboard/dashboard.php';</script>";
    
} elseif (mysqli_num_rows($querysiswa) > 0) { //cek user siswa
    $data_siswa = mysqli_fetch_assoc($querysiswa);
    $_SESSION['nis'] = $data_siswa['nis'];
    $_SESSION['username'] = $data_siswa['nis'];
    $_SESSION['tingkat'] = 'siswa';
    echo "<script>window.location='../dashboard/dashboard.php';</script>";
    
} else {
    echo "<script> alert('gagal login');window.location='login.php';</script>";
}
