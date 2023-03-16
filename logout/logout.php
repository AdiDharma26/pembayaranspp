<?php
session_start();
if (!isset($_SESSION['username'])) {
  echo "<script>alert('Silahkan Login terlebih dahulu'); window.location='../login/login.php';</script>";
}
?>
  <!DOCTYPE html>
  <html>

  <head>
    <link rel="stylesheet" type="text/css" href="../css/logout.css">
    <title>Logout Page</title>
  </head>

  <body>
    <div class="logout-container">
      <h1>Logout</h1>
      <hr>
      <p>Apakah Anda Yakin Untuk log out?</p>
      <form action="../logout/proses_logout.php" method="post">
        <button type="submit">ya</button>
      </form>

      <form action="../dashboard/dashboard.php" method="post">
        <button type="submit">Tidak</button>
      </form>
    </div>

  </body>

  </html>