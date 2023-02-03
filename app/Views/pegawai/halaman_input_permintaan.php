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
                    <?= form_open('/pegawai/simpan_permintaanSementara') ?>
                    <?= csrf_field(); ?>
                    <form action="/pegawai/simpan_permintaanSementara" method="POST" class="forms-sample">
                        <div class="form-group disabled">
                            <label for="exampleInputName1">Nama Pegawai</label>
                            <input type="text" class="form-control" id="exampleInputName1" value="<?= session()->get('nama_pegawai'); ?>" readonly>
                        </div>
                        <div class="form-group position-relative">
                            <label for="exampleInputName1">Nama Barang</label>
                            <select class="form-control" id="exampleSelectGender" name="id_pangkat" required>
                                <option value="">--Pilih Nama Barang--</option>
                                <?php foreach ($barang as $brg => $value) { ?>
                                    <option value="<?= $value['id']; ?>"><?= $value['nama_barang']; ?></option>
                                <?php }; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Stok Barang</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="stok" value="<?= $value['stok_menjadi']; ?>" readonly>
                        </div>
                        <div class="form-group position-relative">
                            <label for="exampleInputName1">Jumlah</label>
                            <input type="number" class="form-control" id="exampleInputName1" name="jumlah" placeholder="Jumlah" min="1" max="stok" required>
                        </div>
                        <div class="form-group position-relative">
                            <label for="exampleInputName1">Satuan</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="satuan" value="Pack" readonly>
                        </div>
                        <div class="form-group position-relative">
                            <label for="exampleInputName1">Keterangan</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="keterangan" placeholder="Keterangan" required>
                        </div>

                        <button type="submit" class="btn btn-info mr-2">Simpan</button>

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
                        <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Nama Barang: activate to sort column ascending">Nama Barang</th>
                        <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Jumlah: activate to sort column ascending">Jumlah</th>
                        <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Satuan: activate to sort column ascending">Satuan</th>
                        <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Keterangan: activate to sort column ascending">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        foreach ($permintaanS as $prs) : 
                    ?>
                        <tr>
                            <td><?= $no?></td>
                            <td><?= $prs['nama_barang'] ?></td>
                            <td><?= $prs['jumlah'] ?></td>
                            <td><?= $prs['satuan'] ?></td>
                            <td><?= $prs['keterangan'] ?></td>
                        </tr>
                    <?php $no++;
                    endforeach;
                    ?>
                </tbody>
                <tfoot></tfoot>
            </table>
            <button type="submit" class="btn btn-success mr-2">Submit</button>
        </div>
            </div>
        </div>
    </div>
    
</div>
<?= $this->endSection(); ?>