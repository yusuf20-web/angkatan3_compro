<?php
session_start();
include 'koneksi.php';
// jika button simpan di tekan
if (isset($_POST['simpan'])) {
    $nama_komunitas     = $_POST['nama_komunitas'];
    $ketua_komunitas    = $_POST['ketua_komunitas'];
    $anggota_komunitas  = $_POST['anggota_komunitas'];

    // $_POST: form input name=''
    // $_GET : url ?param='nilai'
    // $_FILES: ngambil nilai dari input type file
    if (!empty($_FILES['foto']['name'])) {
        $nama_foto = $_FILES['foto']['name'];
        $ukuran_foto = $_FILES['foto']['size'];

        // png, jpg, jpeg
        $ext = array('png', 'jpg', 'jpeg');
        $extFoto = pathinfo($nama_foto, PATHINFO_EXTENSION);

        // JIKA EXTENSI FOTO TIDAK ADA EXT YANG TERDAFTAR DI ARRAY EXT
        if (!in_array($extFoto, $ext)) {
            echo "Ext tidak ditemukan";
            die;
        } else {
            // pindahkan gambar dari tmp folder ke folder yang sudah kita buat
            move_uploaded_file($_FILES['foto']['tmp_name'], 'upload/' . $nama_foto);
            // tambah data dengan foto komunitas
            $insertKomunitas = mysqli_query($koneksi, "INSERT INTO komunitas (nama_komunitas, ketua_komunitas, anggota_komunitas, foto)
            VALUES ('$nama_komunitas','$ketua_komunitas','$anggota_komunitas','$nama_foto')");
        }
    } else {
        // tambah data tanpa foto komunitas
        $insertKomunitas = mysqli_query($koneksi, "INSERT INTO komunitas (nama_komunitas, ketua_komunitas, anggota_komunitas)
            VALUES ('$nama_komunitas','$ketua_komunitas','$anggota_komunitas')");
    }

    header("location:komunitas.php?tambah=berhasil");
}
// Jika parameter tersebut ada, nilai tersebut akan disimpan dalam variabel $id. Jika tidak ada, $id akan berisi string kosong. 
$id  = isset($_GET['edit']) ? $_GET['edit'] : '';
// query edit untuk menampilkan data komunitas yang akan diedit
$queryEdit = mysqli_query($koneksi, "SELECT * FROM komunitas WHERE id ='$id'");
// mysqli_fetch_assoc($query) = untuk menjadikan hasil query menjadi sebuah data (object,array)
// $queryEdit dijadikan data menjadi $rowEdit
$rowEdit   = mysqli_fetch_assoc($queryEdit);


// jika button edit di klik

if (isset($_POST['edit'])) {
    $nama_komunitas     = $_POST['nama_komunitas'];
    $ketua_komunitas    = $_POST['ketua_komunitas'];
    $anggota_komunitas  = $_POST['anggota_komunitas'];

    // jika user ingin memasukkan gambar
    if (!empty($_FILES['foto']['name'])) {
        $nama_foto = $_FILES['foto']['name'];
        $ukuran_foto = $_FILES['foto']['size'];

        // png, jpg, jpeg
        $ext = array('png', 'jpg', 'jpeg');
        $extFoto = pathinfo($nama_foto, PATHINFO_EXTENSION);

        if (!in_array($extFoto, $ext)) {
            echo "Extensi gambar tidak ditemukan";
            die;
        } else {
            unlink('upload/' . $rowEdit['foto']);
            move_uploaded_file($_FILES['foto']['tmp_name'], 'upload/' . $nama_foto);
            // coding ubah/update disini
            $update = mysqli_query($koneksi, "UPDATE komunitas SET nama_komunitas='$nama_komunitas', 
            ketua_komunitas='$ketua_komunitas', foto='$nama_foto' WHERE id='$id'");
        }
    } else {
        // kalo user tidak ingin memasukkan gambar
        $update = mysqli_query($koneksi, "UPDATE komunitas SET nama_komunitas='$nama_komunitas', 
            ketua_komunitas='$ketua_komunitas', anggota_komunitas='$anggota_komunitas' WHERE id='$id'");
    }

    header("location:komunitas.php?ubah=berhasil");
}
?>
<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
    lang="en"
    class="light-style layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Tambah Komunitas</title>

    <meta name="description" content="" />

    <?php include 'inc/head.php' ?>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <?php include 'inc/sidebar.php'; ?>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <?php include 'inc/nav.php'; ?>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header"><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Komunitas</div>
                                    <div class="card-body">


                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="mb-3 row">
                                                <div class="col-sm-6">
                                                    <label for="" class="form-label">Nama Komunitas</label>
                                                    <input type="text"
                                                        class="form-control"
                                                        name="nama_komunitas"
                                                        placeholder="Masukkan nama komunitas"
                                                        required
                                                        value="<?php echo isset($_GET['edit']) ? $rowEdit['nama_komunitas'] : '' ?>">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="" class="form-label">Ketua Komunitas</label>
                                                    <input type="text"
                                                        class="form-control"
                                                        name="ketua_komunitas"
                                                        placeholder="Masukkan ketua komunitas"
                                                        required
                                                        value="<?php echo isset($_GET['edit']) ? $rowEdit['ketua_komunitas'] : '' ?>">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="" class="form-label">Anggota Komunitas</label>
                                                    <input type="text"
                                                        class="form-control"
                                                        name="anggota_komunitas"
                                                        placeholder="Masukkan anggota komunitas"
                                                        required
                                                        value="<?php echo isset($_GET['edit']) ? $rowEdit['anggota_komunitas'] : '' ?>">
                                                </div>
                                            </div>
                                            <!-- <div class="mb-3 row">
                                                <div class="col-sm-12">
                                                    <label for="" class="form-label">Password</label>
                                                    <input type="password"
                                                        name="password"
                                                        placeholder="Masukkan password anda"
                                                        class="form-control"
                                                        id="">
                                                </div>
                                            </div> -->
                                            <div class="mb-3 row">
                                                <div class="col-sm-12">
                                                    <label for="" class="form-label">Foto</label>
                                                    <input type="file"
                                                        name="foto">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <button class="btn btn-primary" name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan' ?>" type="submit">
                                                    Simpan
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                ©
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                , made with ❤️ by
                                <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
                            </div>
                            <div>
                                <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                                <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                                <a
                                    href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                                    target="_blank"
                                    class="footer-link me-4">Documentation</a>

                                <a
                                    href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                                    target="_blank"
                                    class="footer-link me-4">Support</a>
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/admin/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/admin/assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/admin/assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/admin/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/admin/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/admin/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/admin/assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>