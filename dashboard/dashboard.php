<?php
session_start();
$_SESSION['view'] = 'dashboard';
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
  <title>Dashboard</title>
</head>

<body>

  <?php include '../sidebar/sidebar.php';
  if ($_SESSION['tingkat'] == 'admin' or $_SESSION['tingkat'] == 'petugas') {


    $total_siswa = mysqli_query($koneksi, "SELECT COUNT(*) AS 'jumlah_siswa' FROM tb_siswa");
    $total_siswa = mysqli_fetch_array($total_siswa);

    $total_petugas = mysqli_query($koneksi, "SELECT COUNT(*) AS 'jumlah_petugas' FROM tb_petugas");
    $total_petugas = mysqli_fetch_array($total_petugas);

    $total_kelas = mysqli_query($koneksi, "SELECT COUNT(*) AS 'jumlah_kelas' FROM tb_kelas");
    $total_kelas = mysqli_fetch_array($total_kelas);

    $total_pembayaran = mysqli_query($koneksi, "SELECT SUM(jumlah) as jumlah_pembayaran FROM tb_pembayaran where keterangan = 'Lunas' ");
    $total_pembayaran = mysqli_fetch_array($total_pembayaran);
  ?>
    <div class="judul">
      <h1>Dashboard</h1>
      <hr>
    </div>

    <div class="card-container">
      <div class="card">
        <h1>JUMLAH SISWA</h1>
        <p><?= $total_siswa['jumlah_siswa']; ?></p>
      </div>
      <div class="card">
        <h1>JUMLAH PETUGAS</h1>
        <p><?= $total_petugas['jumlah_petugas']; ?></p>
      </div>
      <div class="card">
        <h1>JUMLAH KELAS</h1>
        <p><?= $total_kelas['jumlah_kelas']; ?></p>
      </div>
      <div class="card">
        <h1>TOTAL SELURUH PEMBAYARAN</h1>
        <p>Rp. <?= number_format( $total_pembayaran['jumlah_pembayaran'],0,',','.') ?></p>
      </div>
    </div>


  <?php
  } else {
  ?>
    <div class="dashboard-siswa">
      <?php
      $nis = $_SESSION['nis'];
      $datasiswa = mysqli_query($koneksi, "SELECT * FROM tb_siswa WHERE nis = '$nis' ");
      $hasilsiswa = mysqli_fetch_assoc($datasiswa);

      ?>
      <h1 class="nm">Selamat Datang</h1>

      <table class="tb-siswa">
        <tr class="tr-siswa">
          <th class="th-siswa">NIS</th>
          <td class="td-siswa">:</td>
          <td class="td-siswa"><?= $hasilsiswa['nis']; ?></td>
        </tr>
        <tr class="tr-siswa">
          <th class="th-siswa">Nama</th>
          <td class="td-siswa">:</td>
          <td class="td-siswa"><?= $hasilsiswa['namasiswa']; ?></td>
        </tr>
        <tr class="tr-siswa">
          <th class="th-siswa">Kelas</th>
          <td class="td-siswa">:</td>
          <td class="td-siswa"><?= $hasilsiswa['kelas']; ?></td>
        </tr>
        <tr class="tr-siswa">
          <th class="th-siswa">Angkatan</th>
          <td class="td-siswa">:</td>
          <td class="td-siswa"><?= $hasilsiswa['angkatan'] ?></td>
        </tr>
      </table>

      <hr class="hr-nm">
    </div>
  <?php
  }
  ?>
  <script>
    const cards = document.querySelectorAll('.card');

    cards.forEach((card) => {
      card.addEventListener('mouseenter', () => {
        card.style.transform = 'scale(1.04)';
        card.style.boxShadow = '0px 0px 5px rgba(0,0,0,0.3)';
      });

      card.addEventListener('mouseleave', () => {
        card.style.transform = 'scale(1)';
        card.style.boxShadow = 'none';
      });
    });
  </script>
</body>

</html>