<?php
session_start();
if ($_SESSION['tingkat'] == 'admin') {

$kelas = $_POST['kelas'];
$keterangan = $_POST['keterangan'];

$query = "INSERT INTO tb_kelas values  ('$kelas','$keterangan')";

include ('../koneksi.php');
$hasil = mysqli_query($koneksi, $query);

if(!$hasil) {
  die("Gagal Memasukan Data Kelas" . mysqli_query($koneksi, $query));

}

else{
  echo "<script></script>
  alert('Data Berhasil Di Tambahkan')
  document.location.href='../view/viewkelas.php';
  </script>";
}
} else {
  echo "<script>alert('Anda Tidak Memiliki Akses Untuk Menu Ini');location.href='../dashboard/dashboard.php';</script>";
}
?>