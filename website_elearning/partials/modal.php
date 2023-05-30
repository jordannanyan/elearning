<div class="modal fade" id="loginPelajar" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="loginModalLabel">Login Pelajar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Login form -->
                <form action="config/autentikasi.php?l=1" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="username" name="username" class="form-control" id="username" aria-describedby="usernameHelp">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="mt-3">
                        <p class="text-center">Tidak punya akun? <a href="index.php?h=signin_pelajar">Sign Up</a></p>
                    </div>
                    <button type="submit" class="btn btn-primary float-end">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="loginPengajar" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login Pengajar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Login form -->
                <form action="config/autentikasi.php?l=2" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="username" name="username" class="form-control" id="username" aria-describedby="usernameHelp">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="mt-3">
                        <p class="text-center">Tidak punya akun? <a href="index.php?h=signin_pengajar">Sign Up</a></p>
                    </div>
                    <button type="submit" class="btn btn-primary float-end">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="loginAdmin" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login Admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Login form -->
                <form action="config/autentikasi.php?l=3" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="username" name="username" class="form-control" id="username" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <button type="submit" class="btn btn-primary float-end">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_GET['error'])) {
    $x = $_GET['error'];

    if ($x == 2) {
        ?>
        <div class='modal fade' id='Error1' tabindex='-1' aria-labelledby='ErrorModal' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <a class='modal-title btn btn-danger' id='loginModalLabel'>Login Gagal</a>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body'>
                        <p>Username Atau Password Salah</p>
                    </div>
                </div>
            </div>
        </div>
        <script>
            window.addEventListener('DOMContentLoaded', function () {
                var myModal = new bootstrap.Modal(document.getElementById('Error1'));
                myModal.show();
            });
        </script>
        <?php
    } else if ($x == 1) {
        ?>
            <div class='modal fade' id='Error2' tabindex='-1' aria-labelledby='ErrorModal' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <a class='modal-title btn btn-warning' id='loginModalLabel'>Login Gagal</a>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>
                            <p>Username Atau Password Kosong</p>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                window.addEventListener('DOMContentLoaded', function () {
                    var myModal = new bootstrap.Modal(document.getElementById('Error2'));
                    myModal.show();
                });
            </script>
        <?php
    }
}
?>