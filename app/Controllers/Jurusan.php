<?php

namespace App\Controllers;

use App\Models\JurusanModel;
use CodeIgniter\RESTful\ResourceController;

class Jurusan extends ResourceController
{

    function __construct()
    {
        helper(['url','form']);
        $this->jurusan = new JurusanModel();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
            'title'=> 'Data Jurusan',
            'jurusan' => $this->jurusan->findAll(),
            // 'validation' => \Config\Services::validation(),
        ];
        return view('admin/jurusan/index',$data);
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
        helper(['form']);
        // Validasi
        $validate = [
            'nama_jurusan'        => [
                'rules'         => 'required|min_length[3]',
                'errors'        => [
                    'required'      => 'Nama jurusan tidak boleh kosong',
                    'min_length'    => 'Nama jurusan Minimal 3 karakter',
                ],
            ],
        ];
        if (!$validate) {
            return redirect()->back()->withInput();
        }
        // Insert data
        $data = $this->request->getPost();
        $this->jurusan->insert($data);
        return redirect()->to(site_url('jurusan'))->with('pesan', 'Data berhasil ditambahkan 👍');

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
            'nama_jurusan'        => [
                'rules'         => 'required|min_length[3]',
                'errors'        => [
                    'required'      => 'Nama jurusan tidak boleh kosong',
                    'min_length'    => 'Nama jurusan Minimal 3 karakter',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput();
        }

        // Update data
        $data = $this->request->getPost();
        $this->jurusan->update($id, $data);
        return redirect()->to(site_url('jurusan'))->with('pesan', 'Data Berhasil Diperbarui 👌');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->jurusan->delete($id);
        return redirect()->to(site_url('jurusan'))->with('pesan','Data berhasil dihapus 😭');
    }
}
