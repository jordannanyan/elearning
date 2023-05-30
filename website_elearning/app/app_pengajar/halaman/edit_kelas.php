<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tb_kelas WHERE id='$id'");
$view = mysqli_fetch_array($query);
?>

<div class="container">
    <div class="justify-content-center">
        <h1 class="mb-4">Tambah Kelas Anda</h1>
    </div>
    <form action="proses/proses_edit_kelas.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="judul" class="form-label">Judul*:</label>
            <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $view['judul'] ?>" required>
            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $view['id'] ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jurusan*:</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jurusan" id="mipa" value="mipa" required>
                <label class="form-check-label" for="male">MIPA</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jurusan" id="bahasa" value="bahasa" required>
                <label class="form-check-label" for="female">Bahasa</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jurusan" id="ips" value="ips" required>
                <label class="form-check-label" for="female">IPS</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="durasi" class="form-label">Durasi*:</label>
            <input type="text" class="form-control" id="durasi" name="durasi" value="<?php echo $view['durasi'] ?>" required>
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal*:</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $view['tanggal'] ?>" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi*:</label>
            <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?php echo $view['deskripsi'] ?>" required>
        </div>

        <div class="mb-3">
            <label for="video" class="form-label">Video*:</label>
            <input type="file" class="form-control" id="video" name="video" required>
            <input type="hidden" class="form-control" id="video_old" name="video_old" value="<?php echo $view['video'] ?>" required>
        </div>

        <div class="mb-3">
            <label for="pdf" class="form-label">Materi PDF*:</label>
            <input type="hidden" class="form-control" id="pdf_old" name="pdf_old" value="<?php echo $view['materi'] ?>" required>
            <input type="file" class="form-control" id="pdf" name="pdf" required>
        </div>

        <button class="btn btn-warning"><a href='index.php' style="color: white">Kembali</a></button>
        <button type="submit" class="btn btn-primary">Simpan</button>

    </form>
</div>