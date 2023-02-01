<?= $this->extend('template/dashboard_user'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <div class="row">

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Akun</h4>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
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
                                            <?= $peg['pangkat']; ?>
                                        </td>
                                        <td>
                                            <?= $peg['nama_bidang']; ?>
                                        </td>
                                        <td>
                                            <?= $peg['jabatan']; ?>
                                        </td>
                                        <td>
                                            <?= $peg['role']; ?>
                                        </td>
                                    </tr>
                                <?php
                                    $no++;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>