<?= $this->extend('template/dashboard_user'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <div class="row">

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Pengajuan Permintaan Barang Pegawai</h4>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        No.
                                    </th>
                                    <th>
                                        Nama Pegawai
                                    </th>
                                    <th>
                                        Nama Barang
                                    </th>
                                    <th>
                                        Jumlah
                                    </th>
                                    <th>
                                        Satuan
                                    </th>
                                    <th>
                                        Keterangan
                                    </th>
                                    <th>
                                        Tanggal Permintaan
                                    </th>
                                    <th>
                                        Tanggal di Setujui
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1; 
                                foreach($permintaan as $pr) : ?>
                                <tr>
                                    <td>
                                        <?= $no ?>
                                    </td>
                                    <td>
                                        Achirsyah Moeis
                                    </td>
                                    <td>
                                        <?= $pr['nama_barang'] ?>
                                    </td>
                                    <td>
                                        <?= $pr['jumlah'] ?>
                                    </td>
                                    <td>
                                        <?= $pr['satuan'] ?>
                                    </td>
                                    <td>
                                        <?= $pr['keterangan'] ?>
                                    </td>
                                    <td>
                                        <?= $pr['tanggal_permintaan'] ?>
                                    </td>
                                    <td>
                                    <?php if ($pr['tanggal_disetujui'] == NULL) { ?>
                                            -
                                        <?php } else {?>
                                            <?= $pr['tanggal_disetujui'] ?>
                                        <?php } ?>
                                        
                                    </td>
                                    <td>
                                        <?php if ($pr['status'] == "0") { ?>
                                            Belum di Setujui
                                        <?php } else {?>
                                            di Setujui
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <div class="container-fluid" style="display: flex;">
                                        <?php if ($pr['status'] == "0") { ?>
                                            <a class="btn btn-warning mr-2" href="/keluar/edit/<?= $pr['id'] ?>"><i class="mdi mdi-table-edit"></i></a>
                                            <form action="/pegawai/delete_permintaan/<?= $pr['id'] ?>" method="post">
                                                <input type="hidden" name="_method" value="DELETE" >
                                                <button type="submit" class="btn btn-danger"><i class="mdi mdi-delete"></i></button>
                                            </form> 
                                        <?php } else {?> 
                                            <a class="disabled btn btn-warning mr-2" href="/keluar/edit/<?= $pr['id'] ?>" ><i class="mdi mdi-table-edit"></i></a>
                                            <form action="/pegawai/delete_permintaan/<?= $pr['id'] ?>" method="post">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger" disabled><i class="mdi mdi-delete"></i></button>
                                            </form> 
                                        <?php } ?>
                                        
                                        </div>
                                    </td>
                                </tr>
                                <?php $no++; endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>