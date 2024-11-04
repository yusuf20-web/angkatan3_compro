<?php 
include 'admin/koneksi.php';
// data projek
$id = $_GET['id'];
$queryTampilProjek = mysqli_query($koneksi, "SELECT * FROM projek ORDER BY id='$id' DESC");
$rowProjek = mysqli_fetch_assoc($queryTampilProjek);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Yusuf Firdaus - Projek</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <?php include 'inc/head.php'; ?>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <?php include 'inc/nav.php' ?>
    <!-- Navbar End -->


    <!-- Carousel Start -->

    <!-- Carousel End -->

    <!-- Komunitas Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">PROJEK</h6>
                <h1 class="mb-5">Projek Saya</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <?php while ($rowKomunitas = mysqli_fetch_assoc($queryTampilKomunitas)): ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item bg-light ">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="admin/upload/<?php echo $rowKomunitas['foto'] ?>" alt="">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 rounded-pill" style="border-radius: 30px 0 0 30px;">Detail</a>
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0">
                            <h5 class="mb-4"><?php echo $rowKomunitas['nama_komunitas']?></h5>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i><?php echo $rowKomunitas['ketua_komunitas']?></small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i><?php echo $rowKomunitas['anggota_komunitas']?></small>
                        </div>
                    </div>
                </div>
                <?php endwhile;?>
            </div>
        </div>
    </div>
    <!-- Komunitas End -->


    <!-- Footer Start -->
    <?php include 'inc/footer.php'; ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <?php include 'inc/js.php' ?>
</body>

</html>