<?= $this->extend('template/dashboard_user'); ?>

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