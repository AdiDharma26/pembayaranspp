<?php
session_start();
if ($_SESSION['tingkat'] == 'admin' or $_SESSION['tingkat'] == 'petugas') {

  @$id_pemp = $_POST['id_pembayaran'];
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/insert_pembayaran.css">
    <title>Insert Pembayaran</title>
  </head>

  <body>

    <?php include '../sidebar/sidebar.php' ?>

    <div class="judul">
      <h1>Insert Pembayaran</h1>
      <hr>
    </div>

    <div class="container">
      <form method="POST" action="../edit/proses_editpembayaran.php">
        <table>
          <?php
          $query = mysqli_query($koneksi, "SELECT * FROM tb_pembayaran INNER JOIN tb_siswa USING(nis) WHERE idpembayaran='$id_pemp'");
          $number = 1;
          $row = mysqli_fetch_assoc($query);
          ?>
          <input type="text" name="id_bayar" hidden value="<?= $row['idpembayaran']; ?>">
          <input type="text" name="nis" hidden value="<?= $row['nis']; ?>">
          <tr>
            <th>Nama</th>
            <td>:</td>
            <td><?= $row['namasiswa']; ?></td>
          </tr>
          <tr>
            <th>Kelas</th>
            <td>:</td>
            <td><?= $row['kelas']; ?></td>
          </tr>
          <tr>
            <th>NIS</th>
            <td>:</td>
            <td><?= $row['nis']; ?></td>
          </tr>
          <tr>
            <th>Bulan Pembayaran</th>
            <td>:</td>
            <td><?= $row['bulan']; ?></td>
          </tr>
          <tr>
            <th>Batas Pembayaran</th>
            <td>:</td>
            <td><?= $row['bataspembayaran']; ?></td>
          </tr>
          <tr>
            <th>Nominal</th>
            <td>:</td>
            <td>Rp. <?= number_format($row['jumlah'], 0, ',', '.'); ?></td>
          </tr>
          <tr>
            <th>Tanggal bayar</th>
            <td>:</td>
            <td><?= date('Y-m-d') ?></td>
          </tr>
        </table>
        <button type="submit" name="bayar" class="bayar">Bayar</button>
      </form>
      <hr>
      <a href="../view/viewpembayaran.php"><button type="submit" class="kembali">Kembali</button></a>
    </div>
  <?php
} else {
  echo "<script>alert('Anda Tidak Memiliki Akses Untuk Menu Ini');location.href='../dashboard/dashboard.php';</script>";
}
  ?>
  </body>

  </html>