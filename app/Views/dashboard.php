
<h1 style="color:red">INI DASHBOARD MODULE</h1>
<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h5 class="fw-bold mb-1">Dashboard Laporan Diklat</h5>
<p class="text-muted">Ringkasan data pelatihan internal & eksternal</p>

<div class="row g-3 mb-4">

    <div class="col-md-3">
        <div class="card bg-primary text-white shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <small>Total</small>
                        <h6>Diklat</h6>
                        <h2><?= $total_diklat ?></h2>
                    </div>
                    <i class="bi bi-journal-text fs-1"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card bg-success text-white shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <small>Total</small>
                        <h6>Peserta</h6>
                        <h2><?= $total_peserta ?></h2>
                    </div>
                    <i class="bi bi-people fs-1"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card bg-warning shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <small>Peserta</small>
                        <h6>Internal</h6>
                        <h2><?= $internal ?></h2>
                    </div>
                    <i class="bi bi-person-badge fs-1"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card bg-danger text-white shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <small>Peserta</small>
                        <h6>Eksternal</h6>
                        <h2><?= $eksternal ?></h2>
                    </div>
                    <i class="bi bi-people-fill fs-1"></i>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row">

    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white fw-bold">Peserta Per Fakultas</div>
            <div class="card-body p-0">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th width="50">No</th>
                            <th>Fakultas</th>
                            <th width="120" class="text-center">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($perFakultas as $i => $r): ?>
                        <tr>
                            <td><?= $i+1 ?></td>
                            <td><?= esc($r['fakultas']) ?></td>
                            <td class="text-center fw-bold"><?= $r['jumlah'] ?></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white fw-bold">Peserta Per Instansi</div>
            <div class="card-body p-0">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th width="50">No</th>
                            <th>Instansi</th>
                            <th width="120" class="text-center">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($perInstansi as $i => $r): ?>
                        <tr>
                            <td><?= $i+1 ?></td>
                            <td><?= esc($r['instansi']) ?></td>
                            <td class="text-center fw-bold"><?= $r['jumlah'] ?></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>
