<?php

if ($_SESSION['tingkat'] == 'admin') {


include('../koneksi.php');

$angkatan = $_GET['angkatan'];

$query = "DELETE FROM tb_spp WHERE angkatan='$angkatan'";

$hasil = mysqli_query($koneksi, $query);

if(!$hasil) {
    die("Gagal Menghapus Data spp  " . mysqli_error($koneksi));
}

else{
    echo "<script>
        alert('Data Di Delete');
        document.location.href='../view/viewspp.php';
        </script>
        ";
}
} else {
    echo "<script>alert('Anda Tidak Memiliki Akses Untuk Menu Ini');location.href='../dashboard/dashboard.php';</script>";
}
?>