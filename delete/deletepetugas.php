<?php

if ($_SESSION['tingkat'] == 'admin') {


    include('../koneksi.php');

    $id = $_GET['id'];

    $query = "DELETE FROM tb_petugas WHERE id ='$id'";

    $hasil = mysqli_query($koneksi, $query);

    if (!$hasil) {
        die("Gagal Menghapus Data Petugas  " . mysqli_error($koneksi));
    } else {
        echo "<script>
        alert('Data Di Delete');
        document.location.href='../view/viewpetugas.php';
        </script>
        ";
    }

} else {
    echo "<script>alert('Anda Tidak Memiliki Akses Untuk Menu Ini');location.href='../dashboard/dashboard.php';</script>";
}
?>