<?= $this->extend('template/template_dashboard'); ?>

<?= $this->section('sidebar'); ?>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="/admin/halaman_admin">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/admin/input_data">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Input Data Akun</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/admin/data_akun">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Data Akun Pegawai</span>
            </a>
        </li>
    </ul>
</nav>

<?= $this->endSection(); ?>

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
                                        Jabatan
                                    </th>
                                    <th>
                                        Bidang
                                    </th>
                                    <th>
                                        Pangkat Golongan
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        196609091990031001
                                    </td>
                                    <td>
                                        Achirsyah Moeis
                                    </td>
                                    <td>
                                        Kepala Bagian   
                                    </td>
                                    <td>
                                        IPP
                                    </td>
                                    <td>
                                        May 15, 2015
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        2
                                    </td>
                                    <td>
                                        196609091990031001 </td>
                                    <td>
                                        Achmad Faried Joesoef
                                    </td>
                                    <td>
                                        Subkor
                                    </td>
                                    <td>
                                        APD
                                    </td>
                                    <td>
                                        July 1, 2015
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        3
                                    </td>
                                    <td>
                                        196609091990031001 </td>
                                    <td>
                                        Albert Suherman
                                    </td>
                                    <td>
                                        Pegawai
                                    </td>
                                    <td>
                                        Akuntan Negara
                                    </td>
                                    <td>
                                        July 1, 2015
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        4
                                    </td>
                                    <td>
                                        196609091990031001 </td>
                                    <td>
                                        Andreas Tjahjadi
                                    </td>
                                    <td>
                                        Subkor
                                    </td>
                                    <td>
                                        Kepegawaian
                                    </td>
                                    <td>
                                        July 1, 2015
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        5
                                    </td>
                                    <td>
                                        196609091990031001 </td>
                                    <td>
                                        Sutono Nitisastro
                                    </td>
                                    <td>
                                        Pegawai
                                    </td>
                                    <td>
                                        Keuangan
                                    </td>
                                    <td>
                                        July 1, 2015
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        6
                                    </td>
                                    <td>
                                        196609091990031001 </td>
                                    <td>
                                        Sutiadi Widjaya
                                    </td>
                                    <td>
                                       Subkor
                                    </td>
                                    <td>
                                        Kearsipan
                                    </td>
                                    <td>
                                        July 1, 2015
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        7
                                    </td>
                                    <td>
                                        196609091990031001 </td>
                                    <td>
                                        Sugiono Djauhari
                                    </td>
                                    <td>
                                        Kabag
                                    </td>
                                    <td>
                                        Kepgeawaian
                                    </td>
                                    <td>
                                        July 1, 2015
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>