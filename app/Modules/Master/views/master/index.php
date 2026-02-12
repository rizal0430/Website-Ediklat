<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="card">
    <div class="card-header d-flex justify-content-between">
        <strong><?= $title ?></strong>
        <a href="<?= base_url($url . '/create') ?>" class="btn btn-sm btn-primary">Tambah</a>
    </div>

    <table class="table table-bordered mb-0">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th width="120">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($data as $row): ?>
            <tr>
                <td><?= $row['kode'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td>
                    <a href="<?= base_url($url.'/edit/'.$row['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="<?= base_url($url.'/delete/'.$row['id']) ?>" class="btn btn-sm btn-danger"
                       onclick="return confirm('Hapus data?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
