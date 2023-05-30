<?php
$id = $_SESSION['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tb_pengajar WHERE id='$id'");
$view = mysqli_fetch_array($query);
?>
<header class="app-header">
  <nav class="navbar navbar-expand-lg navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item d-block d-xl-none">
        <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
          <i class="ti ti-menu-2"></i>
        </a>
      </li>
    </ul>
    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
      <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
        <li class="nav-item">
          <div class="mb-0 fs-3"><?php echo $view['nama']?></div>
          <div class="text-muted">(Pengajar)</div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
            aria-expanded="false">
            <?php $foto = $view['foto']?>
            <img src="../../<?php echo $foto;?>" alt="" width="35" height="35" class="rounded-circle" />
          </a>
          <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
            <div class="message-body">
              <a href="index.php?h=akun" class="d-flex align-items-center gap-2 dropdown-item">
                <i class="ti ti-user fs-6"></i>
                <p class="mb-0 fs-3">Akun Saya</p>
              </a>
            </div>
          </div>
        </li>
      </ul>
    </div>

  </nav>
</header>