<?Php
session_start();
if ($_SESSION['tingkat'] == 'admin') {

$angkatan = $_POST['angkatan'];
$nominal = $_POST['nominal'];

$query = "INSERT INTO tb_spp values ('$angkatan','$nominal')";

include ('../koneksi.php');
$hasil = mysqli_query($koneksi, $query);

if(!$hasil) {
  die("Gagal Memasukan Data spp" . mysqli_query($koneksi, $query));

}

else{
  echo "<script>
  alert('Data Berhasil Di Tambahkan')
  document.location.href='../view/viewspp.php';
  </script>";
}
} else {
  echo "<script>alert('Anda Tidak Memiliki Akses Untuk Menu Ini');location.href='../dashboard/dashboard.php';</script>";
}
?>