<?php
session_start();
if ($_SESSION['tingkat'] == 'admin') {

?>

  <!DOCTYPE html>
  <html>

  <head>
    <link rel="stylesheet" type="text/css" href="../css/insert_spp.css">
    <title>Insert Data Spp</title>
  </head>

  <body>
    <div class="insert-data-container">
      <h1>Insert Data</h1>
      <hr>
      <form action="proses_insertspp.php" method="post">
        <table>
          <tr>
            <td><label for="angkatan">Angkatan :</label></td>
            <td><input type="text" id="angkatan" name="angkatan"></td>
          </tr>
          <tr>
            <td><label for="nominal">Nominal :</label></td>
            <td><input type="text" id="nominal" name="nominal"></td>
          </tr>
          <tr>
            <td colspan="2">
              <button type="submit">Submit</button>
            </td>
          </tr>
        </table>
      </form>
      <a href="../view/viewspp.php"><button type="submit">Back</button></a>
    </div>
  <?php
} else {
  echo "<script>alert('Anda Tidak Memiliki Akses Untuk Menu Ini');location.href='../dashboard/dashboard.php';</script>";
}
  ?>
  </body>

  </html>