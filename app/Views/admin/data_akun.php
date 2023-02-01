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
                                </div>
                            </div>
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
                                                        <?= $peg['nama']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $peg['nama_pangkat']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $peg['nama_bidang']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $peg['jabatan']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $peg['nama_role']; ?>
                                                    </td>
                                                    <td class="sorting_1">
                                                        <div class="container-fluid" style="display: flex;">
                                                            <a class="btn btn-warning mr-2" href=""><i class="ti-pencil-alt"></i></a>
                                                            <form action="" method="post">
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <button type="submit" class="btn btn-danger"><i class="ti-trash"></i></button>
                                                            </form>
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
<?= $this->endSection(); ?>