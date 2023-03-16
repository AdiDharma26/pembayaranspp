<?php

if ($_SESSION['tingkat'] == 'admin') {


include('../koneksi.php');

$nis = $_GET['nis'];

$query = "DELETE FROM tb_siswa WHERE nis ='$nis'";
$query_pembayaran = "DELETE FROM tb_pembayaran WHERE nis ='$nis'";

$hasil = mysqli_query($koneksi, $query_pembayaran);
$hasil = mysqli_query($koneksi, $query);


if(!$hasil) {
    die("Gagal Menghapus Data Siswa  " . mysqli_error($koneksi));
}

else{
    echo "<script>
        alert('Data Di Delete');
        document.location.href='../view/viewsiswa.php';
        </script>
        ";
}

} else {
    echo "<script>alert('Anda Tidak Memiliki Akses Untuk Menu Ini');location.href='../dashboard/dashboard.php';</script>";
}
?>
