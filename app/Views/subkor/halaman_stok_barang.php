<?= $this->extend('template/dashboard_user'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Stok Barang</h4>
                    <div class="table-responsive pt-3">
                        <table id="order-listing" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1">
                                        No.
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1">
                                        Kode Barang
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1">
                                        Nama Barang
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1">
                                        Satuan
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1">
                                        Stok Tersedia
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    foreach ($barang as $br) : 
                                ?>
                                <tr>
                                    <td>
                                        <?= $no ?>
                                    </td>
                                    <td>
                                        <?= $br['kode_barang'] ?>
                                    </td>
                                    <td>
                                        <?= $br['nama_barang'] ?>
                                    </td>
                                    <td>
                                        <?= $br['satuan'] ?>
                                    </td>
                                    <td>
                                    <?php if ( $br['stok_menjadi'] > 0 ){  ?>   
                                        <?= $br['stok_menjadi'] ?>
                                        <?php } else if ($br['stok_menjadi'] == 0 ){?>
                                         Stok Kosong
                                        <?php } ?>
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
<?= $this->endSection(); ?>