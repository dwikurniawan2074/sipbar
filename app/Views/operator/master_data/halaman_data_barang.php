<?= $this->extend('template/dashboard_user'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <div class="row">

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Barang</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <div id="order-listing_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12 col-md-10">
                                    <div class="dataTables_length" id="order-listing_length">

                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2" href="">
                                    <button class="btn btn-danger btn-icon-text" data-toggle="modal" data-target="#Reset">
                                        <i class="ti-trash btn-icon"></i>
                                        Reset Opname
                                    </button>
                                    <div class="modal fade" id="Reset">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="DeleteLabel">HReset Opname Data Barang</h1>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <?= form_open('/operator/reset_opname')?>
                                                <?= csrf_field(); ?>
                                                <form action="/operator/reset_opname" method="POST">
                                                <div class="modal-body">
                                                    <p>Apakah Anda Yakin Ingin Mereset Data ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-dismiss="modal" style="height: 50px">Kembali</button>
                                                    <button type="submit" class="btn btn-danger" style="height: 50px">Reset <i class="ti-trash"></i></button>
                                                </div>
                                                </form> 
                                                <?= form_close(); ?> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="order-listing" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" >No.</th>
                                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" >Kode Barang</th>
                                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" >Nama Barang</th>
                                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" >Satuan</th>
                                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" >Stok Awal</th>
                                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" >Stok Menjadi</th>
                                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" >Tanggal</th>
                                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-sort="descending">Status</th>
                                                    <th class="sorting_desc" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-sort="descending" style="width: 126.016px;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($barang as $br) : ?>
                                                    <tr>
                                                        <td><?= $no?></td>
                                                        <td><?= $br['kode_barang'] ?></td>
                                                        <td><?= $br['nama_barang'] ?></td>
                                                        <td><?= $br['satuan'] ?></td>
                                                        <td><?= $br['stok_awal'] ?></td>
                                                        <td><?= $br['stok_menjadi'] ?></td>
                                                        <td><?= $br['tanggal'] ?></td>
                                                        <td>
                                                            <?php if (
                                                                $br['status_barang'] == '0'
                                                            ) { ?>
                                                                <label class="badge badge-info">Belum di Opname</label>
                                                            <?php } else if (
                                                                $br['status_barang'] == '1'
                                                            ) { ?>
                                                                <label class="badge badge-success">Sudah di Opname</label>
                                                            <?php } ?>

                                                        </td>
                                                        <td class="sorting_1">
                                                            <div class="container-fluid" style="display: flex;">
                                                            <button type="button" class="btn btn-warning mr-2" data-toggle="modal" data-target="#staticBackdrop<?= $br['id'] ?>" style="height: 30px"><i class="ti-pencil-alt"></i></button>
                                                                <div class="modal fade bd-example-modal-xl" id="staticBackdrop<?=$br['id'] ?>" tabindex="-1" aria-labelledby="myLargeModalLabel" role="dialog">
                                                                    <div class="modal-dialog modal-xl">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="staticBackdropLabel">Edit Pengajuan Permintaan Barang</h1>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span></button>
                                                                            </div>
                                                                            <?= form_open('/operator/update_data_barang/'.$br['id']) ?>
                                                                            <?= csrf_field(); ?>
                                                                            <form action="/operator/update_data_barang/<?= $br['id'] ?>" method="POST" enctype="multipart/form-data">
                                                                            <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputName1">Kode Barang</label>
                                                                                <input type="text" class="form-control" id="exampleInputName1" placeholder="Kode Barang" name="kode_barang" value="<?= $br['kode_barang'] ?>">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="exampleInputName1">Nama Barang</label>
                                                                                <input type="text" class="form-control" id="exampleInputName1" placeholder="Nama Barang" name="nama_barang" value="<?= $br['nama_barang'] ?>">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="exampleInputName1">Satuan</label>
                                                                                <input type="text" class="form-control" id="exampleInputName1" placeholder="Satuan" name="satuan" value="<?= $br['satuan'] ?>">
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="exampleInputName1">Stok Menjadi</label>
                                                                                <input type="hidden" class="form-control" id="exampleInputName1" placeholder="Stok Awal" name="stok_awal" value="<?= $br['stok_menjadi'] ?>">
                                                                                <input type="number" class="form-control" id="exampleInputName1" placeholder="Stok Menjadi" name="stok_menjadi" value="<?= $br['stok_menjadi'] ?>">
                                                                            </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-light" data-dismiss="modal" style="height: 50px">Close</button>
                                                                                <button type="submit" class="btn btn-success" style="height: 50px" >Simpan <i class="ti-save"></i></button>
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
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="order-listing_info" role="status" aria-live="polite"></div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="order-listing_paginate">
                                            <ul class="pagination">
                                                <!-- <li class="paginate_button page-item previous disabled" id="order-listing_previous"><a href="#" aria-controls="order-listing" data-dt-idx="0" tabindex="0" class="page-link"></a></li>
                                                <li class="paginate_button page-item active"><a href="#" aria-controls="order-listing" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                                <li class="paginate_button page-item next disabled" id="order-listing_next"><a href="#" aria-controls="order-listing" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li> -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
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
function checkReset(){
    return confirm('Anda ingin Meresetnya?');
}
</script>
<?= $this->endSection(); ?>