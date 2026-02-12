<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="card shadow-sm">

    <!-- HEADER -->
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h6 class="mb-0 fw-bold"><?= esc($title) ?></h6>
        <a href="<?= base_url($back ?? $url) ?>" class="btn btn-sm btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    <!-- BODY -->
    <form method="post" action="<?= base_url($action) ?>">
        <?= csrf_field() ?>

        <div class="card-body">

            <div class="row">

                <!-- KODE -->
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">
                        Kode <span class="text-danger">*</span>
                    </label>
                    <input type="text"
                           name="kode"
                           class="form-control form-control-sm"
                           value="<?= esc($data['kode'] ?? '') ?>"
                           placeholder="Contoh: 01"
                           required>
                </div>

                <!-- NAMA -->
                <div class="col-md-8 mb-3">
                    <label class="form-label fw-semibold">
                        Nama <span class="text-danger">*</span>
                    </label>
                    <input type="text"
                           name="nama"
                           class="form-control form-control-sm"
                           value="<?= esc($data['nama'] ?? '') ?>"
                           placeholder="Nama Jenis Instansi"
                           required>
                </div>

                <!-- STATUS -->
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Status Aktif</label>
                    <select name="aktif" class="form-select form-select-sm">
                        <option value="1" <?= isset($data) && $data['aktif']==1 ? 'selected' : '' ?>>
                            Aktif
                        </option>
                        <option value="0" <?= isset($data) && $data['aktif']==0 ? 'selected' : '' ?>>
                            Tidak Aktif
                        </option>
                    </select>
                </div>

            </div>
        </div>

        <!-- FOOTER -->
        <div class="card-footer bg-white text-end">
            <button type="submit" class="btn btn-sm btn-primary">
                <i class="bi bi-save"></i> Simpan
            </button>
            <a href="<?= base_url($back ?? $url) ?>" class="btn btn-sm btn-outline-secondary">
                Batal
            </a>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
