<?php
session_start();
$_SESSION['view'] = 'laporan';
if ($_SESSION['tingkat'] == 'admin') {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/laporan.css">
    <title>Laporan</title>
  </head>

  <body>

    <?php include '../sidebar/sidebar.php' ?>

    <div class="judul print">
      <h1>Laporan</h1>
      <hr>
    </div>
    <div class="container">

      <form action="" method="GET" class="print">
        <label>SORTIR</label>
        <select name="sortir" id="">
          <option value="" selected hidden></option>
          <option value="sort-nis">Nis</option>
          <option value="sort-kelas">Kelas</option>
          <option value="sort-angkatan">Angkatan</option>
          <option value="sort-bulan">Bulan</option>
        </select>
        <button name="cari" type="submit">Cari</button>
      </form>

      <?php
      if (@$_GET['sortir'] == 'sort-nis' || @$_GET['nis']) {
      ?>

        <!-- SORTIR BERDASARAKAN  NIS -->

        <div class="cari_nis print">
          <form method="GET">
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
            <button type="submit">Cari</button>
          </form>
        </div>

        <?php
        if (@$_GET['nis']) {
          $nis = $_GET['nis'];
          // $querycari = "SELECT * FROM tb_pembayaran";
          // $resultcari = mysqli_query($koneksi, $querycari);
          // $data = mysqli_fetch_assoc($resultcari);
        ?>

          <table border="0">
            <thead>
              <tr>
                <th>NO</th>
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
              <button onclick="window.print()" type="submit" class="btn-print print">Print</button>
              <?php
              include('../koneksi.php');
              $number = 1;
              $query = "SELECT * FROM tb_pembayaran WHERE nis='$nis'";
              $hasil = mysqli_query($koneksi, $query);

              while ($row = mysqli_fetch_assoc($hasil)) {
              ?>
                <tr>
                  <td><?php echo $number++ ?></td>
                  <td><?php echo $row['idpembayaran'] ?></td>
                  <td><?php echo $row['idpetugas'] ?></td>
                  <td><?php echo $row['nis'] ?></td>
                  <td><?php echo $row['bulan'] ?></td>
                  <td><?php echo $row['bataspembayaran'] ?></td>
                  <td><?php echo $row['tanggal'] ?></td>
                  <td>Rp. <?php echo number_format($row['jumlah'], 0, ',', '.') ?></td>
                  <td><?php echo $row['keterangan'] ?></td>
                </tr>

              <?php
              };
              $queryS = mysqli_query($koneksi, "SELECT SUM(jumlah) as jumlah FROM tb_pembayaran where keterangan = 'Lunas' AND nis = '$nis'");
              $total = mysqli_fetch_assoc($queryS);
              $total = $total['jumlah'];
              $ltotal = "Rp. " . number_format($total, 0, ',', '.');
              ?>
            </tbody>

            <tr class="tr-total">
              <td colspan="7" class="ltotal">TOTAL NOMINAL LUNAS</td>
              <td colspan="2" class="nml-ltotal"><?= $ltotal ?>
              </td>
            </tr>

            <?php
            $queryS = mysqli_query($koneksi, "SELECT SUM(jumlah) as jumlah FROM tb_pembayaran where keterangan = 'Belum Lunas' AND nis = '$nis'");
            $total = mysqli_fetch_assoc($queryS);
            $total = $total['jumlah'];
            $bltotal = "Rp. - " . number_format($total, 0, ',', '.');
            ?>

            <tr class="tr-total">
              <td colspan="7" class="bltotal">TOTAL NOMINAL BELUM LUNAS</td>
              <td colspan="2" class="nml-bltotal"><?= $bltotal ?>
              </td>
            </tr>
          </table>
        <?php
        }
        ?>

      <?php
      } elseif (@$_GET['sortir'] == 'sort-kelas' || @$_GET['kelas']) {
      ?>

        <!-- SORTIR BERDASARAKAN KELAS -->

        <div class="cari_kelas print">
          <form method="GET">

            <label for="">MASUKAN KELAS</label>
            <input type="text" autocomplete="off" name="kelas" list="kelas">
            <datalist id="kelas">
              <?php

              $query = "SELECT * FROM tb_kelas";
              $result = mysqli_query($koneksi, $query);
              while ($row = mysqli_fetch_assoc($result)) {
              ?>
                <option value="<?php echo $row['kelas']; ?>"><?php echo $row['status'] ?></option>
              <?php
              }
              ?>
            </datalist>
            <button type="submit">Cari</button>
          </form>
        </div>

        <?php
        if (@$_GET['kelas']) {
          $kelas = $_GET['kelas'];
          // $querycari = "SELECT * FROM tb_pembayaran";
          // $resultcari = mysqli_query($koneksi, $querycari);
          // $data = mysqli_fetch_assoc($resultcari);
        ?>

          <table border="0">
            <thead>
              <tr>
                <th>NO</th>
                <th>KELAS</th>
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
              <button onclick="window.print()" type="submit" class="btn-print print">Print</button>
              <?php
              include('../koneksi.php');
              $number = 1;
              $query = "SELECT * FROM tb_pembayaran INNER JOIN tb_siswa USING (nis) INNER JOIN tb_kelas ON tb_siswa.kelas = tb_kelas.kelas WHERE tb_kelas.kelas ='$kelas'";
              $hasil = mysqli_query($koneksi, $query);

              while ($row = mysqli_fetch_assoc($hasil)) {
              ?>
                <tr>
                  <td><?php echo $number++ ?></td>
                  <td><?php echo $row['kelas'] ?></td>
                  <td><?php echo $row['idpetugas'] ?></td>
                  <td><?php echo $row['nis'] ?></td>
                  <td><?php echo $row['bulan'] ?></td>
                  <td><?php echo $row['bataspembayaran'] ?></td>
                  <td><?php echo $row['tanggal'] ?></td>
                  <td><?php echo $row['jumlah'] ?></td>
                  <td><?php echo $row['keterangan'] ?></td>
                </tr>
              <?php
              };
              $queryS = mysqli_query($koneksi, "SELECT SUM(jumlah) as jumlah From tb_pembayaran inner join tb_siswa using(nis) inner join tb_kelas ON tb_siswa.kelas = tb_kelas.kelas WHERE keterangan = 'Lunas' AND tb_siswa.kelas ='$kelas'");
              $total = mysqli_fetch_assoc($queryS);
              $total = $total['jumlah'];
              $ltotal = "Rp. " . number_format($total, 0, ',', '.');
              ?>
            </tbody>

            <tr class="tr-total">
              <td colspan="7" class="ltotal">TOTAL NOMINAL LUNAS</td>
              <td colspan="2" class="nml-ltotal"><?= $ltotal ?>
              </td>
            </tr>

            <?php
            $queryS = mysqli_query($koneksi, "SELECT SUM(jumlah) as jumlah From tb_pembayaran inner join tb_siswa using(nis) inner join tb_kelas ON tb_siswa.kelas = tb_kelas.kelas WHERE keterangan = 'Belum Lunas' AND tb_siswa.kelas ='$kelas'");
            $total = mysqli_fetch_assoc($queryS);
            $total = $total['jumlah'];
            $bltotal = "Rp. - " . number_format($total, 0, ',', '.');
            ?>

            <tr class="tr-total">
              <td colspan="7" class="bltotal">TOTAL NOMINAL BELUM LUNAS</td>
              <td colspan="2" class="nml-bltotal"><?= $bltotal ?>
              </td>
            </tr>

          </table>
        <?php
        }
        ?>

      <?php
      } elseif (@$_GET['sortir'] == 'sort-angkatan' || @$_GET['angkatan']) {
      ?>

        <!-- SORTIR BERDASARKAN ANGKATAN -->

        <div class="cari_angkatan print">
          <form method="GET">

            <label for="">MASUKAN ANGKATAN</label>
            <input type="text" autocomplete="off" name="angkatan" list="angkatan">
            <datalist id="angkatan">
              <?php

              $query = "SELECT * FROM tb_spp";
              $result = mysqli_query($koneksi, $query);
              while ($row = mysqli_fetch_assoc($result)) {
              ?>
                <option value="<?php echo $row['angkatan']; ?>"><?php echo $row['nominal'] ?></option>
              <?php
              }
              ?>
            </datalist>
            <button type="submit">Cari</button>
          </form>
        </div>


        <?php
        if (@$_GET['angkatan']) {
          $angkatan = $_GET['angkatan'];
          // $querycari = "SELECT * FROM tb_pembayaran";
          // $resultcari = mysqli_query($koneksi, $querycari);
          // $data = mysqli_fetch_assoc($resultcari);
        ?>

          <table border="0">
            <thead>
              <tr>
                <th>NO</th>
                <th>ANGKATAN</th>
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
              <button onclick="window.print()" type="submit" class="btn-print print">Print</button>
              <?php
              include('../koneksi.php');
              $number = 1;
              $query = "SELECT * FROM tb_pembayaran INNER JOIN tb_siswa USING (nis) INNER JOIN tb_spp ON tb_siswa.angkatan = tb_spp.angkatan WHERE tb_spp.angkatan ='$angkatan'";
              $hasil = mysqli_query($koneksi, $query);

              while ($row = mysqli_fetch_assoc($hasil)) {
              ?>
                <tr>
                  <td><?php echo $number++ ?></td>
                  <td><?php echo $row['angkatan'] ?></td>
                  <td><?php echo $row['idpetugas'] ?></td>
                  <td><?php echo $row['nis'] ?></td>
                  <td><?php echo $row['bulan'] ?></td>
                  <td><?php echo $row['bataspembayaran'] ?></td>
                  <td><?php echo $row['tanggal'] ?></td>
                  <td><?php echo $row['jumlah'] ?></td>
                  <td><?php echo $row['keterangan'] ?></td>
                </tr>
              <?php
              };
              $queryS = mysqli_query($koneksi, "SELECT SUM(jumlah) as jumlah From tb_pembayaran inner join tb_siswa using(nis) inner join tb_spp ON tb_siswa.angkatan = tb_spp.angkatan WHERE keterangan = 'Lunas' AND tb_spp.angkatan ='$angkatan'");
              $total = mysqli_fetch_assoc($queryS);
              $total = $total['jumlah'];
              $ltotal = "Rp. " . number_format($total, 0, ',', '.');
              ?>
            </tbody>

            <tr class="tr-total">
              <td colspan="7" class="ltotal">TOTAL NOMINAL LUNAS</td>
              <td colspan="2" class="nml-ltotal"><?= $ltotal ?>
              </td>
            </tr>

            <?php
            $queryS = mysqli_query($koneksi, "SELECT SUM(jumlah) as jumlah From tb_pembayaran inner join tb_siswa using(nis) inner join tb_spp ON tb_siswa.angkatan = tb_spp.angkatan WHERE keterangan = 'Belum Lunas' AND tb_spp.angkatan ='$angkatan'");
            $total = mysqli_fetch_assoc($queryS);
            $total = $total['jumlah'];
            $bltotal = "Rp. - " . number_format($total, 0, ',', '.');
            ?>

            <tr class="tr-total">
              <td colspan="7" class="bltotal">TOTAL NOMINAL BELUM LUNAS</td>
              <td colspan="2" class="nml-bltotal"><?= $bltotal ?>
              </td>
            </tr>

          <?php
        }
          ?>

          <!-- SORTIR BERDASARKAN BULAN-->

        <?php
      } elseif (@$_GET['sortir'] == 'sort-bulan' || @$_GET['bulan']) {
        ?>

          <div class="cari_bulan print">
            <form method="GET">

              <label for="">MASUKAN BULAN</label>
              <input type="text" autocomplete="off" name="bulan" list="bulan">
              <datalist id="bulan">
                <?php

                $query = "SELECT * FROM tb_pembayaran";
                $result = mysqli_query($koneksi, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                  <option value="<?php echo $row['bulan']; ?>"></option>
                <?php
                }
                ?>
              </datalist>
              <button type="submit">Cari</button>
            </form>
          </div>


          <?php
          if (@$_GET['bulan']) {
            $bulan = $_GET['bulan'];
            // $querycari = "SELECT * FROM tb_pembayaran";
            // $resultcari = mysqli_query($koneksi, $querycari);
            // $data = mysqli_fetch_assoc($resultcari);
          ?>

            <table border="0">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>BULAN</th>
                  <th>PETUGAS</th>
                  <th>NIS</th>
                  <th>BATAS PEMBAYARAN</th>
                  <th>TANGGAL BAYAR</th>
                  <th>JUMLAH</th>
                  <th>KETERANGAN</th>
                </tr>
              </thead>
              <tbody>
                <button onclick="window.print()" type="submit" class="btn-print print">Print</button>
                <?php
                include('../koneksi.php');
                $number = 1;
                $query = "SELECT * FROM tb_pembayaran WHERE bulan ='$bulan'";
                $hasil = mysqli_query($koneksi, $query);

                while ($row = mysqli_fetch_assoc($hasil)) {
                ?>
                  <tr>
                    <td><?php echo $number++ ?></td>
                    <td><?php echo $row['bulan'] ?></td>
                    <td><?php echo $row['idpetugas'] ?></td>
                    <td><?php echo $row['nis'] ?></td>
                    <td><?php echo $row['bataspembayaran'] ?></td>
                    <td><?php echo $row['tanggal'] ?></td>
                    <td><?php echo $row['jumlah'] ?></td>
                    <td><?php echo $row['keterangan'] ?></td>
                  </tr>
                <?php
                };
                $queryS = mysqli_query($koneksi, "SELECT SUM(jumlah) as jumlah FROM tb_pembayaran where keterangan = 'Lunas' AND bulan = '$bulan'");
                $total = mysqli_fetch_assoc($queryS);
                $total = $total['jumlah'];
                $ltotal = "Rp. " . number_format($total, 0, ',', '.');
                ?>
              </tbody>

              <tr class="tr-total">
                <td colspan="6" class="ltotal">TOTAL NOMINAL LUNAS</td>
                <td colspan="2" class="nml-ltotal"><?= $ltotal ?>
                </td>
              </tr>

              <?php
              $queryS = mysqli_query($koneksi, "SELECT SUM(jumlah) as jumlah FROM tb_pembayaran where keterangan = 'Belum Lunas' AND bulan = '$bulan'");
              $total = mysqli_fetch_assoc($queryS);
              $total = $total['jumlah'];
              $bltotal = "Rp. - " . number_format($total, 0, ',', '.');
              ?>

              <tr class="tr-total">
                <td colspan="6" class="bltotal">TOTAL NOMINAL BELUM LUNAS</td>
                <td colspan="2" class="nml-bltotal"><?= $bltotal ?>
                </td>
              </tr>

            </table>
          <?php
          }
          ?>


        <?php
      }
        ?>
    </div>

  <?php
} else {
  echo "<script>alert('Anda Tidak Memiliki Akses Untuk Menu Ini');location.href='../dashboard/dashboard.php';</script>";
}
  ?>
  </body>

  </html>