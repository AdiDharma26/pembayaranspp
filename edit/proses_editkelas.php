<?php
session_start();
if ($_SESSION['tingkat'] == 'admin') {

$kelas = $_POST['kelas'];

$keterangan = $_POST['keterangan'];

$query = "UPDATE tb_kelas set kelas='$kelas', keterangan='$keterangan' where kelas='$kelas'";

include ('../koneksi.php');
$hasil = mysqli_query($koneksi, $query);

if(!$hasil) {
    die("Gagal Memasukan Data Kelas " . mysqli_query($koneksi, $query));
}

else{
    echo "<script>
        alert('Data Berhasil di Update')
        document.location.href='../view/viewkelas.php';
        </script>
        ";
}
} else {
    echo "<script>alert('Anda Tidak Memiliki Akses Untuk Menu Ini');location.href='../dashboard/dashboard.php';</script>";
}
?>