<?php

namespace App\Controllers;

use App\Models\KelasModel;
use CodeIgniter\RESTful\ResourceController;

class ByKelas extends ResourceController
{

    function __construct()
    {
        // $this->siswa = new SiswaModel();
        // $this->jurusan = new JurusanModel();
        $this->kelas = new KelasModel();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $kelas = $this->kelas->orderBy('nama_kelas','ASC')->findAll();
        $jumlahSiswa = [];
        foreach ($kelas as $key => $value) {
            $jumlahSiswa[$value->id_kelas] = $this->kelas->JumlahSiswaPerKelas($value->id_kelas);
        }

        $data = [
            'title' => 'Data Siswa per Kelas',
            'kelas' => $kelas,
            'jumlahSiswa' => $jumlahSiswa,
            
        ];
        return view('admin/bykelas/index',$data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $data = [
            'title' => 'Data Siswa Kelas',
            'siswa' => $this->kelas->getSiswaByKelas($id),
            'title_kelas' => $this->kelas->find($id)->nama_kelas,
        ];
        return view('admin/bykelas/show',$data);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
