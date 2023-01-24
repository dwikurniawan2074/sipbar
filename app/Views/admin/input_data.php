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

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Input Data Akun Pegawai</h4>
                    <p class="card-description">
                        Silahkan masukkan data diri yang sesuai
                    </p>
                    <form class="forms-sample">
                        <div class="form-group">
                            <label for="exampleInputName1">NIP</label>
                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Nama Pegawai</label>
                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">Jabatan</label>
                            <select class="form-control" id="exampleSelectGender">
                                <option>Pegawai</option>
                                <option>Subkor</option>
                                <option>Kabag</option>
                                <option>Operator Persediaan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">Bidang</label>
                            <select class="form-control" id="exampleSelectGender">
                                <option>IPP</option>
                                <option>APD</option>
                                <option>Akuntan Negara</option>
                                <option>Keuangan</option>
                                <option>Kearsipan</option>
                                <option>Investigasi</option>
                                <option>Umum</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Pangkat Golongan</label>
                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Pangkat Golongan">
                        </div>
                        
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>