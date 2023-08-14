<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\KelasModel;
use App\Models\JurusanModel;
use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index()
    {
        $this->siswa = new SiswaModel();
        $this->kelas = new KelasModel();
        $this->jurusan = new JurusanModel();

        $data = [
            'totalSiswa' => $this->siswa->totalSiswa(),
            'totalKelas' => $this->kelas->totalKelas(),
            'totalJurusan' => $this->jurusan->totalJurusan(),
        ];

        return view('admin/index', $data);
    }
}
