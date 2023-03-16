<?php

if ($_SESSION['tingkat'] == 'admin') {

$nis = $_POST['nis'];
$password = $_POST['password'];
$namasiswa = $_POST['namasiswa'];
$kelas = $_POST['kelas'];
$angkatan = $_POST['angkatan'];
$alamat = $_POST['alamat'];
$notelp = $_POST['notelp'];

$query = "UPDATE tb_siswa set nis='$nis', namasiswa='$namasiswa', password='$password', 
kelas='$kelas', angkatan='$angkatan', alamat='$alamat', notelp='$notelp' where nis='$nis'";


include ('../koneksi.php');
$hasil = mysqli_query($koneksi, $query);

if(!$hasil) {
    die("Gagal Memasukan Data Siswa " . mysqli_query($koneksi, $query));
}

else{
    echo "<script>
        alert('Data Berhasil di Update')
        document.location.href='../view/viewsiswa.php';
        </script>
        ";
}
} else {
    echo "<script>alert('Anda Tidak Memiliki Akses Untuk Menu Ini');location.href='../dashboard/dashboard.php';</script>";
}
?>