<?= $this->extend('template/dashboard_user'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Selamat Datang <?= session()->get('nama_pegawai'); ?></h3>
                    <h5 class="font-weight-normal mb-0">di Sistem Informasi Pendataan Barang BPKP Perwakilan Lampung</h6>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card tale-bg">
                <div class="card-people mt-auto">
                    <img src="<?php echo base_url()?>/skydash/images/dashboard/people.svg" height="300" alt="people">
                    <div class="weather-info">
                        <div class="d-flex">
                            <div>
                                <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2>
                            </div>
                            <div class="ml-2">
                                <h4 class="location font-weight-normal">Bandar Lampung</h4>
                                <h6 class="font-weight-normal">Indonesia</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-8 grid-margin transparent">
            <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent" style="cursor: pointer;" onclick="location.href='<?php echo base_url()?>/kabag/halaman_permintaan'">
                    <div class="card card-tale">
                        <div class="card-body">
                            <p class="mb-4">&nbsp;</p>
                            <p class="h3 mb-2">Data Permintaan</p>
                            <p>Monitoring Data Permintaan Barang Yang di Ajukan Pegawai</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent" style="cursor: pointer;" onclick="location.href='<?php echo base_url()?>/kabag/halaman_data_stok_barang'">
                    <div class="card card-dark-blue">
                        <div class="card-body">
                            <p class="mb-4">&nbsp;</p>
                            <p class="h3 mb-2">Data Stok Barang</p>
                            <p>Monitoring Data Stok Barang Yang Saat Ini Tersedia</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="col-md-4 grid-margin transparent">
            <div class="row">
                <div class="col-md-12 mb-4 stretch-card transparent" style="cursor: pointer;" onclick="location.href='<?php echo base_url()?>/kabag/halaman_stok_barang_masuk'">
                    <div class="card card-light-danger">
                        <div class="card-body">
                            <p class="mb-4">&nbsp;</p>
                            <p class="h3 mb-2">Data Stok Barang Masuk</p>
                            <p>Monitoring Stok Barang Masuk</p>
                        </div>
                    </div>
                </div>
            </div>

        
        </div>
        
    </div>
</div>
<?= $this->endSection(); ?>