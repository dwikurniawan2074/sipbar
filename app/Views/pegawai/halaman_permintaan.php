
<?= $this->extend('template/dashboard_user') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Pengajuan Permintaan Barang Pegawai</h4>
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
                                    <a class="btn btn-info btn-icon-text" href="/pegawai/halaman_cetak_permintaan">
                                        <i class="ti-printer btn-icon"></i>
                                        Cetak Permintaan
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="order-listing" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1">No.</th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1">Nama Pegawai</th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1">Permintaan</th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1">Tanggal Permintaan</th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1">Tanggal di Setujui</th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-sort="descending">Status</th>
                                                <th class="sorting_desc" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-sort="descending" style="width: 126.016px;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($permintaan as $pr) : ?>
                                                <?php

                                                if ($pr['nip'] == session()->get('nip')) {  ?>
                                                    <tr>
                                                        <td><?= $no ?></td>
                                                        <td><?= session()->get('nama_pegawai'); ?></td>
                                                        <td><a class="btn btn-info" href="/pegawai/barang_permintaan/" style="height: 30px"><label class="badge badge-info">Barang Permintaan</label></a></td>
                                                        <td><?= $pr['tanggal_permintaan'] ?></td>
                                                        <td>
                                                            <?php if (
                                                                $pr['tanggal_disetujui'] == null
                                                            ) { ?>
                                                                -
                                                            <?php } else { ?>
                                                                <?= $pr['tanggal_disetujui'] ?>
                                                            <?php } ?>
                                                        </td>
                                                        <td>
                                                            <?php if (
                                                                $pr['status'] == '0'
                                                            ) { ?>
                                                                <label class="badge badge-danger">Tidak di Setujui</label>
                                                            <?php } else if (
                                                                $pr['status'] == '1'
                                                            ) { ?>
                                                                <label class="badge badge-info">On Proses</label>
                                                            <?php } else if (
                                                                $pr['status'] == '2'
                                                            ) { ?>
                                                                <label class="badge badge-success">di Setujui</label>

                                                            <?php } ?>

                                                        </td>
                                                        <td class="sorting_1">
                                                            <div class="container-fluid" style="display: flex;">
                                                                <?php if ($pr['status'] == "0") { ?>
                                                                    <a class="disabled btn btn-warning mr-2" href="/keluar/edit/<?= $pr['id'] ?>" style="height: 30px"><i class="ti-pencil-alt"></i></a>
                                                                    <form action="/pegawai/delete_permintaan/<?= $pr['id'] ?>" method="post">
                                                                        <input type="hidden" name="_method" value="DELETE">
                                                                        <button type="submit" class="btn btn-danger" style="height: 30px" disabled><i class="ti-trash"></i></button>
                                                                    </form>
                                                                <?php } else if ($pr['status'] == "1") { ?>
                                                                    <button type="button" class="btn btn-warning mr-2" data-toggle="modal" data-target="#staticBackdrop<?= $pr['id'] ?>" style="height: 30px"><i class="ti-pencil-alt"></i></button>
                                                                    <div class="modal fade bd-example-modal-xl" id="staticBackdrop<?= $pr['id'] ?>" tabindex="-1" aria-labelledby="myLargeModalLabel" role="dialog">
                                                                        <div class="modal-dialog modal-xl">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="staticBackdropLabel">Edit Pengajuan Permintaan Barang</h1>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span></button>
                                                                                </div>
                                                                                <?= form_open('/pegawai/update_permintaan/' . $pr['id']) ?>
                                                                                <?= csrf_field(); ?>
                                                                                <form action="/pegawai/update_permintaan/<?= $pr['id'] ?>" method="POST" enctype="multipart/form-data">
                                                                                    <div class="modal-body">
                                                                                        <div class="form-group">
                                                                                            <label for="exampleInputName1">Nama Pegawai</label>
                                                                                            <input type="text" class="form-control" id="exampleInputName1" value="Achirsyah Moeis" readonly>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="exampleInputName1">Nama Barang</label>
                                                                                            <input type="text" class="form-control" id="exampleInputName1" name="nama_barang" placeholder="Nama Barang" value="" required>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="exampleInputName1">Stok Barang</label>
                                                                                            <input type="text" class="form-control" id="exampleInputName1" value="10" readonly>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="exampleInputName1">Jumlah</label>
                                                                                            <input type="text" class="form-control" id="exampleInputName1" name="jumlah" placeholder="Jumlah" min="1" max="10" value=" " required>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="exampleInputName1">Satuan</label>
                                                                                            <input type="text" class="form-control" id="exampleInputName1" name="satuan" value="" readonly>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="exampleInputName1">Keterangan</label>
                                                                                            <input type="text" class="form-control" id="exampleInputName1" name="keterangan" placeholder="Keterangan" value="" required>
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
                                                                    <?= form_open('/pegawai/delete_permintaan/' . $pr['id']) ?>
                                                                    <?= csrf_field(); ?>
                                                                    <form action="/pegawai/delete_permintaan/<?= $pr['id'] ?>" method="post">
                                                                        <input type="hidden" name="_method" value="DELETE">
                                                                        <button type="submit" class="btn btn-danger" style="height: 30px"><i class="ti-trash"></i></button>
                                                                    </form>
                                                                    <?= form_close(); ?>
                                                                <?php } else if ($pr['status'] == "2") { ?>
                                                                    <a class="disabled btn btn-warning mr-2" href="/keluar/edit/<?= $pr['id'] ?>" style="height: 30px"><i class="ti-pencil-alt"></i></a>
                                                                    <form action="/pegawai/delete_permintaan/<?= $pr['id'] ?>" method="post">
                                                                        <input type="hidden" name="_method" value="DELETE">
                                                                        <button type="submit" class="btn btn-danger" style="height: 30px" disabled><i class="ti-trash"></i></button>
                                                                    </form>
                                                                <?php } ?>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            <?php $no++;
                                            endforeach;
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="order-listing_info" role="status" aria-live="polite">Showing 1 to 10 of 10 entries</div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="order-listing_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button page-item previous disabled" id="order-listing_previous"><a href="#" aria-controls="order-listing" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                            <li class="paginate_button page-item active"><a href="#" aria-controls="order-listing" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                            <li class="paginate_button page-item next disabled" id="order-listing_next"><a href="#" aria-controls="order-listing" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li>
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
<?= $this->endSection() ?>