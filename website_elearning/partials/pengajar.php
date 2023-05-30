<?php
include_once("app/config/configurasi.php");
$query = mysqli_query($koneksi, "SELECT * FROM tb_pengajar");

?>
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center">
            <h6 class="section-title bg-white text-center text-primary px-3">Pengajar</h6>
            <h1 class="mb-5">Pengajar Kami</h1>
        </div>
        <div class="wow fadeInUp" data-wow-delay="0.1s">
            <div class="owl-carousel testimonial-carousel position-relative">
            <?php while ($view = mysqli_fetch_array($query)) { ?>
                <div class="team-item bg-light">
                    <div class="overflow-hidden">
                        <?php $foto = $view['foto']?>
                        <img class="img-fluid" src="<?php echo $foto ?>" alt="">
                    </div>
                    <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        <div class="bg-light d-flex justify-content-center pt-2 px-1">
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4">
                        <h5 class="mb-0"><?php echo $view['nama']?></h5>
                        <small>Jurusan <?php echo $view['jurusan']?></small>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>