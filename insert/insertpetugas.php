<?php
if ($_SESSION['tingkat'] == 'admin') {
  session_start();
?>
  <!DOCTYPE html>
  <html>

  <head>
    <link rel="stylesheet" type="text/css" href="../css/insert_petugas.css">
    <title>Insert Data Page</title>
  </head>

  <body>
    <div class="insert-data-container">
      <h1>Insert Data</h1>
      <hr>
      <form action="proses_insertpetugas.php" method="post">
        <table>
          <tr>
            <td><label for="username">Username :</label></td>
            <td><input type="text" id="username" name="username"></td>
          </tr>
          <tr>
            <td><label for="Password">Password :</label></td>
            <td><input type="text" id="password" name="password"></td>
          </tr>
          <tr>
            <td><label for="namapetugas">Nama Petugas :</label></td>
            <td><input type="text" id="namapetugas" name="namapetugas"></td>
          </tr>
          <tr>
            <td><label for="tingkat">Tingkat :</label></td>
            <td><select name="tingkat" id="tingkat">
                <option value="" hidden>Pilih Tingkat</option>
                <option value="admin">admin</option>
                <option value="petugas">petugas</option>
              </select></td>
          </tr>
          <tr>
            <td colspan="2">
              <button type="submit">Submit</button>
            </td>
          </tr>
        </table>
      </form>
      <a href="../view/viewpetugas.php"><button type="submit">Back</button></a>
    </div>
  <?php
} else {
  echo "<script>alert('Anda Tidak Memiliki Akses Untuk Menu Ini');location.href='../dashboard/dashboard.php';</script>";
}
  ?>
  </body>

  </html>