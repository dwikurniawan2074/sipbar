<?= $this->extend('template/dashboard_user'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Input Data Barang</h4>
                    <p class="card-description">
                        Silahkan masukkan data barang yang sesuai
                    </p>
                    <form class="forms-sample">
                        <div class="form-group">
                            <label for="exampleInputName1">Kode Barang</label>
                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Kode Barang">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Nama Barang</label>
                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Nama Barang">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Stok Awal</label>
                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Stok Awal">
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">Keterangan</label>
                            <select class="form-control" id="exampleSelectGender">
                                <option>Sudah Opname</option>
                                <option>Belum Opname</option>
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