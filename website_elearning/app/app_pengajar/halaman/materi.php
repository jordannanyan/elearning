<?php

$limit = 5; // Number of records per page
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
?>
<div class="col-lg-12 d-flex align-items-stretch">
  <div class="card w-100">
    <div class="card-body p-4">
      <h5 class="card-title fw-semibold mb-4">
        Kelas Anda
      </h5>
      <div class="table-responsive">
        <table class="table text-nowrap mb-0 align-middle">
          <thead class="text-dark fs-4">
            <tr>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">No</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Judul</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Jurusan</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Durasi</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Tanggal</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Deskripsi</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Aksi</h6>
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($view = mysqli_fetch_array($query)) {
              ?>
              <tr>
                <td width='5%' class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">
                    <?php echo $no ?>
                  </h6>
                </td>
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-1">
                    <?php echo $view['judul'] ?>
                  </h6>
                </td>
                <td class="border-bottom-0">
                  <p class="mb-0 fw-normal">
                    <?php echo $view['jurusan'] ?>
                  </p>
                </td>
                <td class="border-bottom-0">
                  <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-primary rounded-3 fw-semibold">
                      <?php echo $view['durasi'] ?>
                    </span>
                  </div>
                </td>
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-0 fs-4">
                    <?php echo $view['tanggal'] ?>
                  </h6>
                </td>
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-0 fs-4">
                    <?php echo $view['deskripsi'] ?>
                  </h6>
                </td>
                <td class="border-bottom-0">
                  <button class="btn btn-primary">
                    <a href='proses/download_materi_kelas.php?id=<?php echo $view['id'] ?>'
                      style="color: white">Download Materi</a>
                  </button>
                </td>
              </tr>
              <?php
              $no++;
            }
            ?>
          </tbody>
        </table>
        <nav aria-label="Page navigation">
          <ul class="pagination justify-content-center mt-4">
            <?php
            if ($totalPages > 1) {
              if ($currentPage > 1) {
                ?>
                <li class="page-item">
                  <a class="page-link" href="?h=materi&page=<?php echo $currentPage - 1; ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <?php
              }

              for ($i = 1; $i <= $totalPages; $i++) {
                ?>
                <li class="page-item <?php echo ($i == $currentPage) ? 'active' : ''; ?>">
                  <a class="page-link" href="?h=materi&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
                <?php
              }

              if ($currentPage < $totalPages) {
                ?>
                <li class="page-item">
                  <a class="page-link" href="?h=materi&page=<?php echo $currentPage + 1; ?>" aria-label="Next">
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
  </div>
</div>




