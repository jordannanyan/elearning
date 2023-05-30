<div class="container">
  <div class="justify-content-center">
    <h1 class="mb-4">Masukan Data Pelajar</h1>
  </div>
  <form action="proses/input_akun_pelajar.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="nama" class="form-label">Nama*:</label>
      <input type="text" class="form-control" id="nama" name="nama" required>
    </div>

    <div class="mb-3">
      <label for="asals" class="form-label">Asal Sekolah*:</label>
      <input type="text" class="form-control" id="asals" name="asals" required>
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
      <label for="username" class="form-label">Username*:</label>
      <input type="text" class="form-control" id="username" name="username" required>
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password*:</label>
      <input type="password" class="form-control" id="password" name="password" required>
    </div>

    <div class="mb-3">
      <label for="profile-pic" class="form-label">Foto Profil*:</label>
      <input type="file" class="form-control" id="profile-pic" name="profile-pic">
    </div>

    <button type="submit" class="btn btn-primary">Tambahkan</button>
  </form>
</div>