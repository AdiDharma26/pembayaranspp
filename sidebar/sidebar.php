<?php
// session_start();
include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/sidebar.css">
  <title>#</title>
</head>

<body>
  <div class="navigation active print">
    <ul>

      <?php if (isset($_SESSION['view']) && $_SESSION['view'] == 'dashboard') : ?>
        <li class="list active">
        <?php else : ?>
        <li class="list">
        <?php endif; ?>
        <b></b>
        <b></b>
        <a href="../dashboard/dashboard.php">
          <span class="icon">
            <img src="../icon/bxs-dashboard.svg" alt="">
          </span>
          <span class="title">Dashboard</span>
        </a>
        </li>

        <!-- SIDEBAR ADMIN -->
        <?php if ($_SESSION['tingkat'] == 'admin') { ?>

          <?php if (isset($_SESSION['view']) && $_SESSION['view'] == 'petugas') : ?>
            <li class="list active">
            <?php else : ?>
            <li class="list">
            <?php endif; ?>
            <b></b>
            <b></b>
            <a href="../view/viewpetugas.php">
              <span class="icon">
                <img src="../icon/bxs-user-badge.svg" alt="">
              </span>
              <span class="title">Petugas</span>
            </a>
            </li>

            <?php if (isset($_SESSION['view']) && $_SESSION['view'] == 'siswa') : ?>
              <li class="list active">
              <?php else : ?>
              <li class="list">
              <?php endif; ?>
              <b></b>
              <b></b>
              <a href="../view/viewsiswa.php">
                <span class="icon">
                  <img src="../icon/bxs-user-account.svg" alt="">
                </span>
                <span class="title">Siswa</span>
              </a>
              </li>

              <?php if (isset($_SESSION['view']) && $_SESSION['view'] == 'kelas') : ?>
                <li class="list active">
                <?php else : ?>
                <li class="list">
                <?php endif; ?>
                <b></b>
                <b></b>
                <a href="../view/viewkelas.php">
                  <span class="icon">
                    <img src="../icon/bxs-graduation.svg" alt="">
                  </span>
                  <span class="title">Kelas</span>
                </a>
                </li>

                <?php if (isset($_SESSION['view']) && $_SESSION['view'] == 'spp') : ?>
                  <li class="list active">
                  <?php else : ?>
                  <li class="list">
                  <?php endif; ?>
                  <b></b>
                  <b></b>
                  <a href="../view/viewspp.php">
                    <span class="icon">
                      <img src="../icon/bxs-bank.svg" alt="">
                    </span>
                    <span class="title">SPP</span>
                  </a>
                  </li>

                  <?php if (isset($_SESSION['view']) && $_SESSION['view'] == 'pembayaran') : ?>
                    <li class="list active">
                    <?php else : ?>
                    <li class="list">
                    <?php endif; ?>
                    <b></b>
                    <b></b>
                    <a href="../view/viewpembayaran.php">
                      <span class="icon">
                        <img src="../icon/bxs-wallet-alt.svg" alt="">
                      </span>
                      <span class="title">Pembayaran</span>
                    </a>
                    </li>

                    <?php if (isset($_SESSION['view']) && $_SESSION['view'] == 'riwayat') : ?>
                      <li class="list active">
                      <?php else : ?>
                      <li class="list">
                      <?php endif; ?>
                      <b></b>
                      <b></b>
                      <a href="../view/viewriwayat.php">
                        <span class="icon">
                          <img src="../icon/bxs-book-content.svg" alt="">
                        </span>
                        <span class="title">Riwayat</span>
                      </a>
                      </li>

                  <?php if (isset($_SESSION['view']) && $_SESSION['view'] == 'laporan') : ?>
                    <li class="list active">
                    <?php else : ?>
                    <li class="list">
                    <?php endif; ?>
                    <b></b>
                    <b></b>
                    <a href="../view/viewlaporan.php">
                      <span class="icon">
                        <img src="../icon/bxs-bookmark-alt-minus.svg" alt="">
                      </span>
                      <span class="title">Laporan</span>
                    </a>
                    </li>

                        <li class="list">
                          <b></b>
                          <b></b>
                          <a href="../logout/logout.php">
                            <span class="icon">
                              <img src="../icon/bx-log-out.svg" alt="">
                            </span>
                            <span class="title">Log out</span>
                          </a>
                        </li>


                      <!-- SIDEBAR PETUGAS -->

                      <?php
                    } elseif ($_SESSION['tingkat'] == 'petugas') {
                      ?>
                         <?php if (isset($_SESSION['view']) && $_SESSION['view'] == 'pembayaran') : ?>
                      <li class="list active">
                      <?php else : ?>
                      <li class="list">
                      <?php endif; ?>
                      <b></b>
                      <b></b>
                      <a href="../view/viewpembayaran.php">
                        <span class="icon">
                          <img src="../icon/bxs-wallet-alt.svg" alt="">
                        </span>
                        <span class="title">Pembayaran</span>
                      </a>
                      </li>

                      <?php if (isset($_SESSION['view']) && $_SESSION['view'] == 'riwayat') : ?>
                        <li class="list active">
                        <?php else : ?>
                        <li class="list">
                        <?php endif; ?>
                        <b></b>
                        <b></b>
                        <a href="../view/viewriwayat.php">
                          <span class="icon">
                            <img src="../icon/bxs-book-content.svg" alt="">
                          </span>
                          <span class="title">Riwayat</span>
                        </a>
                        </li>

                        <li class="list" style="margin-top: 330px;">
                          <b></b>
                          <b></b>
                          <a href="../logout/logout.php">
                            <span class="icon">
                              <img src="../icon/bx-log-out.svg" alt="">
                            </span>
                            <span class="title">Log out</span>
                          </a>
                        </li>

                        <!-- SIDEBAR SISWA -->
                        
                      <?php
                    } else {
                      ?>
                        <?php if (isset($_SESSION['view']) && $_SESSION['view'] == 'riwayat') : ?>
                        <li class="list active">
                        <?php else : ?>
                        <li class="list">
                        <?php endif; ?>
                        <b></b>
                        <b></b>
                        <a href="../view/viewriwayat.php">
                          <span class="icon">
                            <img src="../icon/bxs-book-content.svg" alt="">
                          </span>
                          <span class="title">Riwayat</span>
                        </a>
                        </li>

                        <li class="list" style="margin-top: 395px;">
                          <b></b>
                          <b></b>
                          <a href="../logout/logout.php">
                            <span class="icon">
                              <img src="../icon/bx-log-out.svg" alt="">
                            </span>
                            <span class="title">Log out</span>
                          </a>
                        </li>
                      <?php
                    }
                      ?>
    </ul>
  </div>


  <div class="toggle print">
    <img src="../icon/bx-x.svg" class="open">
    <img src="../icon/bx-menu.svg" class="close">
  </div>



  <script>
    let menuToggle = document.querySelector('.toggle');
    let navigation = document.querySelector('.navigation')
    menuToggle.onclick = function() {
      menuToggle.classList.toggle('active');
      navigation.classList.toggle('active');
    }


    let list = document.querySelectorAll('.list');
    for (let i = 0; i < list.length; i++) {
      list[i].onclick = function() {
        let j = 0;
        while (j < list.length) {
          list[j++].className = 'list';
        }
        list[i].className = 'list active';
      }
    }
  </script>
</body>

</html>