<?php
session_start();
$_SESSION['view'] = 'riwayat';
if (!isset($_SESSION['username'])) {
  echo "<script>alert('Silahkan Login terlebih dahulu'); window.location='../login/login.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/riwayat.css">
  <title>Riwayat</title>
</head>

<body>
  <?php include '../sidebar/sidebar.php'; ?>

  <div class="judul">
    <h1>Riwayat</h1>
    <hr>
  </div>

  <?php
  if ($_SESSION['tingkat'] == 'admin' or $_SESSION['tingkat'] == 'petugas') {
  ?>

    <div class="container">
      <div class="cari_nis">
        <form method="GET" action="">
          <label for="">MASUKAN NIS</label>
          <input type="text" autocomplete="off" name="nis" list="nis">
          <datalist id="nis">
            <?php
            $query = "SELECT * FROM tb_siswa";
            $result = mysqli_query($koneksi, $query);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
              <option value="<?php echo $row['nis']; ?>"><?php echo $row['namasiswa'] ?></option>
            <?php
            }
            ?>
          </datalist>
          <button type="submit" class="button">Cari</button>
        </form>
      </div>

      <?php
      if (@$_GET['nis']) {
        @$nis = $_GET['nis'];
        $querycari = "SELECT * FROM tb_pembayaran WHERE keterangan= 'Lunas'";
        $resultcari = mysqli_query($koneksi, $querycari);
        $data = mysqli_fetch_assoc($resultcari);
      ?>

        <table border="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>PETUGAS</th>
              <th>NIS</th>
              <th>BULAN</th>
              <th>BATAS PEMBAYARAN</th>
              <th>TANGGAL BAYAR</th>
              <th>JUMLAH</th>
              <th>KETERANGAN</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include('../koneksi.php');
            $query  = "SELECT * FROM tb_pembayaran WHERE nis='$nis' AND keterangan='Lunas '";
            $hasil = mysqli_query($koneksi, $query);

            while ($row = mysqli_fetch_assoc($hasil)) {
            ?>

              <tr>
                <td><?php echo $row['idpembayaran'] ?></td>
                <td><?php echo $row['idpetugas'] ?></td>
                <td><?php echo $row['nis'] ?></td>
                <td><?php echo $row['bulan'] ?></td>
                <td><?php echo $row['bataspembayaran'] ?></td>
                <td><?php echo $row['tanggal'] ?></td>
                <td>Rp. <?php echo number_format( $row['jumlah'],0,',','.') ?></td>
                <td><?php echo $row['keterangan'] ?></td>
              </tr>

            <?php
            }
            ?>
          </tbody>
        </table>
      <?php
      }
      ?>
    </div>
  <?php
  } else {
  ?>

    <!-- RIWAYAT SISWA -->

    <div class="riwayat-siswa">
      <table class="tb-siswa">
        <thead class="thd-siswa">
          <tr class="tr-siswa">
            <th class="th-siswa">NIS</th>
            <th class="th-siswa">BULAN</th>
            <th class="th-siswa">BATAS PEMBAYARAN</th>
            <th class="th-siswa">TANGGAL BAYAR</th>
            <th class="th-siswa">JUMLAH</th>
            <th class="th-siswa">KETERANGAN</th>
          </tr>
        </thead>

        <?php
      $nis = $_SESSION['nis'];
      $datasiswa = mysqli_query($koneksi, "SELECT * FROM tb_pembayaran WHERE nis = '$nis' AND keterangan = 'Lunas' ");
      while ($row = mysqli_fetch_assoc($datasiswa)){
      ?>

        <tbody class="tbd-siswa">
        <tr class="tr-siswa">
          <td class="td-siswa"><?php echo $row['nis'] ?></td>
          <td class="td-siswa"><?php echo $row['bulan'] ?></td>
          <td class="td-siswa"><?php echo $row['bataspembayaran'] ?></td>
          <td class="td-siswa"><?php echo $row['tanggal'] ?></td>
          <td class="td-siswa">Rp. <?php echo number_format($row['jumlah'],0,',','.') ?></td>
          <td class="td-siswa"><?php echo $row['keterangan'] ?></td>
        </tr>
        <?php
        }
        ?>
        </tbody>
      </table>
    </div>
  <?php
  }
  ?>
</body>

</html>