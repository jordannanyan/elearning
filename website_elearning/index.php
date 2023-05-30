<?php
session_start();

if (isset($_SESSION['level'])) {
  if ($_SESSION['level']=='Pelajar') {
    header('Location: ./app/app_pelajar');
  }elseif ($_SESSION['level']=='Pengajar') {
    header('Location: ./app/app_pengajar');
  }elseif ($_SESSION['level']=='Admin') {
    header('Location: ./app/app_admin');
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include_once "partials/head.php";
  ?>
</head>

<body>
  <!-- Spinner Start -->
  <div id="spinner"
    class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>
  <!-- Spinner End -->


  <!-- Navbar Start -->
  <?php
  include_once "partials/navbar.php";
  ?>
  <!-- Navbar End -->

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


  <!-- Footer Start -->
  <?php
  include_once "partials/footer.php";
  ?>
  <!-- Footer End -->

  <!-- Modal Start -->
  <?php
  include_once "partials/modal.php";
  ?>
  <!-- Modal End -->

  <!-- Back to Top -->
  <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

  <!-- JavaScript Libraries -->

  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="js/costum.js"></script>

  <!-- Template Javascript -->
  <script src="js/main.js"></script>
</body>

</html>