<?php
session_start();
if ($_SESSION['tingkat'] == 'admin') {

  include('../koneksi.php');

  $kelas = $_GET['kelas'];

  $query = "SELECT * From tb_kelas WHERE kelas='$kelas'";

  $hasil = mysqli_query($koneksi, $query);

  while ($data = mysqli_fetch_assoc($hasil)) {


?>

    <!DOCTYPE html>
    <html>

    <head>
      <link rel="stylesheet" type="text/css" href="../css/edit_kelas.css">
      <title>Edit Data Kelas</title>
    </head>

    <body>
      <div class="insert-data-container">
        <h1>Edit Data</h1>
        <hr>
        <form action="proses_editkelas.php" method="post">
          <table>
            <tr>
              <td><label for="kelas">Kelas :</label></td>
              <td><input type="text" id="kelas" name="kelas" value="<?php echo $data['kelas']; ?>"></td>
            </tr>
            <tr>
              <td><label for="keterangan">Keterangan :</label></td>
              <td><input type="text" id="keterangan" name="keterangan" value="<?php echo $data['status']; ?>"></td>
            </tr>
            <tr>
              <td colspan="2">
                <button type="submit">Edit Data</button>
              </td>
            </tr>
          </table>
        </form>
        <a href="../view/viewkelas.php"><button type="submit">Back</button></a>
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