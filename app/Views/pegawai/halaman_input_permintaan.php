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
                    <form action="<?= base_url('/pegawai/simpan_permintaanSementara') ?>" method="POST" class="forms-sample">
                        <div class="form-group disabled">
                            <label for="exampleInputName1">Nama Pegawai</label>
                            <input type="text" class="form-control" id="exampleInputName1" value="<?= session()->get('nama_pegawai'); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                            <select class="form-control" id="nama_barang" name="nama_barang" required>
                                <option value="" disabled selected>--Pilih Nama Barang--</option>
                                <?php foreach ($data_barang as $value) : ?>
                                    <option value="<?=$value['id']; ?>"><?= $value['nama_barang']; ?> - <?= $value['stok_menjadi']; ?> <?= $value['satuan']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group position-relative">
                            <label for="exampleInputName1">Jumlah</label>
                            <input type="number" class="form-control" id="exampleInputName1" name="jumlah" placeholder="Jumlah" min="1" max="<?= $value['stok_menjadi']; ?>" required>
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

<!-- <script>
    $('#nama_barang').on('change',(event) =>{
        getBarang(event.target.value).then(data_barang=>{
            $('#stok_menjadi').val(data_barang.stok_menjadi);
        });
    });

    async function getBarang($id) {
        let response = await fetch('/api/home/' + $id)
        let data = await response.json();

        return data;
    } 
</script> -->