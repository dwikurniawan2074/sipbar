<?= $this->extend('template/dashboard_user'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <?= form_open('/operator/laporan_barang_keluar',  ['target' => '_blank']) ?>
                <div class="card-body">
                    <h4 class="card-title">Laporan Barang Keluar</h4>
                    <p class="card-description">
                        Silahkan masukkan rentang tanggal permintaan dari laporan yang akan di generate
                    </p>
                    <form class="form-inline">
                        <div class="col-3">
                            Dari Tanggal : &nbsp;
                            <input type="date" name="tglawal" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Jane Doe" required>

                        </div>
                        <br>

                        <div class="col-3">
                            Sampai Tanggal : &nbsp;
                            <input type="date" name="tglakhir" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Jane Doe" required>

                        </div>
                        <div class="col-3">
                            Pilih Bidang : &nbsp;
                               <select class="form-control" id="exampleSelectGender" name="bidang">
                                <option value="" disabled selected>--Pilih Bidang--</option>
                                <?php foreach ($bidang as $key => $value) { ?>
                                    <option value="<?= $value['id']; ?>"><?= $value['nama_bidang']; ?></option>
                                <?php  }; ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary mb-2" style="margin-left: 15px; margin-top: 15px;">Generate</button>
                    </form>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>