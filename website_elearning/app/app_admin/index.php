<?php
  session_start();
  if(!$_SESSION['level']){
    header('Location: ../index.php?session=expired');
  }

  include("../config/configurasi.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
<?php
include_once("partials/head.php")
?>
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <?php
    include_once("partials/sidebar.php");
    ?>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <?php
      include_once("partials/header.php")
      ?>
      <!--  Header End -->

      <div class="container-fluid">
        <?php
        $pages_dir = 'halaman';
        if (!empty($_GET['h'])) {
          $pages = scandir($pages_dir, 0);
          unset($pages[0], $pages[1]);
          $p = $_GET['h'];
          if (in_array($p . '.php', $pages)) {
            include($pages_dir . '/' . $p . '.php');
          } else {
            echo 'Halaman Tidak Ditemukan';
          }

        } else {
          include($pages_dir . '/beranda.php');
        }
        ?>

<?php
    include_once("partials/modal.php");
    ?>

        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">
            Design and Developed by
            <a href="https://adminmart.com/" target="_blank"
              class="pe-1 text-primary text-decoration-underline">AdminMart.com</a>
            Distributed by <a href="https://themewagon.com">ThemeWagon</a>
          </p>
        </div>
      </div>
    </div>
  </div>
  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/sidebarmenu.js"></script>
  <script src="assets/js/app.min.js"></script>
  <script src="assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="assets/js/dashboard.js"></script>
  <script src="assets/js/costum.js"></script>

</body>

</html>