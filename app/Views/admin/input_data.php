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
                    <?= form_open('admin/tambah_akun') ?>
                    <?= csrf_field(); ?>
                    <form class="forms-sample">
                        <div class="form-group">
                            <label for="exampleInputName1">NIP</label>
                            <input type="text" class="form-control" name="nip" id="exampleInputName1" placeholder="NIP" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Nama Pegawai</label>
                            <input type="text" class="form-control" name="nama" id="exampleInputName1" placeholder="Nama" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">Pangkat</label>
                            <select class="form-control" id="exampleSelectGender" name="id_pangkat" required>
                                <?php foreach ($pangkat as $key => $value) { ?>
                                    <option value="<?= $value['id']; ?>"><?= $value['nama_pangkat']; ?></option>
                                <?php }; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">Bidang</label>
                            <select class="form-control" id="exampleSelectGender" name="id_bidang" required>
                                <?php foreach ($bidang as $key => $value) { ?>
                                    <option value="<?= $value['id']; ?>"><?= $value['nama_bidang']; ?></option>
                                <?php  }; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Jabatan</label>
                            <input type="text" class="form-control" name="jabatan" id="exampleInputName1" placeholder="Jabatan" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">Role</label>
                            <select class="form-control" id="exampleSelectGender" name="id_role" required>
                                <?php foreach ($role as $key => $value) { ?>
                                <option value="<?= $value['id']; ?>"><?= $value['deskripsi_role']; ?></option>
                                <?php }; ?>
                            </select>
                        </div>


                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>