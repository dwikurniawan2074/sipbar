<?= $this->extend('template/template_dashboard'); ?>

<?= $this->section('sidebar'); ?>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="/kabag/halaman_kabag">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/kabag/halaman_permintaan">
                <i class="icon-bar-graph menu-icon"></i>
                <span class="menu-title">Data Permintaan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/kabag/halaman_stok_barang">
                <i class="icon-grid-2 menu-icon"></i>
                <span class="menu-title">Data Stok Barang</span>
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
                    <h3 class="font-weight-bold">Halaman Kabag</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>