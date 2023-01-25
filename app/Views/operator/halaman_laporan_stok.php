<?= $this->extend('template/template_dashboard'); ?>

<?= $this->section('sidebar'); ?>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="/operator/halaman_operator">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/operator/halaman_input_barang">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Input Data Barang</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/operator/halaman_permintaan">
                <i class="icon-grid-2 menu-icon"></i>
                <span class="menu-title">Data Permintaan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/operator/halaman_laporan_stok">
                <i class="icon-bar-graph menu-icon"></i>
                <span class="menu-title">Laporan Stok Barang</span>
            </a>
        </li>
    </ul>
</nav>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Laporan Stok Barang</h4>
                    <p class="card-description">
                        Silahkan masukkan rentang waktu dari laporan yang akan di generate
                    </p>
                    <form class="form-inline">
                        <div class="col-3">
                            Dari Tanggal : &nbsp;
                            <input type="date" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Jane Doe">

                        </div>

                        <div class="col-3">
                            Sampai Tanggal : &nbsp;
                            <input type="date" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Jane Doe">

                        </div>

                        <button type="submit" class="btn btn-primary mb-2">Generate</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>