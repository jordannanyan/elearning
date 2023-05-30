<div class="container">
  <div class="justify-content-center d-flex">
    <h4 class=" fw-semibold mb-4 text-center">
      Video Anda
    </h4>
  </div>
  <div class="col-12 mb-5">
    <?php
    $limit = 3; // Number of records per page
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number
    
    // Calculate the offset for the SQL query
    $offset = ($currentPage - 1) * $limit;

    $id = $_SESSION['id'];
    $countQuery = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tb_kelas WHERE id_pengajar='$id'");
    $countResult = mysqli_fetch_assoc($countQuery);
    $totalRecords = $countResult['total'];

    $totalPages = ceil($totalRecords / $limit); // Total number of pages
    
    $query = mysqli_query($koneksi, "SELECT * FROM tb_kelas WHERE id_pengajar='$id' LIMIT $limit OFFSET $offset");
    $no = ($currentPage - 1) * $limit + 1;
    $nomor = 1;


    while ($view = mysqli_fetch_array($query)) {
      ?>
      <div class="embed-responsive embed-responsive-16by9 mb-5">
        <video id="video<?php echo $nomor ?>" class="myVideo embed-responsive">

          <source src="../../<?php echo $view['video'] ?>" type="video/mp4" />
        </video>
        <button onclick="playVideo('video<?php echo $nomor ?>')" class="btn btn-primary">
          <span class="bi-play-fill">Play</span>
        </button>
        <button onclick="pauseVideo('video<?php echo $nomor ?>')" class="btn btn-primary">
          <span class="bi-pause-fill">Pause</span>
        </button>
        <button onclick="stopVideo('video<?php echo $nomor ?>')" class="btn btn-primary">
          <span class="bi-stop-fill">Stop</span>
        </button>
        <button onclick="rewind('video<?php echo $nomor ?>', 10)" class="btn btn-primary">
          <span class="bi bi-skip-backward-fill"></span>
        </button>
        <button onclick="fastForward('video<?php echo $nomor ?>', 10)" class="btn btn-primary">
          <span class="bi bi-skip-forward-fill"></span>
        </button>
        <div class="text-center mt-3">
          <h4>
            <?php echo $view['judul'] ?>
          </h4>
          <p>
            <?php echo $_SESSION['nama'] ?>
          </p>
          <p>
            <?php echo $view['durasi'] ?>
          </p>
        </div>
      </div>
      <?php
      $no++;
      $nomor++;
    }
    ?>
    <nav aria-label="Page navigation">
      <ul class="pagination justify-content-center mt-4">
        <?php
        if ($totalPages > 1) {
          if ($currentPage > 1) {
            ?>
            <li class="page-item">
              <a class="page-link" href="?h=video&page=<?php echo $currentPage - 1; ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <?php
          }

          for ($i = 1; $i <= $totalPages; $i++) {
            ?>
            <li class="page-item <?php echo ($i == $currentPage) ? 'active' : ''; ?>">
              <a class="page-link" href="?h=video&page=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
            <?php
          }

          if ($currentPage < $totalPages) {
            ?>
            <li class="page-item">
              <a class="page-link" href="?h=video&page=<?php echo $currentPage + 1; ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
            <?php
          }
        }
        ?>
      </ul>
    </nav>
  </div>
</div>