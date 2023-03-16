<?Php

if ($_SESSION['tingkat'] == 'admin') {

$username = $_POST['username'];
$password = $_POST['password'];
$namapetugas = $_POST['namapetugas'];
$tingkat = $_POST['tingkat'];

$query = "INSERT INTO tb_petugas values  ('','$username','$password','$namapetugas','$tingkat')";

include ('../koneksi.php');
$hasil = mysqli_query($koneksi, $query);

if(!$hasil) {
  die("Gagal Memasukan Data Petugas" . mysqli_query($koneksi, $query));

}

else{
  echo "<script>
  alert('Data Berhasil Di Tambahkan')
  document.location.href='../view/viewpetugas.php';
  </script>";
}
} else {
  echo "<script>alert('Anda Tidak Memiliki Akses Untuk Menu Ini');location.href='../dashboard/dashboard.php';</script>";
}
?>