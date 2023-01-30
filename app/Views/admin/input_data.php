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
                    <form class="forms-sample">
                        <div class="form-group">
                            <label for="exampleInputName1">NIP</label>
                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Nama Pegawai</label>
                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">Jabatan</label>
                            <select class="form-control" id="exampleSelectGender">
                                <option>Pegawai</option>
                                <option>Subkor</option>
                                <option>Kabag</option>
                                <option>Operator Persediaan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">Bidang</label>
                            <select class="form-control" id="exampleSelectGender">
                                <option>IPP</option>
                                <option>APD</option>
                                <option>Akuntan Negara</option>
                                <option>Keuangan</option>
                                <option>Kearsipan</option>
                                <option>Investigasi</option>
                                <option>Umum</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Pangkat Golongan</label>
                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Pangkat Golongan">
                        </div>
                        
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>