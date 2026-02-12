

<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<h1 style="color:red">INI DASHBOARD MODULE</h1>
<h5 class="fw-bold mb-1">Dashboard Laporan Diklat</h5>
<p class="text-muted">Ringkasan data pelatihan internal & eksternal</p>

<div class="row g-3">

    <!-- Total Diklat -->
    <div class="col-md-3">
        <div class="card bg-primary text-white shadow-sm border-0">
            <div class="card-body">
                <div class="small">Total</div>
                <h6>Diklat</h6>
                <h2 class="fw-bold"><?= $total_diklat ?></h2>
            </div>
        </div>
    </div>

    <!-- Total Peserta -->
    <div class="col-md-3">
        <div class="card bg-success text-white shadow-sm border-0">
            <div class="card-body">
                <div class="small">Total</div>
                <h6>Peserta</h6>
                <h2 class="fw-bold"><?= $total_peserta ?></h2>
            </div>
        </div>
    </div>

    <!-- Peserta Internal -->
    <div class="col-md-3">
        <div class="card bg-warning shadow-sm border-0">
            <div class="card-body">
                <div class="small">Peserta</div>
                <h6>Internal</h6>
                <h2 class="fw-bold"><?= $peserta_internal ?></h2>
            </div>
        </div>
    </div>

    <!-- Peserta Eksternal -->
    <div class="col-md-3">
        <div class="card bg-danger text-white shadow-sm border-0">
            <div class="card-body">
                <div class="small">Peserta</div>
                <h6>Eksternal</h6>
                <h2 class="fw-bold"><?= $peserta_eksternal ?></h2>
            </div>
        </div>
    </div>

</div>

<div class="row g-3 mt-1">

    <!-- Diklat Internal -->
    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-body text-center">
                <h6>Diklat Internal</h6>
                <h2 class="fw-bold text-warning"><?= $diklat_internal ?></h2>
            </div>
        </div>
    </div>

    <!-- Diklat Eksternal -->
    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-body text-center">
                <h6>Diklat Eksternal</h6>
                <h2 class="fw-bold text-danger"><?= $diklat_eksternal ?></h2>
            </div>
        </div>
    </div>
        <div class="col-md-3">
            <div class="card text-white bg-primary shadow-sm border-0">
                <div class="card-body">
                    <div class="small">Total</div>
                    <h6>Diklat</h6>
                    <h2 class="fw-bold"><?= $total_diklat ?></h2>
                </div>
            </div>
        </div>

</div>

Pie Chart
<canvas id="chartDiklat" class="mt-3"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const data = <?= json_encode($chart) ?>;
const labels = data.map(item => item.tipe);
const totals = data.map(item => item.total);

new Chart(document.getElementById('chartDiklat'), {
    type: 'pie',
    data: {
        labels: labels,
        datasets: [{
            data: totals,
            backgroundColor: ['#ffc107', '#dc3545']
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom'
            }
        }
    }
});
</script>

<?= $this->endSection() ?>
