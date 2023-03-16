<?php

if ($_SESSION['tingkat'] == 'admin') {

$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$namapetugas = $_POST['namapetugas'];
$tingkat = $_POST['tingkat'];

$query = "UPDATE tb_petugas set id='$id', username='$username', password='$password', 
namapetugas='$namapetugas', tingkat='$tingkat' where id='$id'";

include ('../koneksi.php');
$hasil = mysqli_query($koneksi, $query);

if(!$hasil) {
    die("Gagal Memasukan Data Petugas " . mysqli_query($koneksi, $query));
}

else{
    echo "<script>
        alert('Data Berhasil di Update')
        document.location.href='../view/viewpetugas.php';
        </script>
        ";
}
} else {
    echo "<script>alert('Anda Tidak Memiliki Akses Untuk Menu Ini');location.href='../dashboard/dashboard.php';</script>";
}
?>