<?php
if ($_SESSION['tingkat'] == 'admin') {



    include('../koneksi.php');

    $kelas = $_GET['kelas'];

    $query = "DELETE FROM tb_kelas WHERE kelas='$kelas'";

    $hasil = mysqli_query($koneksi, $query);

    if (!$hasil) {
        die("Gagal Menghapus Data Kelas  " . mysqli_error($koneksi));
    } else {
        echo "<script>
        alert('Data Di Delete');
        document.location.href='../view/viewkelas.php';
        </script>
        ";
    }
} else {
    echo "<script>alert('Anda Tidak Memiliki Akses Untuk Menu Ini');location.href='../dashboard/dashboard.php';</script>";
}
?>