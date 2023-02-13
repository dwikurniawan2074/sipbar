
<?= $this->extend('template/dashboard_user') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <?php if (session()->getFlashdata('stock')){
            echo '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
            echo session()->getFlashdata('stock');
            echo '</div>';
        }
        ?>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Pengajuan Permintaan Barang Pegawai</h4>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive pt-3">
                        <div id="order-listing_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12 col-md-10">
                                    <div class="dataTables_length" id="order-listing_length">

                                    </div>
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
                                                        <td><a class="btn btn-success" href="/pegawai/barang_permintaan/<?= $pr['id'] ?>" style="height: 30px"><label class="badge badge-success" style="color:white;">Detail Permintaan</label></a></td>
                                                        <td><?= $pr['tanggal_permintaan'] ?></td>
                                                        <td class="sorting_1">
                                                            <div class="container-fluid" style="display: flex;">
                                                            <a class="btn btn-info mr-2" href="/pegawai/halaman_cetak_permintaan/" style="height:30x"><i class="ti-printer"></i></a>

                                                                <?php if ($pr['status'] == "0") { ?>
                                                                    <form action="/pegawai/delete_permintaan/<?= $pr['id'] ?>" method="post">
                                                                        <input type="hidden" name="_method" value="DELETE">
                                                                        <button type="submit" class="btn btn-danger" style="height: 30px" disabled><i class="ti-trash"></i></button>
                                                                    </form>
                                                                <?php } else if ($pr['status'] == "1") { ?>
                                                                    <?= form_open('/pegawai/delete_permintaan/' . $pr['id']) ?>
                                                                    <?= csrf_field(); ?>
                                                                    <form action="/pegawai/delete_permintaan/<?= $pr['id'] ?>" method="post">
                                                                        <input type="hidden" name="_method" value="DELETE">
                                                                        <button type="submit" class="btn btn-danger" style="height: 30px"><i class="ti-trash"></i></button>
                                                                    </form>
                                                                    <?= form_close(); ?>
                                                                <?php } else if ($pr['status'] == "2") { ?>
                                                                    <form action="/pegawai/delete_permintaan/<?= $pr['id'] ?>" method="post">
                                                                        <input type="hidden" name="_method" value="DELETE">
                                                                        <button type="submit" class="btn btn-danger" style="height: 30px" disabled><i class="ti-trash"></i></button>
                                                                    </form>
                                                                <?php } ?>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php $no++;
                                                }
                                            
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
<?= $this->endSection() ?>