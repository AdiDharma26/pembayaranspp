<?php
session_start();
$_SESSION ['view'] = 'kelas';
if ($_SESSION['tingkat'] == 'admin') {
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/kelas.css">
  <title>Data Kelas</title>
</head>

<body>

  <?php include '../sidebar/sidebar.php'; ?>

  <div class="judul">
    <h1>Data Kelas</h1>
    <hr>
  </div>

  <div class="container">
    <table border="0">
      <a href="../insert/insertkelas.php"><button type="submit">Tambah</button></a>
      <thead>
        <tr>
          <th>KELAS</th>
          <th>STATUS</th>
          <th>AKSI</th>
        </tr>
      </thead>
      <tbody>
      <?php 
            include('../koneksi.php');
            $query = "SELECT * FROM tb_kelas";
            $hasil = mysqli_query($koneksi, $query);

            while($row = mysqli_fetch_assoc($hasil)){
            ?>

      <tr>
        <td><?php echo $row ['kelas']?></td>
        <td><?php echo $row ['status']?></td>
        <td>
          <a href="../edit/editkelas.php?kelas=<?= $row['kelas']?>"><button type="submit">Edit</button></a>
          <a href="../delete/deletekelas.php?kelas=<?= $row['kelas']?>"><button type="submit" onclick="return confirm('Yakin Ingin Menghapus Data Ini?')">Delete</button></a>
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