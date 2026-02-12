<?php
namespace App\Modules\Diklat\Controllers;

use App\Modules\Diklat\Models\DiklatModel;
use App\Modules\Diklat\Models\DataInstansiModel;
use App\Modules\Diklat\Models\FakultasModel;
use App\Modules\Diklat\Models\KegiatanModel;

class Diklat extends \CodeIgniter\Controller
{
    protected $diklatModel;
    protected $instansiModel;
    protected $fakultasModel;
    protected $kegiatanModel;

    public function __construct()
    {
        $this->diklatModel = new DiklatModel();
        $this->instansiModel = new DataInstansiModel();
        $this->fakultasModel = new FakultasModel();
        $this->kegiatanModel = new KegiatanModel();
    }

    public function index()
    {
        $diklat = $this->diklatModel
            ->select('data_diklat.*, instansi.nama_instansi as instansi, fakultas.nama_fakultas as fakultas, kegiatan.nama_kegiatan as kegiatan')
            ->join('instansi','instansi.id = data_diklat.instansi_id','left')
            ->join('fakultas','fakultas.id = data_diklat.fakultas_id','left')
            ->join('kegiatan','kegiatan.id = data_diklat.kegiatan_id','left')
            ->findAll();

        return view('diklat/index', ['diklat' => $diklat]);
    }

    public function create()
    {
        return view('diklat/create', [
            'instansi' => $this->instansiModel->findAll(),
            'fakultas' => $this->fakultasModel->findAll(),
            'kegiatan' => $this->kegiatanModel->findAll()
        ]);
    }

    public function store()
    {
        $this->diklatModel->save($this->request->getPost());
        return redirect()->to('/diklat');
    }

    public function edit($id)
    {
        return view('diklat/edit', [
            'diklat' => $this->diklatModel->find($id),
            'instansi' => $this->instansiModel->findAll(),
            'fakultas' => $this->fakultasModel->findAll(),
            'kegiatan' => $this->kegiatanModel->findAll()
        ]);
    }

    public function update($id)
    {
        $this->diklatModel->update($id, $this->request->getPost());
        return redirect()->to('/diklat');
    }

    public function delete($id)
    {
        $this->diklatModel->delete($id);
        return redirect()->to('/diklat');
    }
}
