<!-- <!DOCTYPE html> -->
<!-- <html lang="en"> -->

<?php
session_start();
$_SESSION['view'] = 'pembayaran';
include('../koneksi.php');
if ($_SESSION['tingkat'] == 'admin' or $_SESSION['tingkat'] == 'petugas') {

?>

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/pembayaran.css">
    <title>Pembayaran</title>
  </head>

  <body>

    <?php include '../sidebar/sidebar.php'; ?>

    <div class="judul">
      <h1>Data Pembayaran</h1>
      <hr>
    </div>


    <!-- pencarian NIS -->

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
      if (@$_POST['nis'] or @$_GET['nis']) {
        @$nis = $_POST['nis'];
        @$nis = $_GET['nis'];
        $querycari = "SELECT * FROM tb_siswa WHERE nis = '$nis'";
        $resultcari = mysqli_query($koneksi, $querycari);
        $data = mysqli_fetch_assoc($resultcari);
      ?>
        <!-- Box Biodata -->

        <div class="box_biodata">
          <table class="bd">



            <form method="POST" action="../insert/insertpembayaran.php">
              <tr>
                <th>NIS</th>
                <td><?= $data['nis'] ?></td>
              </tr>
              <tr>
                <th>NAMA</th>
                <td><?= $data['namasiswa'] ?></td>
              </tr>
              <tr>
                <th>KELAS</th>
                <td><?= $data['kelas'] ?></td>
              </tr>
              <tr>
                <th>ANGKATAN</th>
                <td><?= $data['angkatan'] ?></td>
              </tr>
              <tr>
                <th>NOMINAL</th>
                <?php
                $angkatan = $data['angkatan'];
                $queryspp = mysqli_query($koneksi, "SELECT nominal FROM tb_spp WHERE angkatan='$angkatan'");
                $dataspp = mysqli_fetch_assoc($queryspp);
                ?><input type="text" hidden name="angkatan" value="<?= $angkatan ?>">
                <td>Rp. <?= number_format($dataspp['nominal'], 0, ',', '.'); ?></td>
              </tr>
          </table>
        </div>


        <!-- Tabel Pembayaran -->

        <div class="tabel_pembayaran">
          <table class="pb">
            <tr>
              <th>NO</th>
              <th>NIS</th>
              <th>BULAN</th>
              <th>BATAS PEMBAYARAN</th>
              <th>NOMINAL</th>
              <th>KETERANGAN</th>
              <th>AKSI</th>
            </tr>
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM tb_pembayaran WHERE nis='$nis'");
            $number = 1;
            while ($row = mysqli_fetch_assoc($query)) :
            ?>
              <tr>
                <td><?= $number++ ?></td>
                <td><?= $nis ?></td>
                <td><?= $row['bulan'] ?></td>
                <td><?= $row['bataspembayaran'] ?></td>
                <td>Rp. <?= number_format($row['jumlah'], 0, ',', '.') ?></td>
                <?php if ($row['tanggal'] == null) : ?>
                  <td>
                    Belum Lunas
                  </td>
                  <td><button type="submit" name="id_pembayaran" value="<?= $row['idpembayaran'] ?>">Bayar</button></td>
                <?php else : ?>
                  <td>
                    Lunas
                  </td>
                  <td><button class='lunas' disabled>Terbayar</button></td>
                <?php endif; ?>
              </tr>
            <?php endwhile; ?>
            <!-- <tr>
              <td rowspan="7" style="border-bottom: 1px solid rgb(236, 225, 225);"></td>
            </tr> -->
          </table>
        </div>
      <?php
      }
      ?>
      </form>
    </div>
  <?php
} else {
  echo "<script>alert('Anda Tidak Memiliki Akses Untuk Menu Ini');location.href='../dashboard/dashboard.php';</script>";
}
  ?>


  </body>

  </html>