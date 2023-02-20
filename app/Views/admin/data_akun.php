<?= $this->extend('template/dashboard_user'); ?>

<?= $this->section('content'); ?>

<!-- <div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Akun</h4>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <div class="order-listing_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_length" id="order-listing_length">
                                        <label>Show <select name="order-listing_length" aria-controls="order-listing" class="custom-select custom-select-sm form-control">
                                                <option value="5">5</option>
                                                <option value="10">10</option>
                                                <option value="15">15</option>
                                                <option value="-1">All</option>
                                            </select> entries
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div id="order-listing_filter" class="dataTables_filter">
                                        <label><input type="search" class="form-control" placeholder="Search" aria-controls="order-listing"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="order-listing" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                                        <thead>
                                            <tr role="row">
                                                <th>
                                                    #
                                                </th>
                                                <th>
                                                    NIP
                                                </th>
                                                <th>
                                                    Nama Pegawai
                                                </th>
                                                <th>
                                                    Pangkat Golongan
                                                </th>
                                                <th>
                                                    Bidang
                                                </th>
                                                <th>
                                                    Jabatan
                                                </th>
                                                <th>
                                                    Role Sistem
                                                </th>
                                                <th>
                                                    Actions
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
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
</div> -->

<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Akun</h4>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <div id="order-listing_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                           
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="order-listing" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                                        <thead>
                                            <tr role="row">
                                                <th>No.</th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="NIP: activate to sort column ascending ">NIP</th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Nama Pegawai: activate to sort column ascending">Nama Pegawai</th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Pangkat Golongan: activate to sort column ascending">Pangkat Golongan</th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Bidang: activate to sort column ascending">Bidang</th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Jabatan: activate to sort column ascending">Jabatan</th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Role Sistem: activate to sort column ascending">Role Sistem</th>
                                                <th class="sorting_desc" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" aria-sort="descending" style="width: 126.016px;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            <?php foreach ($pegawai as $peg) : ?>
                                                <tr>
                                                    <td>
                                                        <?= $no; ?>
                                                    </td>
                                                    <td>
                                                        <?= $peg['nip']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $peg['nama_pegawai']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $peg['nama_pangkat']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $peg['nama_bidang']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $peg['nama_jabatan']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $peg['deskripsi_role']; ?>
                                                    </td>
                                                    <td class="sorting_1">
                                                        <div class="container-fluid" style="display: flex;">
                                                            <!-- button edit barang -->
                                                            <button type="button" class="btn btn-warning mr-2" data-toggle="modal" data-target="#staticBackdrop<?= $peg['nip'] ?>" style="height: 30px"><i class="ti-pencil-alt"></i></button>
                                                            <!-- modal -->
                                                            <div class="modal fade bd-example-modal-xl" id="staticBackdrop<?= $peg['nip'] ?>" tabindex="-1" aria-labelledby="myLargeModalLabel" role="dialog">
                                                                <div class="modal-dialog modal-xl">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="staticBackdropLabel">Edit Pengajuan Permintaan Barang</h1>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span></button>
                                                                        </div>
                                                                        <?= form_open('/admin/update_akun/' . $peg['nip']); ?>
                                                                        <?= csrf_field(); ?>
                                                                        <form method="POST" enctype="multipart/form-data">
                                                                            <div class="modal-body">
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputName1">NIP</label>
                                                                                    <input type="text" class="form-control" name="nip" id="exampleInputName1" value="<?= $peg['nip']; ?>" readonly>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputName1">Nama Pegawai</label>
                                                                                    <input type="text" class="form-control" id="exampleInputName1" name="nama" placeholder="" value="<?= $peg['nama_pegawai']; ?>" required>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputName1">Pangkat</label>
                                                                                    <select class="form-control" id="exampleSelectGender" name="id_pangkat" required>
                                                                                        <?php foreach ($pangkat as $key => $value) { ?>
                                                                                            <option value="<?= $value['id']; ?>">&nbsp;&nbsp;&nbsp;<?= $value['nama_pangkat']; ?></option>
                                                                                        <?php }; ?>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputName1">Bidang</label>
                                                                                    <select class="form-control" id="exampleSelectGender" name="id_bidang" required>
                                                                                        <?php foreach ($bidang as $key => $value) { ?>
                                                                                            <option value="<?= $value['id']; ?>">&nbsp;&nbsp;&nbsp;<?= $value['nama_bidang']; ?></option>
                                                                                        <?php  }; ?>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputName1">Jabatan</label>
                                                                                    <select class="form-control" id="exampleSelectGender" name="id_jabatan" required>
                                                                                        <?php foreach ($jabatan as $key => $value) { ?>
                                                                                            <option value="<?= $value['id']; ?>">&nbsp;&nbsp;&nbsp;<?= $value['nama_jabatan']; ?></option>
                                                                                        <?php }; ?>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputName1">Role</label>
                                                                                    <select class="form-control" id="exampleSelectGender" name="id_role" required>
                                                                                        <?php foreach ($role as $key => $value) { ?>
                                                                                            <option value="<?= $value['id']; ?>">&nbsp;&nbsp;&nbsp;<?= $value['deskripsi_role']; ?></option>
                                                                                        <?php }; ?>
                                                                                    </select>
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
                                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#DeleteAkun<?= $peg['nip'] ?>" style="height: 30px"><i class="ti-trash"></i></button>
                                                                    <div class="modal fade" id="DeleteAkun<?= $peg['nip'] ?>">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="DeleteLabel">Hapus Data Akun </h1>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span></button>
                                                                                </div>
                                                                                <?= form_open('/admin/hapus_akun/' . $peg['nip']) ?>
                                                                                <?= csrf_field(); ?>
                                                                                <form action="/admin/hapus_akun/<?= $peg['nip'] ?>" method="POST">
                                                                                    <div class="modal-body">
                                                                                        <p>Apakah Anda Yakin Ingin Menghapus Akun ini?</p>
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
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>