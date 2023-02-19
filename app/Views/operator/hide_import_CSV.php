<?php
$csv = [
    'name' => 'csv',
    'id' => 'csv'
];

$submit = [
    'name' => 'submit',
    'id' => 'submit',
    'value' => 'Submit',
    'class' => 'btn btn-primary',
    'type' => 'submit'
];
?>
<?= $this->extend('template/dashboard_user'); ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Tambah data</h4>
                <p class="card-category">Menu Tambah Data Barang</p>
            </div>
            <div class="card-body">
                <?= form_open_multipart('/operator/save_hide_import_CSV') ?>
                <?= form_upload($csv) ?>
                <?= form_submit($submit) ?>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>