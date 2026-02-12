<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>


<div class="card shadow-sm">
<div class="card-header bg-white">
<h6 class="fw-bold mb-0">Dashboard Grafik Laporan Diklat Tahun <?= $tahun ?></h6>
</div>


<div class="card-body">


<form method="get" class="row mb-3">
<div class="col-md-3">
<select name="tahun" class="form-select form-select-sm" onchange="this.form.submit()">
<?php for($i=date('Y'); $i>=2020; $i--): ?>
<option value="<?= $i ?>" <?= $i==$tahun?'selected':'' ?>><?= $i ?></option>
<?php endfor ?>
</select>
</div>
</form>


<canvas id="grafik"></canvas>


</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('grafik');


new Chart(ctx, {
type: 'bar',
data: {
labels: <?= $bulan ?>,
datasets: [
{
label: 'Internal',
data: <?= $internal ?>,
borderWidth: 1
},
{
label: 'Eksternal',
data: <?= $eksternal ?>,
borderWidth: 1
}
]
},
options: {
responsive: true,
plugins: {
legend: { position: 'top' }
}
}
});
</script>


<?= $this->endSection() ?>