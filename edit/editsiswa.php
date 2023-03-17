<?php

session_start();
if ($_SESSION['tingkat'] == 'admin') {

  include('../koneksi.php');

  $nis = $_GET['nis'];

  $query = "SELECT * From tb_siswa WHERE nis='$nis'";

  $hasil = mysqli_query($koneksi, $query);

  while ($data = mysqli_fetch_assoc($hasil)) {


?>

    <!DOCTYPE html>
    <html>

    <head>
      <link rel="stylesheet" type="text/css" href="../css/edit_siswa.css">
      <title>Insert Data Page</title>
    </head>

    <body>
      <div class="insert-data-container">
        <h1>Edit Data</h1>
        <hr>
        <form action="proses_editsiswa.php" method="post">
          <table>
            <tr>
              <td><label for="nis">Nis :</label></td>
              <td><input type="text" id="nis" name="nis" readonly value="<?php echo $data['nis']; ?>"></td>
            </tr>
            <tr>
              <td><label for="password">Password :</label></td>
              <td><input type="text" id="password" name="password" value="<?php echo $data['password']; ?>"></td>
            </tr>
            <tr>
              <td><label for="namasiswa">Nama Siswa :</label></td>
              <td><input type="text" id="namasiswa" name="namasiswa" value="<?php echo $data['namasiswa']; ?>"></td>
            </tr>
            <tr>
              <td><label for="kelas">Kelas :</label></td>
              <td><select name="kelas" id="kelas">
                  <option <?php if ($data['kelas'] == 'X RPL 1') {
                            echo "selected";
                          } ?> value="X RPL 1">X RPL 1</option>
                  <option <?php if ($data['kelas'] == 'XI RPL 1') {
                            echo "selected";
                          } ?> value="XI RPL 1">XI RPL 1</option>
                  <option <?php if ($data['kelas'] == 'XII RPL 1') {
                            echo "selected";
                          } ?> value="XII RPL 1">XII RPL 1</option>
                </select></td>
            </tr>
            <tr>
              <td><label for="angkatan">Angkatan :</label></td>
              <td><select name="angkatan" id="angkatan">
                  <option <?php if ($data['angkatan'] == '2023') {
                            echo "selected";
                          } ?> value="2023">2023</option>
                  <option <?php if ($data['angkatan'] == '2024') {
                            echo "selected";
                          } ?> value="2024">2024</option>
                  <option <?php if ($data['angkatan'] == '2025') {
                            echo "selected";
                          } ?> value="2025">2025</option>
                  <option <?php if ($data['angkatan'] == '2026') {
                            echo "selected";
                          } ?> value="2026">2026</option>
                  <option <?php if ($data['angkatan'] == '2026') {
                            echo "selected";
                          } ?> value="2026">2026</option>
                </select></td>
            </tr>
            <tr>
              <td><label for="alamat">Alamat :</label></td>
              <td><input type="text" id="alamat" name="alamat" value="<?php echo $data['alamat']; ?>"></td>
            </tr>
            <tr>
              <td><label for="notelp">No Telp :</label></td>
              <td><input type="text" id="notelp" name="notelp" value="<?php echo $data['notelp']; ?>"></td>
            </tr>
            <tr>
              <td colspan="2">
                <button type="submit">Edit Data</button>
              </td>
            </tr>
          </table>
        </form>
        <a href="../view/viewsiswa.php"><button type="submit">Back</button></a>
      </div>
  <?Php
  }
} else {
  echo "<script>alert('Anda Tidak Memiliki Akses Untuk Menu Ini');location.href='../dashboard/dashboard.php';</script>";
}
  ?>
    </body>

    </html>




    <!-- <input type="text" id="tingkat" name="tingkat"value="<?php echo $data['tingkat']; ?>"> -->