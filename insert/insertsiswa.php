<?php
session_start();
if ($_SESSION['tingkat'] == 'admin') {
?>
  <!DOCTYPE html>
  <html>

  <head>
    <link rel="stylesheet" type="text/css" href="../css/insert_siswa.css">
    <title>Insert Data Page</title>
  </head>

  <body>
    <div class="insert-data-container">
      <h1>Insert Data</h1>
      <hr>
      <form action="proses_insertsiswa.php" method="post">
        <table>
          <tr>
            <td><label for="nis">Nis :</label></td>
            <td><input type="text" id="nis" name="nis" maxlength="4"></td>
          </tr>
          <tr>
            <td><label for="namasiswa">Nama Siswa :</label></td>
            <td><input type="text" id="namasiswa" name="namasiswa"></td>
          </tr>
          <tr>
            <td><label for="kelas">Kelas :</label></td>
            <td><select name="kelas" id="kelas">
                <?php
                include "../koneksi.php";
                $querykelas = mysqli_query($koneksi, "SELECT * FROM tb_kelas");
                while ($data_kelas = mysqli_fetch_assoc($querykelas)) { ?>
                  <option value="<?= $data_kelas['kelas'] ?>"><?= $data_kelas['kelas'] ?></option>
                <?php
                }
                ?>
              </select></td>
          </tr>
          <tr>
            <td><label for="angkatan">Angkatan :</label></td>
            <td><select name="angkatan" id="angkatan">
                <?php
                include "../koneksi.php";
                $queryangkatan = mysqli_query($koneksi, "SELECT * FROM tb_spp");
                while ($data_angkatan = mysqli_fetch_assoc($queryangkatan)) { ?>
                  <option value="<?= $data_angkatan['angkatan'] ?>"><?= $data_angkatan['angkatan'] ?></option>
                <?php
                }
                ?>
              </select></td>
          </tr>
          <tr>
            <td><label for="alamat">Alamat :</label></td>
            <td><input type="text" id="alamat" name="alamat"></td>
          </tr>
          <tr>
            <td><label for="notelp">No Telp :</label></td>
            <td><input type="text" id="notelp" name="notelp" maxlength="12"></td>
          </tr>
          <tr>
            <td colspan="2">
              <button type="submit">Submit</button>
            </td>
          </tr>
        </table>
      </form>
      <a href="../view/viewsiswa.php"><button type="submit">Back</button></a>
    </div>
  <?php
} else {
  echo "<script>alert('Anda Tidak Memiliki Akses Untuk Menu Ini');location.href='../dashboard/dashboard.php';</script>";
}
  ?>
  </body>

  </html>