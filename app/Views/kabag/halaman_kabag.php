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
</div>
<?= $this->endSection(); ?>