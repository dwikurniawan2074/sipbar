<?= $this->extend('template/dashboard_user'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
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
                                            <table id="order-listing" class="table table-bordered" role="grid" aria-describedby="order-listing_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1">No.</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1">Kode Barang</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1">Nama Barang</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1">Satuan</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1">Stok Masuk</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1">Tanggal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($barang->getResult() as $key => $br) : ?>
                                                        <tr>
                                                            <td><?= $no ?></td>
                                                            <td><?= $br->kode_barang ?></td>
                                                            <td><?= $br->nama_barang ?></td>
                                                            <td><?= $br->satuan ?></td>
                                                            <td><?= $br->jumlah_barangMasuk ?></td>
                                                            <td>
                                                                <?php if (
                                                                    $br->tanggal_barangMasuk == null
                                                                ) { ?>
                                                                    -
                                                                <?php } else { ?>
                                                                    <?php echo tanggal_indonesia($br->tanggal_barangMasuk) ?>
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
                </div>
            </div>
        </div>
    </div>
</div>
<script language="JavaScript" type="text/javascript">
      $(document).ready(function() {
            function checkDelete() {
                return confirm('Anda ingin Menghapusnya?');
            }
            let x = new DataTable('#order-listing',{
            });
        });

</script>

<?= $this->endSection(); ?>