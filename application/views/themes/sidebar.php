<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('/') ?>">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item nav-category">PASIEN</li>
        <li class="nav-item">
            <a class="nav-link"
                href="<?= site_url('admision/pendaftaran') ?>">
                <i class="menu-icon mdi mdi-card-text-outline"></i>
                <span class="menu-title">Pendaftaran<br/>Berobat</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link"
                href="<?= site_url('admision/pasien') ?>">
                <i class="menu-icon mdi mdi-file-document"></i>
                <span class="menu-title">Data Pasien<br/>Berobat</span>
            </a>
        </li>

        <li class="nav-item nav-category">LAPORAN</li>
        <li class="nav-item">
            <a class="nav-link"
                href="<?= site_url('admision/laporan/kunjungan_poliklinik') ?>">
                <i class="menu-icon mdi mdi-table"></i>
                <span class="menu-title">Laporan Kunjungan<br/>Berdasarkan Poliklinik</span>
            </a>
        </li>

    </ul>
</nav>

<div class="main-panel">