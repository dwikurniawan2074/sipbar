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
                    <?= form_open('/pegawai/simpan_permintaan') ?>
                    <?= csrf_field(); ?>
                    <form action="/pegawai/simpan_permintaan" method="POST" class="forms-sample">
                        <div class="form-group disabled">
                            <label for="exampleInputName1">Nama Pegawai</label>
                            <input type="text" class="form-control" id="exampleInputName1" value="Achirsyah Moeis" readonly>
                        </div>
                        <div class="form-group position-relative">
                            <label for="exampleInputName1">Nama Barang</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="nama_barang" placeholder="Nama Barang" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Stok Barang</label>
                            <input type="text" class="form-control" id="exampleInputName1" value="10" readonly>
                        </div>
                        <div class="form-group position-relative">
                            <label for="exampleInputName1">Jumlah</label>
                            <input type="number" class="form-control" id="exampleInputName1" name="jumlah" placeholder="Jumlah" min="1" max="10" required>
                        </div>
                        <div class="form-group position-relative">
                            <label for="exampleInputName1">Satuan</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="satuan" value="Pack" readonly>
                        </div>
                        <div class="form-group position-relative">
                            <label for="exampleInputName1">Keterangan</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="keterangan" placeholder="Keterangan" required>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>

                    </form>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
            <table id="order-listing" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                <thead>
                    <tr role="row">
                        <th>No.</th>
                        <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Nama Pegawai: activate to sort column ascending ">Nama Pegawai</th>
                        <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Nama Barang: activate to sort column ascending">Nama Barang</th>
                        <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Jumlah: activate to sort column ascending">Jumlah</th>
                        <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Satuan: activate to sort column ascending">Satuan</th>
                        <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Keterangan: activate to sort column ascending">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>1</td>
                            <td>Achirsyah Moeis</td>
                            <td>Achirsyah Moeis</td>
                            <td>Achirsyah Moeis</td>
                            <td>Achirsyah Moeis</td>
                            <td>Achirsyah Moeis</td>
                            
                </tbody>
                <tfoot></tfoot>
            </table>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </div>
            </div>
        </div>
    </div>
    
</div>
<?= $this->endSection(); ?>