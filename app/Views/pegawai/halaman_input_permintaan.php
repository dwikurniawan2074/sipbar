<?= $this->extend('template/dashboard_user'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Input Permintaan Barang</h4>
                    <p class="card-description">
                        Silahkan masukkan data barang yang sesuai
                    </p>
                    <form action="/pegawai/simpan_permintaan" method="POST" class="forms-sample">
                        <div class="form-group disabled">
                            <label for="exampleInputName1">Nama Pegawai</label>
                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Achirsyah Moeis" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Nama Barang</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="nama_barang" placeholder="Nama Barang" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Stok Barang</label>
                            <input type="text" class="form-control" id="exampleInputName1" placeholder="10" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Jumlah</label>
                            <input type="number" class="form-control" id="exampleInputName1" name="jumlah" placeholder="Jumlah" min="1" max="10" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Satuan</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="satuan" placeholder="Satuan" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Keterangan</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="keterangan" placeholder="Keterangan" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Tanggal Permintaan</label>
                            <input type="date" class="form-control" name="tanggal_permintaan" id="exampleInputName1" required>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>
<?= $this->endSection(); ?>