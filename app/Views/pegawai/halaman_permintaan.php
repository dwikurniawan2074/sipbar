<?= $this->extend('template/template_dashboard'); ?>

<?= $this->section('sidebar'); ?>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="/pegawai/halaman_pegawai">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/pegawai/halaman_stok_barang">
                <i class="icon-bar-graph menu-icon"></i>
                <span class="menu-title">Data Stok Barang</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/pegawai/halaman_input_permintaan">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Input Permintaan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/pegawai/halaman_permintaan">
                <i class="icon-grid-2 menu-icon"></i>
                <span class="menu-title">Data Permintaan</span>
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
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        Achirsyah Moeis
                                    </td>
                                    <td>
                                        Kertas A4
                                    </td>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        Pack
                                    </td>
                                    <td>
                                        Persediaan ATK di Bidang IPP
                                    </td>
                                    <td>
                                        Jan 26, 2023
                                    </td>
                                    <td>
                                        Jan 27, 2023
                                    </td>
                                    <td>
                                        di Setujui
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