<!DOCTYPE html>
<html>
<head>
    <title>Test API Diklat</title>
</head>
<body>

<h2>Test API POST Diklat</h2>

<form method="post" action="<?= base_url('api/diklat') ?>">

    <input type="text" name="no_diklat" placeholder="No Diklat"><br><br>
    <input type="text" name="instansi_id" placeholder="Instansi ID"><br><br>
    <input type="text" name="fakultas_id" placeholder="Fakultas ID"><br><br>
    <input type="text" name="kegiatan_id" placeholder="Kegiatan ID"><br><br>
    <input type="text" name="ketua" placeholder="Ketua"><br><br>
    <input type="text" name="no_telp" placeholder="No Telp"><br><br>
    <input type="text" name="ruangan" placeholder="Ruangan"><br><br>
    <input type="text" name="keterangan" placeholder="Keterangan"><br><br>
    <input type="date" name="tgl_mulai"><br><br>
    <input type="date" name="tgl_akhir"><br><br>
    <input type="text" name="status_diklat" placeholder="Status Diklat"><br><br>
    <input type="text" name="status_bayar" placeholder="Status Bayar"><br><br>
    <input type="text" name="total_biaya" placeholder="Total Biaya"><br><br>

    <button type="submit">Kirim ke API</button>

</form>

</body>
</html>
