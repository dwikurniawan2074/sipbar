<?= $this->extend('template/dashboard_user'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<?= $this->section('content'); ?>
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Input Data Barang Masuk</h4>
                    <p class="card-description">
                        Silahkan masukkan data barang yang sesuai
                    </p>
                    <?= form_open('/operator/simpan_data_barang_masuk') ?>
                    <?= csrf_field(); ?>
                    <form action="/operator/simpan_data_barang_masuk" class="forms-sample">
                        <div class="form-group">
                            <label for="exampleInputName1">Kode Barang</label>
                            <input type="text" class="form-control" id="kode_barang" placeholder="Kode Barang" name="kode_barang" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Nama Barang</label>
                            <select class="form-control" id="nama_barang" name="nama_barang" required>
                                <option value="" disabled selected>--Pilih Kode Barang--</option>
                                <?php foreach ($data_barang as $value) : ?>
                                    <option value="<?=$value['id']; ?>"><?= $value['nama_barang']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Satuan</label>
                            <input type="text" class="form-control" id="satuan" placeholder="Satuan" name="satuan" readonly>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputName1">Stok Masuk</label>
                            <input type="text" class="form-control" id="stok_masuk" placeholder="Stok Masuk" name="stok_masuk" required>
                        </div>
 
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>

                    </form>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#nama_barang').change(function (e) { 
        e.preventDefault();
        var id= $(this).val();
        var barang = <?php echo json_encode($data_barang); ?>;
        console.log(barang);
        for (let i = 0; i < barang.length; i++) {
            if (barang[i].id == id) {
                var name = barang[i].kode_barang;
                console.log(name);
                $('#kode_barang').val(name);
            }
        }
    });
    $('#nama_barang').change(function (e) { 
        e.preventDefault();
        var id= $(this).val();
        var barang = <?php echo json_encode($data_barang); ?>;
        console.log(barang);
        for (let i = 0; i < barang.length; i++) {
            if (barang[i].id == id) {
                var name = barang[i].satuan;
                console.log(name);
                $('#satuan').val(name);
            }
        }
    });
    $('#nama_barang').change(function (e) { 
        e.preventDefault();
        var id= $(this).val();
        var barang = <?php echo json_encode($data_barang); ?>;
        console.log(barang);
        for (let i = 0; i < barang.length; i++) {
            if (barang[i].id == id) {
                var name = barang[i].stok_menjadi;
                console.log(name);
                $('#stok_masuk').val(name);
            }
        }
    });
</script>
<?= $this->endSection(); ?>