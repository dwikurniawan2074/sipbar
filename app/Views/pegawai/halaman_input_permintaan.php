<?= $this->extend('template/dashboard_user'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<?= $this->section('content'); ?>
<div class="content-wrapper">
    <?php
        if (session()->getFlashdata('kosong')){
          echo '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
          echo session()->getFlashdata('kosong');
          echo '</div>';
        }
        if (session()->getFlashdata('stock')){
            echo '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
            echo session()->getFlashdata('stock');
            echo '</div>';
        }
        ?>
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
                                    <?php if ( $value['stok_menjadi'] > 0 ){  ?>
                                        <option value="<?=$value['id']; ?>"><?= $value['nama_barang']; ?></option>
                                    <?php } else if ($value['stok_menjadi'] == 0 ){?>
                                        <option value="<?=$value['id']; ?>" disabled><?= $value['nama_barang']; ?> (Stok Persediaan Kosong)</option>
                                    <?php } ?>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group position-relative">
                            <label for="exampleInputName1">Stock Barang</label>
                            <input type="text" readonly class="form-control" id="stockBarang" name="jumlah" placeholder="Stok Barang" min="1" required>
                        </div>
                        <div class="form-group position-relative">
                            <label for="exampleInputName1">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah_barang" name="jumlah" placeholder="Jumlah" min="1" required>
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
                <?= form_open('/pegawai/simpan_permintaan') ?>
                    <?= csrf_field(); ?>
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
                            if ($prs['nip'] == session()->get('nip') ){ 
                            ;
                    ?>

                        <?php
                        echo form_hidden('nama_barang'.$prs['id'].session()->get('nip'),$prs['nama_barang']); 
                        echo form_hidden('jumlah'.$prs['id'].session()->get('nip'),$prs['jumlah']);
                        echo form_hidden('satuan'.$prs['id'].session()->get('nip'),$prs['satuan']);
                        echo form_hidden('keterangan'.$prs['id'].session()->get('nip'),$prs['keterangan']);
                        ?>
                        <tr>
                            <td><?= $no?></td>
                            <td><?= $prs['nama_barang'] ?></td>
                            <td><?= $prs['jumlah'] ?></td>
                            <td><?= $prs['satuan'] ?></td>
                            <td><?= $prs['keterangan'] ?></td>
                        </tr>
                    
                    <?php $no++;
                            }
                    endforeach;
                    ?>
                </tbody>
                <tfoot></tfoot>
            </table>
            <?php if($jml_prmtn_sntr > 0 ): ?>
            <button type="submit" class="btn btn-success mr-2">Submit</button>
            <?php endif; ?>
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
                var stok = barang[i].stok_menjadi +" "+ barang[i].satuan;
                console.log(stok);
                $('#stockBarang').val(stok);
            }
        }
    });
</script>
<?= $this->endSection(); ?>
