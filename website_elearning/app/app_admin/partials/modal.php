

<?php
if (isset($_GET['error'])) {
    $x = $_GET['error'];

    if ($x == 2) {
        ?>
        <div class='modal fade' id='Error1' tabindex='-1' aria-labelledby='ErrorModal' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <a class='modal-title btn btn-danger' id='loginModalLabel'>Pesan</a>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body'>
                        <p>Data Tidak Bisa Di Delete</p>
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
                            <a class='modal-title btn btn-warning' id='loginModalLabel'>Pesan</a>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>
                            <p>Data Tidak Bisa Di Edit</p>
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

<?php
if (isset($_GET['msg'])) {
    $x = $_GET['msg'];

    if ($x == 2) {
        ?>
        <div class='modal fade' id='Msg1' tabindex='-1' aria-labelledby='MessageModal' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <a class='modal-title btn btn-primary' id='loginModalLabel'>Pesan</a>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body'>
                        <p>Data Berhasil Di Edit</p>
                    </div>
                </div>
            </div>
        </div>
        <script>
            window.addEventListener('DOMContentLoaded', function () {
                var myModal = new bootstrap.Modal(document.getElementById('Msg1'));
                myModal.show();
            });
        </script>
        <?php
    } else if ($x == 1) {
        ?>
            <div class='modal fade' id='Msg2' tabindex='-1' aria-labelledby='MessageModal' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <a class='modal-title btn btn-primary' id='loginModalLabel'>Pesan</a>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>
                            <p>Data Berhasil Di Masukan</p>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                window.addEventListener('DOMContentLoaded', function () {
                    var myModal = new bootstrap.Modal(document.getElementById('Msg2'));
                    myModal.show();
                });
            </script>
        <?php
    } else if ($x == 3) {
        ?>
            <div class='modal fade' id='Msg3' tabindex='-1' aria-labelledby='MessageModal' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <a class='modal-title btn btn-primary' id='loginModalLabel'>Pesan</a>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>
                            <p>Data Berhasil Di Delete</p>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                window.addEventListener('DOMContentLoaded', function () {
                    var myModal = new bootstrap.Modal(document.getElementById('Msg3'));
                    myModal.show();
                });
            </script>
        <?php
    }
}
?>