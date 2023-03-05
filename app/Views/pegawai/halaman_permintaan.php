<?= $this->extend('template/dashboard_user') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <?php if (session()->getFlashdata('stock')) {
        echo '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
        echo session()->getFlashdata('stock');
        echo '</div>';
    }
    ?>

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

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Pengajuan Permintaan Barang Pegawai</h4>
            <div class="row">
                <div class="col-10"></div>
                <div class="col-2">
                    <a class="btn btn-info mr-2" href="<?php echo base_url()?>/pegawai/halaman_cetak_permintaan" style="height:30x">
                        <i class="ti-printer"></i>
                        Cetak Data Permintaan
                    </a>
                </div>
            </div>
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
                                    <table id="order-listing" class="table table-bordered" role="grid" aria-describedby="order-listing_info">
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
                                                        <td><a class="btn btn-success" href="<?php echo base_url()?>/pegawai/barang_permintaan/<?= $pr['id'] ?>" style="height: 30px"><label class="badge badge-success" style="color:white;padding-top:-10px">Detail Permintaan</label></a></td>
                                                        <td><?php echo tanggal_indonesia($pr['tanggal_permintaan']) ?></td>
                                                        <td class="sorting_1">
                                                            <div class="container-fluid" style="display: flex;">
                                                                <a class="btn btn-info mr-2" href="<?php echo base_url()?>/pegawai/cetak_permintaan/<?= $pr['id'] ?>" style="height:30px"><i class="ti-printer"></i></a>

                                                                <?php if ($pr['status_permintaan'] == "0") { ?>
                                                                    <form action="<?php echo base_url()?>/pegawai/delete_permintaan/<?= $pr['id'] ?>" method="post">
                                                                        <input type="hidden" name="_method" value="DELETE">
                                                                        <button type="submit" class="btn btn-danger" style="height: 30px" disabled><i class="ti-trash"></i></button>
                                                                    </form>
                                                                <?php } else if ($pr['status_permintaan'] == "1") { ?>
                                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#DeletePermintaan<?= $pr['id'] ?>" style="height: 30px"><i class="ti-trash"></i></button>
                                                                    <div class="modal fade" id="DeletePermintaan<?= $pr['id'] ?>">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="DeleteLabel">Hapus Data Permintaan Barang </h1>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span></button>
                                                                                </div>
                                                                                <?= form_open('/pegawai/delete_permintaan/' . $pr['id']) ?>
                                                                                <?= csrf_field(); ?>
                                                                                <form action="<?php echo base_url()?>/pegawai/delete_permintaan/<?= $pr['id'] ?>" method="POST">
                                                                                    <div class="modal-body">
                                                                                        <p>Apakah Anda Yakin Ingin Menghapus Data ini?</p>
                                                                                        <input type="hidden" name="_method" value="DELETE">
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-light" data-dismiss="modal" style="height: 50px">Kembali</button>
                                                                                        <button type="submit" class="btn btn-danger" style="height: 30px">Hapus <i class="ti-trash"></i></button>
                                                                                    </div>
                                                                                </form>
                                                                                <?= form_close(); ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php } else if ($pr['status_permintaan'] == "2") { ?>
                                                                    <form action="<?php echo base_url()?>/pegawai/delete_permintaan/<?= $pr['id'] ?>" method="post">
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
<script language="JavaScript" type="text/javascript">
      $(document).ready(function() {
           let x = new DataTable('#order-listing',{
               
            });

        });

</script>
<?= $this->endSection() ?>