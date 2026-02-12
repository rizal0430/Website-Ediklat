

<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<h1 style="color:red">INI DASHBOARD MODULE</h1>
<div class="container-fluid">

    <div class="row g-3">

        <div class="col-md-4">
            <div class="card shadow-sm border-0 text-center">
                <div class="card-body">
                    <h6 class="text-muted">Total Diklat</h6>
                    <h2 class="fw-bold text-primary"><?= $total_diklat ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 text-center">
                <div class="card-body">
                    <h6 class="text-muted">Total Peserta</h6>
                    <h2 class="fw-bold text-success"><?= $total_peserta ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 text-center">
                <div class="card-body">
                    <h6 class="text-muted">Peserta Internal</h6>
                    <h2 class="fw-bold text-warning"><?= $peserta_internal ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 text-center">
                <div class="card-body">
                    <h6 class="text-muted">Peserta Eksternal</h6>
                    <h2 class="fw-bold text-danger"><?= $peserta_eksternal ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 text-center">
                <div class="card-body">
                    <h6 class="text-muted">Diklat Internal</h6>
                    <h2 class="fw-bold text-primary"><?= $diklat_internal ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 text-center">
                <div class="card-body">
                    <h6 class="text-muted">Diklat Eksternal</h6>
                    <h2 class="fw-bold text-danger"><?= $diklat_eksternal ?></h2>
                </div>
            </div>
        </div>

    </div>


</div>

<?= $this->endSection() ?>
