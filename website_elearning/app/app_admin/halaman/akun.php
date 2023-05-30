<?php
$id = $_SESSION['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE id='$id'");
$view = mysqli_fetch_array($query);
?>

<div class="container">
    <div class="justify-content-center">
        <h1 class="mb-4">Tambah Akun Pelajar</h1>
    </div>
    <form action="proses/edit_akun.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama*:</label>
            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $view['id'] ?>">
            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $view['nama'] ?>" required>
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">Username*:</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo $view['username'] ?>"
                required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password*:</label>
            <input type="password" class="form-control" id="password" name="password"
                value="<?php echo $view['password'] ?>" required>
        </div>

        <button class="btn btn-warning"><a href='index.php' style="color: white">Kembali</a></button>
        <button type="submit" class="btn btn-primary">Simpan</button>

    </form>
</div>