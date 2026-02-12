<?php
namespace App\Modules\Diklat\Models;

use CodeIgniter\Model;

class DiklatModel extends Model
{
    protected $table = 'data_diklat';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'no_diklat','instansi_id','fakultas_id','kegiatan_id',
        'ketua','tgl_mulai','tgl_akhir','jumlah_minggu','biaya',
        'status_diklat','status_bayar','jenis','jumlah_peserta'
    ];

}
