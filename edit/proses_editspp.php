<?php
session_start();
if ($_SESSION['tingkat'] == 'admin') {

$angkatan = $_POST['angkatan'];
$nominal = $_POST['nominal'];

$query = "UPDATE tb_spp set angkatan='$angkatan', nominal='$nominal' where angkatan='$angkatan'";

include ('../koneksi.php');
$hasil = mysqli_query($koneksi, $query);

if(!$hasil) {
    die("Gagal Memasukan Data Spp " . mysqli_query($koneksi, $query));
}

else{
    echo "<script>
        alert('Data Berhasil di Update')
        document.location.href='../view/viewspp.php';
        </script>
        ";
}
} else {
    echo "<script>alert('Anda Tidak Memiliki Akses Untuk Menu Ini');location.href='../dashboard/dashboard.php';</script>";
}
?>