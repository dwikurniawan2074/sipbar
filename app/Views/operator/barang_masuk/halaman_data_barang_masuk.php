<?= $this->extend('template/dashboard_user'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<?= $this->section('content'); ?>
<div class="content-wrapper">
    <div class="row">



        <!-- fungsi konversi tanggal indonesia -->
        <?php
        function tanggal_indonesia($tanggal)
        {

            $bulan = array(
                1 =>     'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );

            $var = explode('-', $tanggal);

            return $var[2] . ' ' . $bulan[(int)$var[1]] . ' ' . $var[0];
            // var 0 = tanggal
            // var 1 = bulan
            // var 2 = tahun
        } ?>


        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Barang Masuk</h4>
                    <div class="row">
                        <div class="col-10"></div>
                        <div class="col-2">
                            <a class="btn btn-info mr-2" href="/operator/halaman_cetak_barang_masuk" style="height:30x">
                                <i class="ti-printer"></i>
                                Cetak Barang Masuk
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <div id="order-listing_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="order-listing" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1">No.</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1">Kode Barang</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1">Nama Barang</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1">Satuan</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1">Stok Masuk</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1">Tanggal</th>
                                                        <th class="sorting_desc" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-sort="descending" style="width: 126.016px;">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1 + (10 * ($currentPage - 1));
                                                    foreach ($barang as $barang) : ?>
                                                        <tr>
                                                            <td><?= $no ?></td>
                                                            <td><?= $barang['kode_barang'] ?></td>
                                                            <td><?= $barang['nama_barang'] ?></td>
                                                            <td><?= $barang['satuan'] ?></td>
                                                            <td><?= $barang['jumlah_barangMasuk'] ?></td>
                                                            <td><?php echo tanggal_indonesia($barang['tanggal_barangMasuk']) ?></td>
                                                            <td class="sorting_1">
                                                                <div class="container-fluid" style="display: flex;">
                                                                    <button type="button" class="btn btn-warning mr-2" data-toggle="modal" data-target="#staticBackdrop<?= $barang['id_barang_masuk'] ?>" style="height: 30px"><i class="ti-pencil-alt"></i></button>
                                                                    <div class="modal fade bd-example-modal-xl" id="staticBackdrop<?= $barang['id_barang_masuk'] ?>" tabindex="-1" aria-labelledby="myLargeModalLabel" role="dialog">
                                                                        <div class="modal-dialog modal-xl">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="staticBackdropLabel">Edit Pengajuan Permintaan Barang</h1>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span></button>
                                                                                </div>
                                                                                <?= form_open('/operator/update_data_barang_masuk/' . $barang['id_barang_masuk']) ?>
                                                                                <?= csrf_field(); ?>
                                                                                <form action="/operator/update_data_barang_masuk/<?= $barang['id_barang_masuk'] ?>" method="POST" enctype="multipart/form-data">
                                                                                    <div class="modal-body">
                                                                                        <div class="form-group">
                                                                                            <label for="exampleInputName1">Kode Barang</label>
                                                                                            <input type="hidden" class="form-control" id="exampleInputName1" placeholder="id Barang" name="id_barang" value="<?= $barang['id'] ?>" readonly>
                                                                                            <input type="hidden" class="form-control" id="exampleInputName1" placeholder="id Barang Masuk" name="id_barang_masuk" value="<?= $barang['id_barang_masuk'] ?>" readonly>
                                                                                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Kode Barang" name="kode_barang" value="<?= $barang['kode_barang'] ?>" readonly>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="exampleInputName1">Nama Barang</label>
                                                                                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Nama Barang" name="nama_barang" value="<?= $barang['nama_barang'] ?>" readonly>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="exampleInputName1">Satuan</label>
                                                                                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Satuan" name="satuan" value="<?= $barang['satuan'] ?>" readonly>
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label for="exampleInputName1">Stok Masuk</label>
                                                                                            <input type="number" class="form-control" id="exampleInputName1" placeholder="Stok Masuk" name="stok_masuk" min="1" value="<?= $barang['jumlah_barangMasuk'] ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-light" data-dismiss="modal" style="height: 50px">Close</button>
                                                                                        <button type="submit" class="btn btn-success" style="height: 50px">Simpan <i class="ti-save"></i></button>
                                                                                    </div>
                                                                                </form>
                                                                                <?= form_close(); ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Delete<?= $barang['id_barang_masuk'] ?>" style="height: 30px"><i class="ti-trash"></i></button>
                                                                    <div class="modal fade" id="Delete<?= $barang['id_barang_masuk'] ?>">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="DeleteLabel">Hapus Data Barang Masuk</h1>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span></button>
                                                                                </div>
                                                                                <?= form_open('/operator/delete_data_barang_masuk/' . $barang['id_barang_masuk']) ?>
                                                                                <?= csrf_field(); ?>
                                                                                <form action="/operator/delete_data_barang_masuk/<?= $barang['id_barang_masuk'] ?>" method="POST">
                                                                                    <div class="modal-body">
                                                                                        <p>Apakah Anda Yakin Ingin Menghapus Data ini?</p>
                                                                                        <input type="hidden" name="_method" value="DELETE">
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-light" data-dismiss="modal" style="height: 50px">Kembali</button>
                                                                                        <button type="submit" class="btn btn-danger" style="height: 50px">Hapus <i class="ti-trash"></i></button>
                                                                                    </div>
                                                                                </form>
                                                                                <?= form_close(); ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                        </tr>
                                                    <?php $no++;
                                                    endforeach;
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <?= $pager->links('data_barang_masuk','pager_sistem');?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script language="JavaScript" type="text/javascript">
    function checkDelete() {
        return confirm('Anda ingin Menghapusnya?');
    }
</script>
<?= $this->endSection(); ?>