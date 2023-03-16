<?php
session_start();
$_SESSION ['view'] = 'siswa';
if ($_SESSION['tingkat'] == 'admin') {

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/siswa.css">  
  <title>Data Siswa</title>
</head>
<body>

  <?php include '../sidebar/sidebar.php';?>
  
  <div class="judul"> 
   <h1>Data Siswa</h1>
    <hr>
    </div> 

  <div class="container">
    <table border ="0">
    <a href="../insert/insertsiswa.php"><button type="submit">Tambah</button></a>
      <thead>
        <tr>
          <th>NIS</th>
          <th>PASSWORD</th>
          <th>NAMA SISWA</th>
          <th>KELAS</th>
          <th>ANGKATAN</th>
          <th>ALAMAT</th>
          <th>NO TELP</th>
          <th>AKSI</th>
        </tr>
      </thead>
      <tbody>
      <?php 
            include('../koneksi.php');
            $query = "SELECT * FROM tb_siswa";
            $hasil = mysqli_query($koneksi, $query);

            while($row = mysqli_fetch_assoc($hasil)){
            ?>
          <tr>
            <td><?php echo $row ['nis']?></td>
            <td><?php echo $row ['password']?></td>
            <td><?php echo $row ['namasiswa']?></td>
            <td><?php echo $row ['kelas']?></td>
            <td><?php echo $row ['angkatan']?></td>
            <td><?php echo $row ['alamat']?></td>
            <td><?php echo $row ['notelp']?></td>
            <td> 
              <a href="../edit/editsiswa.php?nis=<?= $row['nis']?>"><button type="submit">Edit</button></a>
              <a href="../delete/deletesiswa.php?nis=<?= $row['nis']?>"><button type="submit" onclick="return confirm('Yakin Ingin Menghapus Data Ini?')">Delete</button></a>
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