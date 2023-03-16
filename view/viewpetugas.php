<?php
session_start();
$_SESSION ['view'] = 'petugas';
if ($_SESSION['tingkat'] == 'admin') {

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/petugas.css">  
  <title>Data Petugas</title>
</head>
<body>
  

  <?php include '../sidebar/sidebar.php';?>
  
  <div class="judul"> 
   <h1>Data Petugas</h1>
    <hr>
    </div> 

  <div class="container">
    <table border ="0">
    <a href="../insert/insertpetugas.php"><button type="submit">Tambah</button></a>   
      <thead>
        <tr>
          <th>ID</th>
          <th>USERNAME</th>
          <th>PASSWORD</th>
          <th>NAMA PETUGAS</th>
          <th>TINGKAT</th>
          <th>AKSI</th>
        </tr>
      </thead>
      <tbody>
      <?php 
            include('../koneksi.php');
            $query = "SELECT * FROM tb_petugas";
            $hasil = mysqli_query($koneksi, $query);

            while($row = mysqli_fetch_assoc($hasil)){
            ?>

          <tr>
            <td><?php echo $row ['id']?></td>
            <td><?php echo $row ['username']?></td>
            <td><?php echo $row ['password']?></td>
            <td><?php echo $row ['namapetugas']?></td>
            <td><?php echo $row ['tingkat']?></td>
            <td>
              <a href="../edit/editpetugas.php?id=<?= $row['id']?>"><button type="submit">Edit</button></a>
              <a href="../delete/deletepetugas.php?id=<?= $row ['id']?>"><button type="submit" onclick="return confirm('Ingin Delete Data Ini?')">Delete</button></a>
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