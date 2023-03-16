<?php
session_start();
$_SESSION ['view'] = 'spp';
if ($_SESSION['tingkat'] == 'admin') {

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/spp.css">  
  <title>Data SPP</title>
</head>
<body>

  <?php include '../sidebar/sidebar.php';?>
  
  <div class="judul"> 
   <h1>Data SPP</h1>
    <hr>
    </div> 

  <div class="container">
    <table border ="0">
    <a href="../insert/insertspp.php"><button type="submit">Tambah</button></a>
      <thead>
        <tr>
          <th>ANGKATAN</th>
          <th>NOMINAL</th>
          <th>AKSI</th>
        </tr>
      </thead>
      <tbody>

      <?php 
            include('../koneksi.php');
            $query = "SELECT * FROM tb_spp";
            $hasil = mysqli_query($koneksi, $query);

            while($row = mysqli_fetch_assoc($hasil)){
            ?>

          <tr>
            <td><?php echo $row ['angkatan']?></td>
            <td><?php echo number_format($row ['nominal'], 0, ',','.')?></td>
            <td> 
              <a href="../edit/editspp.php?angkatan=<?= $row['angkatan']?>"><button type="submit">Edit</button></a>
              <a href="../delete/deletespp.php?angkatan=<?= $row['angkatan']?>"><button type="submit" onclick="return confirm('Yakin Ingin Delete Data Ini?')">Delete</button></a>
            </td>
          </tr>

          <?php
            }
          ?>

      </tbody>
    </table> 
  </div>
  <?php
} else {
  echo "<script>alert('Anda Tidak Memiliki Akses Untuk Menu Ini');location.href='../dashboard/dashboard.php';</script>";
}
?>
</body>
</html>