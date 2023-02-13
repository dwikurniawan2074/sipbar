<?= $this->extend('template/dashboard_user'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <div class="row">

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Input Data Jabatan</h4>
                    <?= form_open('admin/tambah_jabatan') ?>
                    <?= csrf_field(); ?>
                    <form class="forms-sample">
                        <div class="form-group">
                            <label for="exampleInputName1">Nama Jabatan</label>
                            <input type="text" class="form-control" name="nama_jabatan" id="exampleInputName1" placeholder="Nama" required>
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