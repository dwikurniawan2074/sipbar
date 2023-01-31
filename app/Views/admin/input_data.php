<?= $this->extend('template/dashboard_user'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <div class="row">

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Input Data Akun Pegawai</h4>
                    <p class="card-description">
                        Silahkan masukkan data diri yang sesuai
                    </p>
                    <form action="/admin/tambah_akun" method="POST" class="forms-sample">
                        <div class="form-group">
                            <label for="exampleInputName1">NIP</label>
                            <input type="text" class="form-control" name="nip" id="exampleInputName1" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Nama Pegawai</label>
                            <input type="text" class="form-control" name="nama" id="exampleInputName1" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Pangkat Golongan</label>
                            <input type="text" class="form-control" name="pangkat" id="exampleInputName1" placeholder="Pangkat Golongan">
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">Bidang</label>
                            <select class="form-control" id="exampleSelectGender" name="bidang">
                                <option value="Instansi Pemerintah Pusat">IPP</option>
                                <option value="APD">APD</option>
                                <option value="Akuntan Negara">Akuntan Negara</option>
                                <option value="Keuangan">Keuangan</option>
                                <option value="Kearsipan">Kearsipan</option>
                                <option value="Investigasi">Investigasi</option>
                                <option value="Umum">Umum</option>
                            </select>
                        </div>  
                        <div class="form-group">
                            <label for="exampleInputName1">Jabatan</label>
                            <input type="text" class="form-control" name="jabatan" id="exampleInputName1" placeholder="Jabatan">
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">Role</label>
                            <select class="form-control" id="exampleSelectGender" name="role">
                                <option value="Pegawai">Pegawai</option>
                                <option value="Subkor">Subkor</option>
                                <option value="Kabag">Kepala Bagian</option>
                                <option value="Operator">Operator</option>
                                <option value="Admin Sistem">Admin Sistem</option>
                            </select>
                        </div>
                       
                        
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>