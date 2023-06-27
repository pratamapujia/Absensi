<?php

namespace App\Controllers;

use App\Models\KelasModel;
use CodeIgniter\RESTful\ResourceController;

class Kelas extends ResourceController
{
    function __construct()
    {
        $this->kelas = new KelasModel();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
            'kelas' => $this->kelas->findAll(),
            'validation' => \Config\Services::validation(),
        ];
        return view('admin/kelas/index',$data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
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
        // Validasi
        $validate = $this->validate([
            'nama_kelas'       => [
                'rules'     => 'required|min_length[3]',
                'errors'    => [
                    'required' => 'Nama kelas tidak boleh kosong!',
                    'min_length' => 'Nama kelas minimal 3 karakter',
                ],
            ],
            'kode_kelas'       => [
                'rules'     => 'required',
                'errors'    => [
                    'required' => 'Kelas tidak boleh kosong!',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput();
        }
        $data = $this->request->getPost();
        $this->kelas->insert($data);
        return redirect()->to(site_url('kelas'))->with('pesan', 'Data berhasil disimpan 👍');
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
        // Validasi
        $validate = $this->validate([
            'nama_kelas'       => [
                'rules'     => 'required|min_length[3]',
                'errors'    => [
                    'required' => 'Nama kelas tidak boleh kosong!',
                    'min_length' => 'Nama kelas minimal 3 karakter',
                ],
            ],
            'kode_kelas'       => [
                'rules'     => 'required',
                'errors'    => [
                    'required' => 'Kelas tidak boleh kosong!',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput();
        }

        // Update data
        $data = $this->request->getPost();
        $this->kelas->update($id, $data);
        return redirect()->to(site_url('kelas'))->with('pesan', 'Data Berhasil Diperbarui 👌');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->kelas->delete($id);
        return redirect()->to(site_url('kelas'))->with('pesan','Data berhasil dihapus 😭');
    }
}
