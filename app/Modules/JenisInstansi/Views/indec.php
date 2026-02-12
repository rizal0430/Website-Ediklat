<h3>Jenis Instansi</h3>

<form method="post" action="/jenis-instansi/store">
    <input name="kode" placeholder="Kode" required>
    <input name="nama" placeholder="Nama Jenis Instansi" required>
    <button type="submit">Tambah</button>
</form>

<hr>

<table border="1" cellpadding="5">
    <tr>
        <th>No</th>
        <th>Kode</th>
        <th>Nama</th>
        <th>Aksi</th>
    </tr>
    <?php $no=1; foreach($jenis as $j): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $j['kode'] ?></td>
        <td><?= $j['nama'] ?></td>
        <td>
            <a href="/jenis-instansi/delete/<?= $j['id'] ?>">Hapus</a>
        </td>
    </tr>
    <?php endforeach ?>
</table>
