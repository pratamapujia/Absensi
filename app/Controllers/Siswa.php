<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\JurusanModel;
use App\Models\KelasModel;
use CodeIgniter\RESTful\ResourceController;

class Siswa extends ResourceController
{

    function __construct()
    {
        helper(['url','form']);
        $this->siswa = new SiswaModel();
        $this->jurusan = new JurusanModel();
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
            'title' => 'Data Siswa',
            'siswa' => $this->siswa->getAll(),
        ];
        return view('admin/siswa/index',$data);
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
        $data = [
            'title' => 'Tambah Siswa',
            // 'validation' => \Config\Services::validation(),
            'jurusan' => $this->jurusan->findAll(),
            'kelas' => $this->kelas->findAll(),
        ];
        return view('admin/siswa/new',$data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        helper(['form']);
        $validation = \Config\Services::validation();
        // Validasi
        $validate = [
            'nama_siswa'        => [
                'rules'         => 'required|min_length[3]',
                'errors'        => [
                    'required'      => 'Nama siswa tidak boleh kosong',
                    'min_length'    => 'Nama siswa Minimal 3 karakter',
                ],
            ],
            'nis'        => [
                'rules'         => 'required|numeric|min_length[3]|is_unique[siswa.nis]',
                'errors'        => [
                    'required'      => 'NIS siswa tidak boleh kosong',
                    'numeric'       => 'NIS hanya boleh diisi angka',
                    'min_length'    => 'NIS siswa Minimal 3 karakter',
                    'is_unique'     => 'NIS sudah ada'
                ],
            ],
            'telepone_siswa'       => [
                'rules'         => 'required|min_length[10]|numeric',
                'errors'        => [
                    'required'      => 'No Telephone tidak boleh kosong',
                    'min_length'    => 'No Telephone Minimal 10 karakter',
                    'numeric'       => 'No Telephone hanya boleh diisi angka',
                ],
            ],
            'tgl_lahir'   => [
                'rules'         => 'required',
                'errors'        => [
                    'required'      => 'Tanggal lahir tidak boleh kosong',
                ],
            ],
            'jenis_kelamin'   => [
                'rules'         => 'required',
                'errors'        => [
                    'required'      => 'Pilih salah satu',
                ],
            ],
            'alamat_siswa'      => [
                'rules'         => 'required',
                'errors'        => [
                    'required'      => 'Alamat tidak boleh kosong',
                ],
            ],
            'foto_siswa'       => [
                'rules'         => 'uploaded[foto_siswa]|max_size[foto_siswa,1024]|is_image[foto_siswa]|mime_in[foto_siswa,image/jpg,image/jpeg,image/png]',
                'errors'        => [
                    'uploaded'      => 'Pilih gambar barang terlebih dahulu',
                    'max_size'      => 'Gambar terlalu besar *(max 1mb)',
                    'is_image'      => 'Format file yang anda pilih salah',
                    'mime_in'       => 'Format file yang anda pilih salah',
                ],
            ],
            'id_kelas'        => [
                'rules'         => 'required',
                'errors'        => [
                    'required'      => 'Pilih salah satu',
                ],
            ],
            'id_jurusan'        => [
                'rules'         => 'required',
                'errors'        => [
                    'required'      => 'Pilih salah satu',
                ],
            ],
        ];
        if (!$this->validate($validate)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil Gambar
        $fileFoto = $this->request->getFile('foto_siswa');

        // Jika tidak foto kosong
        if ($fileFoto->getError() == 4) {
            $namaFoto = 'default.png';
        } else {
            // jika ada foto
            // $namaFoto = $fileFoto->getRandomName();
            $namaFoto = 'fs_' . bin2hex(random_bytes(3)). '_' . date('d-m-Y') .'.jpg';
        }

        // Memindahkan foto ke folder
        $fileFoto->move('assets/static/images/foto_siswa',$namaFoto);

        // $data = $this->request->getPost();
        $data = [
            'nama_siswa'    => $this->request->getPost('nama_siswa'),
            'nis'           => $this->request->getPost('nis'),
            'tgl_lahir'     => $this->request->getPost('tgl_lahir'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'id_kelas'      => $this->request->getPost('id_kelas'),
            'id_jurusan'    => $this->request->getPost('id_jurusan'),
            'telepone_siswa'=> $this->request->getPost('telepone_siswa'),
            'alamat_siswa'  => $this->request->getPost('alamat_siswa'),
            'foto_siswa'    => $namaFoto,
        ];
        $this->siswa->insert($data);
        return redirect()->to(site_url('siswa'))->with('pesan', 'Data berhasil disimpan 👍');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $siswa = $this->siswa->find($id);
        if (is_object($siswa)) {
            $data = [
                'title' => 'Edit Siswa',
                'siswa' => $siswa,
                'jurusan' => $this->jurusan->findAll(),
                'kelas' => $this->kelas->findAll(),
                'validation' => \Config\Services::validation(),
            ];
            return view('admin/siswa/edit',$data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        helper(['form']);
        $validation = \Config\Services::validation();
        // Validasi
        $validate = [
            'nama_siswa'        => [
                'rules'         => 'required|min_length[3]',
                'errors'        => [
                    'required'      => 'Nama siswa tidak boleh kosong',
                    'min_length'    => 'Nama siswa Minimal 3 karakter',
                ],
            ],
            'nis'        => [
                'rules'         => 'required|numeric|min_length[3]',
                'errors'        => [
                    'required'      => 'NIS siswa tidak boleh kosong',
                    'numeric'       => 'NIS hanya boleh diisi angka',
                    'min_length'    => 'NIS siswa Minimal 3 karakter',
                ],
            ],
            'telepone_siswa'       => [
                'rules'         => 'required|min_length[10]|numeric',
                'errors'        => [
                    'required'      => 'No Telephone tidak boleh kosong',
                    'min_length'    => 'No Telephone Minimal 10 karakter',
                    'numeric'       => 'No Telephone hanya boleh diisi angka',
                ],
            ],
            'tgl_lahir'   => [
                'rules'         => 'required',
                'errors'        => [
                    'required'      => 'Tanggal lahir tidak boleh kosong',
                ],
            ],
            'jenis_kelamin'   => [
                'rules'         => 'required',
                'errors'        => [
                    'required'      => 'Pilih salah satu',
                ],
            ],
            'alamat_siswa'      => [
                'rules'         => 'required',
                'errors'        => [
                    'required'      => 'Alamat tidak boleh kosong',
                ],
            ],
            'foto_siswa'       => [
                'rules'         => 'max_size[foto_siswa,1024]|is_image[foto_siswa]|mime_in[foto_siswa,image/jpg,image/jpeg,image/png]',
                'errors'        => [
                    'max_size'      => 'Gambar terlalu besar *(max 1mb)',
                    'is_image'      => 'Format file yang anda pilih salah',
                    'mime_in'       => 'Format file yang anda pilih salah',
                ],
            ],
            'id_kelas'        => [
                'rules'         => 'required',
                'errors'        => [
                    'required'      => 'Pilih salah satu',
                ],
            ],
            'id_jurusan'        => [
                'rules'         => 'required',
                'errors'        => [
                    'required'      => 'Pilih salah satu',
                ],
            ],
        ];
        if (!$this->validate($validate)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil Gambar
        $fileFoto = $this->request->getFile('foto_siswa');

        // Jika tidak foto kosong
        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getPost('foto_lama');
        } else {
            // jika ada foto
            // $namaFoto = $fileFoto->getRandomName();
            $namaFoto = 'fs_' . bin2hex(random_bytes(3)) . '_' . date('d-m-Y') . '.jpg';
            // Memindahkan foto ke folder
            $fileFoto->move('assets/static/images/foto_siswa',$namaFoto);
            unlink('assets/static/images/foto_siswa/'.$this->request->getPost('foto_lama'));
        }


        // $data = $this->request->getPost();
        $data = [
            'nama_siswa'    => $this->request->getPost('nama_siswa'),
            'nis'           => $this->request->getPost('nis'),
            'tgl_lahir'     => $this->request->getPost('tgl_lahir'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'id_kelas'      => $this->request->getPost('id_kelas'),
            'id_jurusan'    => $this->request->getPost('id_jurusan'),
            'telepone_siswa'=> $this->request->getPost('telepone_siswa'),
            'alamat_siswa'  => $this->request->getPost('alamat_siswa'),
            'foto_siswa'    => $namaFoto,
        ];
        $this->siswa->update($id,$data);
        return redirect()->to(site_url('siswa'))->with('pesan', 'Data berhasil diperbarui 👌');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $img = $this->siswa->find($id);
        unlink('assets/static/images/foto_siswa/' . $img->foto_siswa);
        // Hapus Permanen
        $this->siswa->delete($id);
        return redirect()->to(site_url('siswa'))->with('pesan', 'Data berhasil dihapus 😭');
    }
}
