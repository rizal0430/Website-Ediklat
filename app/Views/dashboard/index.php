<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="container-fluid">

    <h5 class="fw-bold mb-1">Dashboard Laporan Diklat</h5>
    <p class="text-muted mb-4">Ringkasan data pelatihan internal & eksternal</p>

    <div class="row g-3 mb-3">

        <div class="col-md-3">
            <div class="card bg-primary text-white shadow-sm border-0">
                <div class="card-body">
                    <small>Total</small>
                    <h6>Diklat</h6>
                    <h2 class="fw-bold"><?= $total_diklat ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-success text-white shadow-sm border-0">
                <div class="card-body">
                    <small>Total</small>
                    <h6>Peserta</h6>
                    <h2 class="fw-bold"><?= $total_peserta ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-warning shadow-sm border-0">
                <div class="card-body">
                    <small>Peserta</small>
                    <h6>Internal</h6>
                    <h2 class="fw-bold"><?= $peserta_internal ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-danger text-white shadow-sm border-0">
                <div class="card-body">
                    <small>Peserta</small>
                    <h6>Eksternal</h6>
                    <h2 class="fw-bold"><?= $peserta_eksternal ?></h2>
                </div>
            </div>
        </div>

    </div>

    <div class="row g-3">

        <div class="col-md-6">
            <div class="card shadow-sm border-0 text-center">
                <div class="card-body">
                    <h6 class="fw-bold">Diklat Internal</h6>
                    <h2 class="fw-bold text-warning"><?= $diklat_internal ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm border-0 text-center">
                <div class="card-body">
                    <h6 class="fw-bold">Diklat Eksternal</h6>
                    <h2 class="fw-bold text-danger"><?= $diklat_eksternal ?></h2>
                </div>
            </div>
        </div>

    </div>

</div>

<?= $this->endSection() ?>
