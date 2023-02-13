<?= $this->extend('template/dashboard_user'); ?>

<?= $this->section('content'); ?>

<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Jabatan</h4>
            <div class="row">

                <div class="col-10">
                    <a class="btn btn-primary btn-icon-text" href="/admin/input_jabatan">
                        <i class="ti-plus btn-icon-prepend"></i>
                        Tambah Data
                    </a>
                </div>
                <div class="col-2">

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
                                                <th width="5%">No.</th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="NIP: activate to sort column ascending ">Jabatan</th>
                                                <th class="sorting_desc" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" aria-sort="descending" style="width: 126.016px;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            <?php foreach ($jabatan as $jabat) : ?>
                                                <tr>
                                                    <td>
                                                        <?= $no; ?>
                                                    </td>
                                                    <td>
                                                        <?= $jabat['nama_jabatan']; ?>
                                                    </td>
                                                    <td class="sorting_1">
                                                        <div class="container-fluid" style="display: flex;">
                                                            <!-- button edit barang -->
                                                            <button type="button" class="btn btn-warning mr-2" data-toggle="modal" data-target="#staticBackdrop<?= $jabat['id'] ?>" style="height: 30px"><i class="ti-pencil-alt"></i></button>
                                                            <div class="modal fade bd-example-modal-xl" id="staticBackdrop<?= $jabat['id'] ?>" tabindex="-1" aria-labelledby="myLargeModalLabel" role="dialog">
                                                                <div class="modal-dialog modal-xl">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="staticBackdropLabel">Edit Pengajuan Permintaan Barang</h1>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span></button>
                                                                        </div>
                                                                        <?= form_open('/admin/update_jabatan/' . $jabat['id']); ?>
                                                                        <?= csrf_field(); ?>
                                                                        <form method="POST" enctype="multipart/form-data">
                                                                            <div class="modal-body">
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputName1">Jabatan</label>
                                                                                    <input type="text" class="form-control" name="nama_jabatan" id="exampleInputName1" value="<?= $jabat['nama_jabatan']; ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-light" data-dismiss="modal" style="height: 50px">Cancel</button>
                                                                                <button type="submit" class="btn btn-success" style="height: 50px">Simpan <i class="ti-save"></i></button>
                                                                            </div>
                                                                        </form>
                                                                        <?= form_close(); ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?= form_open('/admin/hapus_jabatan/' . $jabat['id']) ?>
                                                            <?= csrf_field(); ?>
                                                            <!-- button hapus barang -->
                                                            <form method="post">
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <button type="submit" class="btn btn-danger" style="height: 30px"><i class="ti-trash"></i></button>
                                                            </form>

                                                            <?= form_close(); ?>
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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>