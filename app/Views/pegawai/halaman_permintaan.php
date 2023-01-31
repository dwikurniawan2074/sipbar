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
                                                    <th>No.</th>
                                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Nama Pegawai: activate to sort column ascending ">Nama Pegawai</th>
                                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Nama Barang: activate to sort column ascending">Nama Barang</th>
                                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Jumlah: activate to sort column ascending">Jumlah</th>
                                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Satuan: activate to sort column ascending">Satuan</th>
                                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Keterangan: activate to sort column ascending">Keterangan</th>
                                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Tanggal Permintaan: activate to sort column ascending">Tanggal Permintaan</th>
                                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Tanggal di Setujui: activate to sort column ascending">Tanggal di Setujui</th>
                                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Status</th>
                                                    <th class="sorting_desc" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" aria-sort="descending" style="width: 126.016px;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($permintaan as $pr) : ?>
                                                    <tr>
                                                        <td><?= $no?></td>
                                                        <td>Achirsyah Moeis</td>
                                                        <td><?= $pr['nama_barang'] ?></td>
                                                        <td><?= $pr['jumlah'] ?></td>
                                                        <td><?= $pr['satuan'] ?></td>
                                                        <td><?= $pr['keterangan'] ?></td>
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
                                                                <label class="badge badge-danger">Rejected</label>
                                                            <?php } else if (
                                                                $pr['status'] == '1'
                                                            ) { ?>
                                                                <label class="badge badge-info">Procces</label>
                                                            <?php } elseif (
                                                                $pr['status'] == '2'
                                                            ) { ?>
                                                                <label class="badge badge-success">Approve</label>
                                                                
                                                            <?php } ?>

                                                        </td>
                                                        <td class="sorting_1">
                                                            <div class="container-fluid" style="display: flex;">
                                                            <?php if ($pr['status'] == "0") { ?>
                                                                <a class="disabled btn btn-warning mr-2" href="/keluar/edit/<?= $pr['id'] ?>"><i class="ti-pencil-alt"></i></a>
                                                                <form action="/pegawai/delete_permintaan/<?= $pr['id'] ?>" method="post">
                                                                    <input type="hidden" name="_method" value="DELETE" >
                                                                    <button type="submit" class="btn btn-danger" disabled><i class="ti-trash"></i></button>
                                                                </form> 
                                                            <?php } else if ($pr['status'] == "1"){?> 
                                                                <a class="btn btn-warning mr-2" href="/keluar/edit/<?= $pr['id'] ?>" ><i class="ti-pencil-alt"></i></a>
                                                                <form action="/pegawai/delete_permintaan/<?= $pr['id'] ?>" method="post">
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <button type="submit" class="btn btn-danger" ><i class="ti-trash"></i></button>
                                                                </form> 
                                                            <?php } else if ($pr['status'] == "2"){?> 
                                                                <a class="disabled btn btn-warning mr-2" href="/keluar/edit/<?= $pr['id'] ?>" ><i class="ti-pencil-alt"></i></a>
                                                                <form action="/pegawai/delete_permintaan/<?= $pr['id'] ?>" method="post">
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <button type="submit" class="btn btn-danger" disabled><i class="ti-trash"></i></button>
                                                                </form> 
                                                            <?php } ?>
                                                            
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
<?= $this->endSection() ?>