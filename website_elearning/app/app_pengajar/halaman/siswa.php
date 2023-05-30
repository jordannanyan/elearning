<div class="col-lg-12 d-flex align-items-stretch">
    <div class="card w-100">
        <div class="card-body p-4">
            <h5 class="card-title fw-semibold mb-4">
                Daftar Siswa Anda
            </h5>
            <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">No</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Judul Kelas</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Pelajar</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Deskripsi</h6>
                            </th>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Tanggal</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Aksi</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tb_kelas WHERE id_pengajar = '{$_SESSION['id']}'");
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

                        $query = mysqli_query($koneksi, "CALL sp_get_students_and_classes('{$_SESSION['id']}', $offset, $limit)");
                        $no = $offset + 1;

                        while ($kelas = mysqli_fetch_array($query)) {
                            ?>
                            <tr>
                                <td width='5%' class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">
                                        <?php echo $no ?>
                                    </h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0 fs-4">
                                        <?php echo $kelas['class_title'] ?>
                                    </h6>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="fw-semibold mb-0 fs-4">
                                        <?php echo $kelas['student_name'] ?>
                                    </p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="fw-semibold mb-0 fs-4">
                                        <?php echo $kelas['deskripsi'] ?>
                                    </p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="fw-semibold mb-0 fs-4">
                                        <?php echo $kelas['tanggal'] ?>
                                    </p>
                                </td>
                                <td class="border-bottom-0">
                                    <button class="btn btn-danger">
                                        <a href='proses/hapus_siswa_kelas.php?id_kelas=<?php echo $kelas['id_kelas'] ?>&id_pelajar=<?php echo $kelas['student_id'] ?>' style="color: white">Keluarkan</a>
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
                                    <a class="page-link" href="?h=siswa&page=<?php echo $currentPage - 1; ?>"
                                        aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <?php
                            }

                            for ($i = 1; $i <= $totalPages; $i++) {
                                ?>
                                <li class="page-item <?php echo ($i == $currentPage) ? 'active' : ''; ?>">
                                    <a class="page-link" href="?h=siswa&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                                <?php
                            }

                            if ($currentPage < $totalPages) {
                                ?>
                                <li class="page-item">
                                    <a class="page-link" href="?h=siswa&page=<?php echo $currentPage + 1; ?>" aria-label="Next">
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