<?php
session_start();
if ($_SESSION['tingkat'] == 'admin') {

?>
  <!DOCTYPE html>
  <html>

  <head>
    <link rel="stylesheet" type="text/css" href="../css/insert_kelas.css">
    <title>Insert Data Page</title>
  </head>

  <body>
    <div class="insert-data-container">
      <h1>Insert Data</h1>
      <hr>
      <form action="proses_insertkelas.php" method="post">
        <table>
          <tr>
            <td><label for="kelas">Kelas :</label></td>
            <td><input type="text" id="kelas" name="kelas"></td>
          </tr>
          <tr>
            <td><label for="keterangan">Keterangan :</label></td>
            <td><input type="text" id="keterangan" name="keterangan"></td>
          </tr>
          <tr>
            <td colspan="2">
              <button type="submit">Submit</button>
            </td>
          </tr>
        </table>
      </form>
      <a href="../view/viewkelas.php"><button type="submit">Back</button></a>
    </div>
  <?php
} else {
  echo "<script>alert('Anda Tidak Memiliki Akses Untuk Menu Ini');location.href='../dashboard/dashboard.php';</script>";
}
  ?>
  </body>

  </html>