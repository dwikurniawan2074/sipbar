<?= $this->extend('template/dashboard_user'); ?>

<?= $this->section('content'); ?>
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
                                                <th class="sorting_desc" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-sort="descending" style="width: 126.016px;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($permintaan->getResult() as $key => $pr) : ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $pr->nama_pegawai ?></td>
                                                    <td><?= $pr->nama_bidang ?></td>
                                                    <td><?= $pr->nama_barang ?></td>
                                                    <td><?= $pr->jumlah_permintaan ?> <?= $pr->satuan ?></td>
                                                    <td><?= $pr->keterangan  ?></td>
                                                    <td>
                                                        <?php if (
                                                            $pr->tanggal_permintaan == null
                                                        ) { ?>
                                                            -
                                                        <?php } else { ?>
                                                            <?php echo tanggal_indonesia($pr->tanggal_permintaan) ?>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php if (
                                                            $pr->jumlah_disetujui  == null
                                                        ) { ?>
                                                            -
                                                        <?php } else { ?>
                                                            <?= $pr->jumlah_disetujui  ?>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php if (
                                                            $pr->tanggal_disetujui == null
                                                        ) { ?>
                                                            -
                                                        <?php } else { ?>
                                                            <?php echo tanggal_indonesia($pr->tanggal_disetujui) ?>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php if (
                                                            $pr->status == '0'
                                                        ) { ?>
                                                            <label class="badge badge-danger">Tidak di Setujui</label>
                                                        <?php } else if (
                                                            $pr->status == '1'
                                                        ) { ?>
                                                            <label class="badge badge-info">On Proses</label>
                                                        <?php } elseif (
                                                            $pr->status == '2'
                                                        ) { ?>
                                                            <label class="badge badge-success">di Setujui</label>

                                                        <?php } ?>

                                                    </td>
                                                    <td class="sorting_1">
                                                        <div class="container-fluid" style="display: flex;">
                                                            <?php if ($pr->status == "0") { ?>
                                                                <a class="disabled btn btn-warning mr-2" href="/keluar/edit/<?= $pr->id ?>" style="height: 30px"><i class="ti-pencil-alt"></i></a>
                                                                <form action="/pegawai/delete_permintaan/<?= $pr->id ?>" method="post">
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <button type="submit" class="btn btn-success mr-2" style="height: 30px" disabled><i class="ti-check"></i></button>
                                                                </form>
                                                                <form action="/pegawai/delete_permintaan/<?= $pr->id ?>" method="post">
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <button type="submit" class="btn btn-danger" style="height: 30px" disabled><i class="ti-close"></i></button>
                                                                </form>
                                                            <?php } else if ($pr->status == "1") { ?>
                                                                <button type="button" class="btn btn-warning mr-2" data-toggle="modal" data-target="#staticBackdrop<?= $pr->id ?>" style="height: 30px"><i class="ti-pencil-alt"></i></button>
                                                                <div class="modal fade bd-example-modal-xl" id="staticBackdrop<?= $pr->id ?>" tabindex="-1" aria-labelledby="myLargeModalLabel" role="dialog">
                                                                    <div class="modal-dialog modal-xl">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="staticBackdropLabel">Edit Pengajuan Permintaan Barang</h1>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span></button>
                                                                            </div>
                                                                            <?= form_open('/subkor/update_permintaan_persetujuan/' . $pr->id_barang_permintaan) ?>
                                                                            <?= csrf_field(); ?>
                                                                            <form action="/subkor/update_permintaan_persetujuan/<?= $pr->id_barang_permintaan ?>" method="POST" enctype="multipart/form-data">
                                                                                <div class="modal-body">
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputName1">Nama Barang</label>
                                                                                        <input type="text" class="form-control" id="exampleInputName1" name="nama_barang" placeholder="Nama Barang" value="<?= $pr->nama_barang ?>" readonly>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputName1">Jumlah Permintaan</label>
                                                                                        <input type="number" class="form-control" id="exampleInputName1" name="jumlah" placeholder="Jumlah" min="1" max="<?= $pr->stok_menjadi ?>" value="<?= $pr->jumlah_permintaan ?>" required>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputName1">Satuan</label>
                                                                                        <input type="text" class="form-control" id="exampleInputName1" name="satuan" value="<?= $pr->satuan ?>" readonly>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputName1">Keterangan</label>
                                                                                        <input type="text" class="form-control" id="exampleInputName1" name="keterangan" placeholder="Keterangan" value="<?= $pr->keterangan ?>" readonly>
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


                                                                <button type="button" class="btn btn-success mr-2" style="height: 30px" data-toggle="modal" data-target="#Setuju"><i class="ti-check"></i></button>
                                                                <div class="modal fade" id="Setuju">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="SetujuLabel">Setuju Permintaan Barang Pegawai</h1>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span></button>
                                                                            </div>
                                                                            <?= form_open('/subkor/setuju_permintaan/' . $pr->id_barang_permintaan) ?>
                                                                            <?= csrf_field(); ?>
                                                                            <form action="/subkor/setuju_permintaan/<?= $pr->id_barang_permintaan ?>" method="post">
                                                                                <div class="modal-body">
                                                                                    <p>Apakah Anda Yakin Ingin Menyetujui Permintaan ini?</p>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-light" data-dismiss="modal" style="height: 50px">Kembali</button>
                                                                                    <button type="submit" class="btn btn-success" style="height: 50px">Setuju <i class="ti-check"></i></button>
                                                                                </div>
                                                                            </form>
                                                                            <?= form_close(); ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                </form>
                                                                <?= form_close(); ?>

                                                                <button type="button" class="btn btn-danger" style="height: 30px" data-toggle="modal" data-target="#Tolak"><i class="ti-close"></i></button>
                                                                <div class="modal fade" id="Tolak">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="TolakLabel">Tolak Permintaan Barang Pegawai</h1>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span></button>
                                                                            </div>
                                                                            <?= form_open('/subkor/tolak_permintaan/' . $pr->id_barang_permintaan) ?>
                                                                            <?= csrf_field(); ?>
                                                                            <form action="/subkor/tolak_permintaan/<?= $pr->id_barang_permintaan ?>" method="post">
                                                                                <div class="modal-body">
                                                                                    <p>Apakah Anda Yakin Ingin Menolak Permintaan ini?</p>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-light" data-dismiss="modal" style="height: 50px">Kembali</button>
                                                                                    <button type="submit" class="btn btn-danger" style="height: 50px">Tolak <i class="ti-close"></i></button>
                                                                                </div>
                                                                            </form>
                                                                            <?= form_close(); ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                </form>
                                                                <?= form_close(); ?>
                                                            <?php } else if ($pr->status == "2") { ?>
                                                                <a class="disabled btn btn-warning mr-2" href="/keluar/edit/<?= $pr->id ?>" style="height: 30px"><i class="ti-pencil-alt"></i></a>
                                                                <form action="/pegawai/delete_permintaan/<?= $pr->id ?>" method="post">
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <button type="submit" class="btn btn-success mr-2" style="height: 30px" disabled><i class="ti-check"></i></button>
                                                                </form>
                                                                <form action="/pegawai/delete_permintaan/<?= $pr->id ?>" method="post">
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <button type="submit" class="btn btn-danger" style="height: 30px" disabled><i class="ti-close"></i></button>
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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script language="JavaScript" type="text/javascript">
    function checkSetuju() {
        return confirm('Anda ingin Menyetujuinya?');
    }

    function checkTolak() {
        return confirm('Anda ingin Menolaknya?');
    }
</script>
<?= $this->endSection(); ?>