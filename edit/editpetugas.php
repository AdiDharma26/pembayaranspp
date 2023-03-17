<?php
session_start();
if ($_SESSION['tingkat'] == 'admin') {

  include('../koneksi.php');

  $id = $_GET['id'];

  $query = "SELECT * From tb_petugas WHERE id='$id'";

  $hasil = mysqli_query($koneksi, $query);

  while ($data = mysqli_fetch_assoc($hasil)) {


?>

    <!DOCTYPE html>
    <html>

    <head>
      <link rel="stylesheet" type="text/css" href="../css/edit_petugas.css">
      <title>Insert Data Page</title>
    </head>

    <body>
      <div class="insert-data-container">
        <h1>Edit Data</h1>
        <hr>
        <form action="proses_editpetugas.php" method="post">
          <table>
            <tr>
              <td><label for="id">Id :</label></td>
              <td><input type="text" id="id" name="id" value="<?php echo $data['id']; ?>"></td>
            </tr>
            <tr>
              <td><label for="username">Username :</label></td>
              <td><input type="text" id="username" name="username" value="<?php echo $data['username']; ?>"></td>
            </tr>
            <tr>
              <td><label for="password">password :</label></td>
              <td><input type="text" id="password" name="password" value="<?php echo $data['password']; ?>"></td>
            </tr>
            <tr>
              <td><label for="namapetugas">Nama Petugas :</label></td>
              <td><input type="text" id="namapatugas" name="namapetugas" value="<?php echo $data['namapetugas']; ?>"></td>
            </tr>
            <tr>
              <td><label for="tingkat">Tingkat :</label></td>
              <td><select name="tingkat" id="tingkat">
                  <option <?php if ($data['tingkat'] == 'admin') {
                            echo "selected";
                          } ?> value="admin">admin</option>
                  <option <?php if ($data['tingkat'] == 'petugas') {
                            echo "selected";
                          } ?> value="petugas">petugas</option>
                </select></td>
            </tr>
            <tr>
              <td colspan="2">
                <button type="submit">Edit Data</button>
              </td>
            </tr>
          </table>
        </form>
        <a href="../view/viewpetugas.php"><button type="submit">Back</button></a>
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