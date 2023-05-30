<div class="container">
  <div class="justify-content-center d-flex">
    <h4 class=" fw-semibold mb-4 text-center">
      Video Kelas Anda
    </h4>
  </div>
  <div class="col-12 mb-5">
    <?php
    $result = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tb_kelas_pelajar WHERE id_pelajar = '{$_SESSION['id']}'");
    $row = mysqli_fetch_assoc($result);
    $totalRows = $row['total'];
    $limit = 5;
    $totalPages = ceil($totalRows / $limit);

    if (isset($_GET['page'])) {
      $currentPage = $_GET['page'];
    } else {
      $currentPage = 1;
    }

    $offset = ($currentPage - 1) * $limit;

    $query = mysqli_query($koneksi, "CALL sp_get_student_classes('{$_SESSION['id']}', $offset, $limit)");
    $no = $offset + 1;
    $nomor = 1;


    while ($kelas = mysqli_fetch_array($query)) {
      ?>
      <div class="embed-responsive embed-responsive-16by9 mb-5">
        <video id="video<?php echo $nomor ?>" class="myVideo embed-responsive">

          <source src="../../<?php echo $kelas['video'] ?>" type="video/mp4" />
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
            <?php echo $kelas['class_title'] ?>
          </h4>
          <p>
            <?php echo $kelas['teacher_name'] ?>
          </p>
          <p>
            <?php echo $kelas['durasi'] ?>
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