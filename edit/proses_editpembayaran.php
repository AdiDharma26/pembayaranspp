<?php 
session_start();
include ('../koneksi.php');

  if ($_SESSION['tingkat'] == 'admin' OR $_SESSION['tingkat'] == 'petugas') {

    $id_pemp = $_POST['id_bayar'];
    $idpetugas = $_SESSION['id'];
    $tanggal = date('Y-m-d');
    $keterangan = 'Lunas';
    $nis = $_POST['nis'];

    $query = "UPDATE tb_pembayaran set idpetugas='$idpetugas',tanggal='$tanggal', keterangan='$keterangan' where idpembayaran='$id_pemp'";

   
    $hasil = mysqli_query($koneksi, $query);

    if(!$hasil) {
        die("Gagal Memasukan Data Pembayaran " . mysqli_query($koneksi, $query));
    }

    else{
        echo "<script>
            document.location.href='../view/viewpembayaran.php?nis=$nis';
            </script>
            ";
    }
} else {
    echo "<script>alert('Anda Tidak Memiliki Akses Untuk Menu Ini');location.href='../dashboard/dashboard.php';</script>";
}
?>