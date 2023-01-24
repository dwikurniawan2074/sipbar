<?= $this->extend('template/template_dashboard'); ?>

<?= $this->section('sidebar'); ?>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="/admin/halaman_admin">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/admin/input_data">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Input Data Akun</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/admin/data_akun">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Data Akun Pegawai</span>
            </a>
        </li>
    </ul>
</nav>

<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Halaman Admin</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>