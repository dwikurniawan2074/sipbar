<?= $this->extend('template/template_dashboard'); ?>


<?= $this->section('sidebar'); ?>


<!-- Sidebar Untuk Pegawai -->
<?php if (session()->id_role == 1) : ?>
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
            <li class="nav-item">
                <a class="nav-link" href="/login/keluar">
                    <i class="icon-head menu-icon"></i>
                    <span class="menu-title">Logout</span>
                </a>
            </li>
        </ul>
    </nav>
<?php endif; ?>

<!-- Sidebar Untuk Subkor -->
<?php if (session()->id_role == 2) : ?>
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="/subkor/halaman_subkor">
                    <i class="icon-grid menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/subkor/halaman_permintaan">
                    <i class="icon-grid-2 menu-icon"></i>
                    <span class="menu-title">Data Permintaan</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/subkor/halaman_stok_barang">
                    <i class="icon-paper menu-icon"></i>
                    <span class="menu-title">Data Stok Barang</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/subkor/halaman_stok_barang_masuk">
                    <i class="icon-paper menu-icon"></i>
                    <span class="menu-title">Data Stok Barang Masuk</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/login/keluar">
                    <i class="icon-head menu-icon"></i>
                    <span class="menu-title">Logout</span>
                </a>
            </li>
        </ul>
    </nav>
<?php endif; ?>

<!-- Sidebar Untuk Kabag -->
<?php if (session()->id_role == 3) : ?>
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="/kabag/halaman_kabag">
                    <i class="icon-grid menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/kabag/halaman_permintaan">
                    <i class="icon-bar-graph menu-icon"></i>
                    <span class="menu-title">Data Permintaan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/kabag/halaman_stok_barang">
                    <i class="icon-grid-2 menu-icon"></i>
                    <span class="menu-title">Data Stok Barang</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/login/keluar">
                    <i class="icon-head menu-icon"></i>
                    <span class="menu-title">Logout</span>
                </a>
            </li>
        </ul>
    </nav>
<?php endif; ?>

<!-- Sidebar Untuk Operator Persediaan -->
<?php if (session()->id_role == 4) : ?>
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="/operator/halaman_operator">
                    <i class="icon-grid menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <!-- ERROR -->
            <li class="nav-item">
                <a class="nav-link" href="/operator/halaman_input_barang">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Input Data Barang</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/operator/halaman_data_barang">
                    <i class="icon-grid-2 menu-icon"></i>
                    <span class="menu-title">Data Barang</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/operator/halaman_input_barang_masuk">
                    <i class="icon-paper menu-icon"></i>
                    <span class="menu-title">Input Barang Masuk</span>
                </a>
            </li>
            <!-- ERROR -->
            <li class="nav-item">
                <a class="nav-link" href="/operator/halaman_data_barang_masuk">
                    <i class="icon-paper menu-icon"></i>
                    <span class="menu-title">Data Barang Masuk</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/operator/halaman_laporan_stok">
                    <i class="icon-bar-graph menu-icon"></i>
                    <span class="menu-title">Laporan Stok Barang</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/login/keluar">
                    <i class="icon-head menu-icon"></i>
                    <span class="menu-title">Logout</span>
                </a>
            </li>
        </ul>
    </nav>
<?php endif; ?>

<!-- Sidebar Untuk Admin Sistem -->
<?php if (session()->id_role == 5) : ?>
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="/admin/halaman_admin">
                    <i class="icon-grid menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/data_jabatan">
                    <i class="icon-head menu-icon"></i>
                    <span class="menu-title">Data Jabatan</span>
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
            <li class="nav-item">
                <a class="nav-link" href="/login/keluar">
                    <i class="icon-head menu-icon"></i>
                    <span class="menu-title">Logout</span>
                </a>
            </li>
        </ul>
    </nav>
<?php endif; ?>


<?= $this->endSection(); ?>
<?= $this->section('parentContent'); ?>
<?= $this->renderSection('content'); ?>
<?= $this->endSection(); ?>