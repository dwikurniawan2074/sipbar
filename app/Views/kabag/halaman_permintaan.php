<?= $this->extend('template/dashboard_user'); ?>

<?= $this->section('content'); ?>
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
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Pengajuan Permintaan Barang Pegawai</h4>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive pt-3">
                        <div id="order-listing_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="order-listing" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1">No.</th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1">Nama Pegawai</th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1">Bidang</th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1">Nama Barang</th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1">Jumlah Permintaan</th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1">Keterangan</th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1">Tanggal Permintaan</th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1">Jumlah di Setujui</th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1">Tanggal di Setujui</th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-sort="descending">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1 + (10 * ($currentPage - 1));
                                            foreach ($permintaan as $pr) : ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $pr['nama_pegawai'] ?></td>
                                                    <td><?= $pr['nama_bidang'] ?></td>
                                                    <td><?= $pr['nama_barang'] ?></td>
                                                    <td><?= $pr['jumlah_permintaan'] ?> <?= $pr['satuan']  ?></td>
                                                    <td><?= $pr['keterangan']  ?></td>
                                                    <td><?php echo tanggal_indonesia($pr['tanggal_permintaan']) ?></td>
                                                    <td>
                                                        <?php if (
                                                            $pr['jumlah_disetujui']  == null
                                                        ) { ?>
                                                            -
                                                        <?php } else { ?>
                                                            <?= $pr['jumlah_disetujui']  ?>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php if (
                                                            $pr['tanggal_disetujui'] == null
                                                        ) { ?>
                                                            -
                                                        <?php } else { ?>
                                                            <?php echo tanggal_indonesia($pr['tanggal_disetujui']) ?>
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
                                                        <?php } elseif (
                                                            $pr['status'] == '2'
                                                        ) { ?>
                                                            <label class="badge badge-success">di Setujui</label>

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
                            <?= $pager->links('barang_permintaan','pager_sistem');?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>