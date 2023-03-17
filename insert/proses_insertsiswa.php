<?php
session_start();
if ($_SESSION['tingkat'] == 'admin') {

include('../koneksi.php');

$nis = $_POST['nis'];
$password = 'smkti';
$namasiswa = $_POST['namasiswa'];
$kelas = $_POST['kelas'];
$angkatan = $_POST['angkatan'];
$alamat = $_POST['alamat'];
$notelp = $_POST['notelp'];

$nominal = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT nominal FROM tb_spp WHERE angkatan ='$angkatan'"));
$hasil_nominal = $nominal ['nominal'];

$query_siswa = mysqli_query($koneksi,"INSERT INTO tb_siswa VALUES ('$nis','$password','$namasiswa','$kelas','$angkatan','$alamat','$notelp')");


$awaltempo = date($angkatan."-07-d");

$bulanindo = [
  '01' => 'Januari',
  '02' => 'Februari',
  '03' => 'Maret',
  '04' => 'April',
  '05' => 'Mei',
  '06' => 'Juni',
  '07' => 'Juli',
  '08' => 'Agustus',
  '09' => 'September',
  '10' => 'Oktober',
  '11' => 'November',
  '12' => 'Desember',
];

for ($i = 0; $i < 36; $i++) {
  $jatuhtempo = date("Y-m-d", strtotime("+$i month", strtotime($awaltempo)));

  $bulan = $bulanindo[date('m', strtotime($jatuhtempo))]." ".date('Y', strtotime($jatuhtempo));

  $tahun_jatuh_tempo = date('Y', strtotime($jatuhtempo));

  $query_pembayaran = mysqli_query($koneksi, "INSERT INTO tb_pembayaran VALUES ('',NULL,'$nis','$bulan', '10 $bulan',NULL,'$hasil_nominal','Belum Lunas')");
}
if(!$query_siswa){
  die("Gagal menambahkan data".mysqli_error($koneksi));
}else{
  echo "<script>alert('Data berhasil masuk');location.href='../view/viewsiswa.php';</script>";
}
} else {
  echo "<script>alert('Anda Tidak Memiliki Akses Untuk Menu Ini');location.href='../dashboard/dashboard.php';</script>";
}
?>
