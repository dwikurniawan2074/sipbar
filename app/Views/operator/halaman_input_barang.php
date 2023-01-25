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
            <a class="nav-link" href="/operator/halaman_stok_barang">
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
                    <h4 class="card-title">Input Data Barang</h4>
                    <p class="card-description">
                        Silahkan masukkand data barang yang sesuai
                    </p>
                    <form class="forms-sample">
                        <div class="form-group">
                            <label for="exampleInputName1">Kode Barang</label>
                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Kode Barang">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Nama Barang</label>
                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Nama Barang">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Stok Awal</label>
                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Stok Awal">
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">Status Opname</label>
                            <select class="form-control" id="exampleSelectGender">
                                <option>Sudah Opname</option>
                                <option>Belum Opname</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>