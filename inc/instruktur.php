<?php
include 'admin/koneksi.php';

// data instruktur
$queryInstruktur = mysqli_query($koneksi, "SELECT * FROM instruktur ORDER BY id DESC LIMIT 4");
?>

<div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Instruktur</h6>
                <h1 class="mb-5">Instruktur saya</h1>
            </div>
            <div class="row g-4">
                <?php while ($rowInstruktur = mysqli_fetch_assoc($queryInstruktur)): ?>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item bg-light">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="admin/upload/<?php echo $rowInstruktur['foto'] ?>" alt="">
                            </div>
                            <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                                <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                    <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="text-center p-4">
                                <h5 class="mb-0"><?php echo $rowInstruktur['nama_instruktur'] ?></h5>
                                <small><?php echo $rowInstruktur['jurusan_instruktur'] ?></small>
                            </div>
                        </div>
                    </div>
                <?php endwhile ?>


            </div>
        </div>
    </div>