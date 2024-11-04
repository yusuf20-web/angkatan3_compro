<?php
include 'admin/koneksi.php';
$querySetting = mysqli_query($koneksi, "SELECT * FROM general_setting ORDER BY id DESC");
$rowSetting   = mysqli_fetch_assoc($querySetting);
// kode untuk menampilkan foto dari row setting
// admin/upload/<?php echo $rowSetting['logo']
?>


<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
    <!-- SVG FOR NAV -->
    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-journal-album text-primary" viewBox="0 0 16 16">
        <path d="M5.5 4a.5.5 0 0 0-.5.5v5a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 .5-.5v-5a.5.5 0 0 0-.5-.5zm1 7a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1z"/>
        <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
        <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
    </svg>
    <!-- SVG FOR NAV -->
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="index.php" class="nav-item nav-link">Beranda</a>
            <a href="about.php" class="nav-item nav-link">Tentang Saya</a>
            <a href="#" class="nav-item nav-link">Projek</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu fade-down m-0">
                    <a href="komunitas.php" class="dropdown-item">Komunitas</a>
                    <a href="#" class="dropdown-item">Instruktur</a>
                    <a href="#" class="dropdown-item">Setting Web Ini</a>
                </div>
            </div>
            <a href="contact.php" class="nav-item nav-link">Kontak</a>
        </div>
    </div>
</nav>