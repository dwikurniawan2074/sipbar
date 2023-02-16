<?= $this->extend('template/dashboard_user'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<?= $this->section('content'); ?>
<div class="content-wrapper">
    <div class="row">

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Barang Masuk</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <div id="order-listing_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="order-listing" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" >No.</th>
                                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" >Kode Barang</th>
                                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" >Nama Barang</th>
                                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" >Satuan</th>
                                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" >Stok Masuk</th>
                                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" >Tanggal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($barang->getResult() as $key => $br) : ?>
                                                    <tr>
                                                        <td><?= $no?></td>
                                                        <td><?= $br->kode_barang?></td>
                                                        <td><?= $br->nama_barang ?></td>
                                                        <td><?= $br->satuan ?></td>
                                                        <td><?= $br->jumlah_barangMasuk ?></td>
                                                        <td><?= $br->tanggal_barangMasuk ?></td>
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
function checkDelete(){
    return confirm('Anda ingin Menghapusnya?');
}
</script>
<?= $this->endSection(); ?>