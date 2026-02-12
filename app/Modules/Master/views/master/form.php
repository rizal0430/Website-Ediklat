<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<form method="post" action="<?= base_url($url) ?>">
    <div class="card">
        <div class="card-header"><strong><?= $title ?></strong></div>

        <div class="card-body">
            <div class="mb-3">
                <label>Kode</label>
                <input type="text" name="kode" class="form-control"
                       value="<?= $data['kode'] ?? '' ?>" required>
            </div>

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control"
                       value="<?= $data['nama'] ?? '' ?>" required>
            </div>
        </div>

        <div class="card-footer text-end">
            <button class="btn btn-primary">Simpan</button>
            <a href="javascript:history.back()" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</form>

<?= $this->endSection() ?>
