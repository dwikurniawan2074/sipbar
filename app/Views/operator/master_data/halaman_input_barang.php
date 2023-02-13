<?= $this->extend('template/dashboard_user'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Input Data Barang</h4>
                    <p class="card-description">
                        Silahkan masukkan data barang yang sesuai
                    </p>
                    <?= form_open('/operator/simpan_data_barang') ?>
                    <?= csrf_field(); ?>
                    <form action="/operator/simpan_data_barang" class="forms-sample">
                        <div class="form-group">
                            <label for="exampleInputName1">Kode Barang</label>
                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Kode Barang" name="kode_barang">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Nama Barang</label>
                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Nama Barang" name="nama_barang">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Satuan</label>
                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Satuan" name="satuan">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputName1">Stok Awal</label>
                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Stok Awal" name="stok_awal">
                        </div>
 
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>

                    </form>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>