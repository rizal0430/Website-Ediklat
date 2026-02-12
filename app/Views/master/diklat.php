<?= view('layout/main') ?>

<div class="container">
    <h3>Data Diklat</h3>
    <a href="<?= base_url('/diklat/create') ?>" class="btn btn-primary mb-2">+ Tambah Baru</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>No Diklat</th>
                <th>Instansi</th>
                <th>Fakultas</th>
                <th>Kegiatan</th>
                <th>Ketua</th>
                <th>Tgl Mulai</th>
                <th>Tgl Akhir</th>
                <th>Jumlah Minggu</th>
                <th>Biaya</th>
                <th>Status Diklat</th>
                <th>Status Bayar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($diklat)): ?>
            <?php $no=1; foreach($diklat as $d): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= esc($d['no_diklat']) ?></td>
                <td><?= esc($d['instansi']) ?></td>
                <td><?= esc($d['fakultas']) ?></td>
                <td><?= esc($d['kegiatan']) ?></td>
                <td><?= esc($d['ketua']) ?></td>
                <td><?= esc($d['tgl_mulai']) ?></td>
                <td><?= esc($d['tgl_akhir']) ?></td>
                <td><?= esc($d['jumlah_minggu']) ?></td>
                <td><?= number_format($d['biaya'],0,',','.') ?></td>
                <td><?= esc($d['status_diklat']) ?></td>
                <td><?= esc($d['status_bayar']) ?></td>
                <td>
                    <a href="<?= base_url('/diklat/edit/'.$d['id']) ?>" class="btn btn-warning btn-sm">Ubah</a>
                    <a href="<?= base_url('/diklat/delete/'.$d['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <tr><td colspan="13" class="text-center">Data tidak tersedia</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?= view('layout/main') ?>

<div class="container">
    <h3>Tambah Diklat</h3>

    <form action="<?= base_url('/diklat/store') ?>" method="post">
        <div class="mb-3">
            <label>No Diklat</label>
            <input type="text" name="no_diklat" class="form-control">
        </div>

        <div class="mb-3">
            <label>Instansi</label>
            <select name="instansi_id" class="form-control">
                <?php foreach($instansi as $i): ?>
                    <option value="<?= $i['id'] ?>"><?= $i['nama_instansi'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Fakultas</label>
            <select name="fakultas_id" class="form-control">
                <?php foreach($fakultas as $f): ?>
                    <option value="<?= $f['id'] ?>"><?= $f['nama_fakultas'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Kegiatan</label>
            <select name="kegiatan_id" class="form-control">
                <?php foreach($kegiatan as $k): ?>
                    <option value="<?= $k['id'] ?>"><?= $k['nama_kegiatan'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Ketua</label>
            <input type="text" name="ketua" class="form-control">
        </div>

        <div class="mb-3">
            <label>Tgl Mulai</label>
            <input type="date" name="tgl_mulai" class="form-control">
        </div>

        <div class="mb-3">
            <label>Tgl Akhir</label>
            <input type="date" name="tgl_akhir" class="form-control">
        </div>

        <div class="mb-3">
            <label>Jumlah Minggu</label>
            <input type="number" name="jumlah_minggu" class="form-control">
        </div>

        <div class="mb-3">
            <label>Biaya</label>
            <input type="number" name="biaya" class="form-control">
        </div>

        <div class="mb-3">
            <label>Status Diklat</label>
            <input type="text" name="status_diklat" class="form-control">
        </div>

        <div class="mb-3">
            <label>Status Bayar</label>
            <input type="text" name="status_bayar" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= base_url('/diklat') ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>
<?= view('layout/main') ?>

<div class="container">
    <h3>Edit Diklat</h3>

    <form action="<?= base_url('/diklat/update/'.$diklat['id']) ?>" method="post">
        <div class="mb-3">
            <label>No Diklat</label>
            <input type="text" name="no_diklat" class="form-control" value="<?= esc($diklat['no_diklat']) ?>">
        </div>

        <div class="mb-3">
            <label>Instansi</label>
            <select name="instansi_id" class="form-control">
                <?php foreach($instansi as $i): ?>
                    <option value="<?= $i['id'] ?>" <?= $i['id']==$diklat['instansi_id']?'selected':'' ?>><?= $i['nama_instansi'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Fakultas</label>
            <select name="fakultas_id" class="form-control">
                <?php foreach($fakultas as $f): ?>
                    <option value="<?= $f['id'] ?>" <?= $f['id']==$diklat['fakultas_id']?'selected':'' ?>><?= $f['nama_fakultas'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Kegiatan</label>
            <select name="kegiatan_id" class="form-control">
                <?php foreach($kegiatan as $k): ?>
                    <option value="<?= $k['id'] ?>" <?= $k['id']==$diklat['kegiatan_id']?'selected':'' ?>><?= $k['nama_kegiatan'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Ketua</label>
            <input type="text" name="ketua" class="form-control" value="<?= esc($diklat['ketua']) ?>">
        </div>

        <div class="mb-3">
            <label>Tgl Mulai</label>
            <input type="date" name="tgl_mulai" class="form-control" value="<?= esc($diklat['tgl_mulai']) ?>">
        </div>

        <div class="mb-3">
            <label>Tgl Akhir</label>
            <input type="date" name="tgl_akhir" class="form-control" value="<?= esc($diklat['tgl_akhir']) ?>">
        </div>

        <div class="mb-3">
            <label>Jumlah Minggu</label>
            <input type="number" name="jumlah_minggu" class="form-control" value="<?= esc($diklat['jumlah_minggu']) ?>">
        </div>

        <div class="mb-3">
            <label>Biaya</label>
            <input type="number" name="biaya" class="form-control" value="<?= esc($diklat['biaya']) ?>">
        </div>

        <div class="mb-3">
            <label>Status Diklat</label>
            <input type="text" name="status_diklat" class="form-control" value="<?= esc($diklat['status_diklat']) ?>">
        </div>

        <div class="mb-3">
            <label>Status Bayar</label>
            <input type="text" name="status_bayar" class="form-control" value="<?= esc($diklat['status_bayar']) ?>">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="<?= base_url('/diklat') ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>
