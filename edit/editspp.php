<?php

session_start();
if ($_SESSION['tingkat'] == 'admin') {

include('../koneksi.php');

$angkatan = $_GET['angkatan'];

$query = "SELECT * From tb_spp WHERE angkatan='$angkatan'";

$hasil = mysqli_query($koneksi, $query);

while($data = mysqli_fetch_assoc($hasil)){
    

?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="../css/edit_spp.css">
    <title>Edit Data SPP</title>
  </head>
  <body>
    <div class="insert-data-container">
      <h1>Edit Data</h1>
      <hr>
      <form action="proses_editspp.php" method="post">
      <table>
        <tr>
          <td><label for="angkatan">angkatan :</label></td>
          <td><input type="text" id="angkatan" readonly name="angkatan" value="<?php echo $data['angkatan'];?>"></td>
        </tr>
        <tr>
          <td><label for="nominal">nominal :</label></td>
          <td><input type="number" id="nominal" name="nominal" value="<?php echo $data['nominal'];?>"></td>
        </tr>
        <tr>
          <td colspan="2">
            <button type="submit">Edit Data</button>
          </td>
        </tr>
      </table>
      </form>
      <a href="../view/viewspp.php"><button type="submit">Back</button></a>
    </div>
    <?Php
      }

    } else {
      echo "<script>alert('Anda Tidak Memiliki Akses Untuk Menu Ini');location.href='../dashboard/dashboard.php';</script>";
    }
    ?>
  </body>
</html>




<!-- <input type="text" id="tingkat" name="tingkat"value="<?php echo $data['tingkat'];?>"> -->