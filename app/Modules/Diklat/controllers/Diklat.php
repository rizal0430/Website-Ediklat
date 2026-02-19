<?php

namespace App\Modules\Diklat\Controllers;

use App\Controllers\BaseController;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Modules\Diklat\Models\DiklatModel;
use App\Modules\Diklat\Models\PesertaModel;
use App\Modules\Diklat\Models\BiayaModel;

use App\Modules\Master\Models\DataInstansiModel;
use App\Modules\Master\Models\FakultasModel;
use App\Modules\Master\Models\KegiatanModel;

use App\Modules\Diklat\Models\PesertaDiklatModel;
use App\Modules\Diklat\Models\BiayaDiklatModel;

class Diklat extends BaseController
{
    protected $diklat;

    public function __construct()
    {
        $this->diklat = new DiklatModel();
    }

    

   public function index()
{
    $limit = $this->request->getGet('limit') ?? 10;

    $filter = [
        'instansi_id'   => $this->request->getGet('instansi_id'),
        'fakultas_id'   => $this->request->getGet('fakultas_id'),
        'kegiatan_id'   => $this->request->getGet('kegiatan_id'),
        'status_diklat' => $this->request->getGet('status_diklat'),
    ];

    $builder = $this->diklat->getFiltered($filter);

    if ($limit === 'all') {
        $data = $builder->get()->getResultArray();
        $pager = null;
    } else {
        $limit = (int) $limit;
        $data = $builder->get($limit)->getResultArray();
        $pager = null;
    }

    return view('diklat/index', [
        'data'     => $data,
        'pager'    => $pager,
        'instansi' => (new DataInstansiModel())->findAll(),
        'fakultas' => (new FakultasModel())->findAll(),
        'kegiatan' => (new KegiatanModel())->findAll(),
        'filter'   => $filter,
        'limit'    => $limit
    ]);
}


    public function store()
    {
        $no = 'D'.date('ymdHis');

        $instansi_id = $this->request->getPost('instansi_id');
        $fakultas_id = $this->request->getPost('fakultas_id');
        $kegiatan_id = $this->request->getPost('kegiatan_id');

        $instansi = (new \App\Modules\Master\Models\DataInstansiModel())->find($instansi_id);
        $jenis = $instansi['tipe'] ?? 'eksternal';

        $kegiatan = (new \App\Modules\Master\Models\KegiatanModel())->find($kegiatan_id);
        if (!$kegiatan) {
            return redirect()->back()->with('error', 'Kegiatan tidak valid');
        }

        $this->diklat->insert([
            'no_diklat'     => $no,
            'instansi_id'   => $instansi_id,
            'jenis'         => $jenis,
            'fakultas_id'   => $fakultas_id,
            'kegiatan_id'   => $kegiatan_id,
            'tgl_mulai'     => $this->request->getPost('tgl_mulai'),
            'tgl_akhir'     => $this->request->getPost('tgl_akhir'),
            'no_telp'       => $this->request->getPost('no_telp'),
            'ketua'         => $this->request->getPost('ketua'),
            'ruangan'       => $this->request->getPost('ruangan'),
            'keterangan'    => $this->request->getPost('keterangan'),
            'status_diklat' => $this->request->getPost('status_diklat') ?? 'belum',
            'status_bayar'  => 'belum',
            'total_biaya'   => 0
        ]);

        return redirect()->to(base_url('diklat'))->with('success','Diklat berhasil ditambahkan');
    }



   public function proses($id)
    {
    $row = $this->diklat->getDetail($id);

    if (!$row) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException();
    }

    $peserta = (new PesertaDiklatModel())
        ->where('diklat_id', $id)
        ->findAll();

    $biaya = (new BiayaDiklatModel())
        ->where('diklat_id', $id)
        ->findAll();

    return view('diklat/proses', compact('row','peserta','biaya'));
    }


   public function simpanProses($id)
{
    
    $db = \Config\Database::connect();
    $db->transStart();

    /* ================= UPDATE HEADER DIKLAT ================= */
    $db->table('data_diklat')->where('id', $id)->update([
        'ketua'         => $this->request->getPost('ketua'),
        'tgl_mulai'     => $this->request->getPost('tgl_mulai'),
        'tgl_akhir'     => $this->request->getPost('tgl_akhir'),
        'ruangan'       => $this->request->getPost('ruangan'),
        'no_telp'       => $this->request->getPost('no_telp'),
        'keterangan'    => $this->request->getPost('keterangan'),
        'status_diklat' => $this->request->getPost('status_diklat'),
    ]);

    /* ================= RESET DATA DETAIL ================= */
    $db->table('data_peserta_diklat')->where('diklat_id', $id)->delete();
    $db->table('data_biaya_diklat')->where('diklat_id', $id)->delete();

    /* ================= SIMPAN PESERTA ================= */
    $nama = $this->request->getPost('peserta_nama');

    if (is_array($nama)) {
        foreach ($nama as $i => $n) {
            if (trim($n) != '') {
                $db->table('data_peserta_diklat')->insert([
                    'diklat_id' => $id,
                    'nama'      => $n,
                    'nik'       => $this->request->getPost('peserta_id')[$i] ?? '',
                    'jk'        => $this->request->getPost('peserta_jk')[$i] ?? '',
                    'no_telp'   => $this->request->getPost('peserta_telp')[$i] ?? ''
                ]);
            }
        }
    }

    /* ================= SIMPAN BIAYA ================= */
    $total = 0;
    $tgl = $this->request->getPost('tgl');

    if (is_array($tgl)) {
        foreach ($tgl as $i => $t) {
            if (trim($t) != '') {
                $orang   = (int)($this->request->getPost('orang')[$i] ?? 0);
                $qty     = (int)($this->request->getPost('qty')[$i] ?? 0);
                $nominal = (int)($this->request->getPost('nominal')[$i] ?? 0);

                $sub = $orang * $qty * $nominal;
                $total += $sub;

                $db->table('data_biaya_diklat')->insert([
                    'diklat_id' => $id,
                    'tgl_input' => $t,
                    'tarif'     => $this->request->getPost('tarif')[$i] ?? '',
                    'orang'     => $orang,
                    'qty'       => $qty,
                    'nominal'   => $nominal,
                    'subtotal'  => $sub
                ]);
            }
        }
    }

    /* ================= UPDATE TOTAL ================= */
    $db->table('data_diklat')->where('id', $id)->update([
        'total_biaya'  => $total,
        'status_bayar'=> ($total > 0 ? 'lunas' : 'belum')
    ]);

    $db->transComplete();

    if ($db->transStatus() === false) {
        return redirect()->back()->with('error','Gagal menyimpan data');
    }

    /* ================= CETAK ATAU SIMPAN ================= */
    if ($this->request->getPost('aksi') == 'cetak') {
        return redirect()->to(base_url('diklat/cetak/'.$id));
    }

    return redirect()->to(base_url('diklat'))->with('success','Data berhasil disimpan');
}


  

    public function cetak($id)
{
    $diklat  = $this->diklat->getDetail($id);

    if (!$diklat) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
    }

    $peserta = (new PesertaDiklatModel())
        ->where('diklat_id', $id)
        ->findAll();

    $biaya = (new BiayaDiklatModel())
        ->where('diklat_id', $id)
        ->findAll();

    $html = view('diklat/cetak', [
        'diklat'  => $diklat,
        'peserta' => $peserta,
        'biaya'   => $biaya
    ]);

    $options = new Options();
    $options->set('isRemoteEnabled', true);
    $options->set('isHtml5ParserEnabled', true);
    $options->set('defaultFont', 'Helvetica');

    $pdf = new Dompdf($options);
    $pdf->loadHtml($html);
    $pdf->setPaper('A4', 'portrait');
    $pdf->render();

    $pdf->stream(
        'diklat-'.$diklat['no_diklat'].'.pdf',
        ['Attachment' => false]
    );

    exit;
}



    public function delete($id)
    {
        $db = \Config\Database::connect();
        $db->transStart();

        $db->table('data_peserta_diklat')->where('diklat_id',$id)->delete();
        $db->table('data_biaya_diklat')->where('diklat_id',$id)->delete();
        $db->table('data_diklat')->where('id',$id)->delete();

        $db->transComplete();

        return redirect()->to(base_url('diklat'))->with('success','Data berhasil dihapus');
    }

    
}
