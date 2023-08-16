<?php

namespace App\Controllers;

use App\Models\AbsensiModel;
use App\Controllers\BaseController;

class Absen extends BaseController
{
    private $bulan = [
        '01'    => 'JANUARI',
        '02'    => 'FEBRUARI',
        '03'    => 'MARET',
        '04'    => 'APRIL',
        '05'    => 'MEI',
        '06'    => 'JUNI',
        '07'    => 'JULI',
        '08'    => 'AGUSTUS',
        '09'    => 'SEPTEMBER',
        '10'    => 'OKTOBER',
        '11'    => 'NOVEMBER',
        '12'    => 'DESEMBER',
    ];

    function __construct()
    {
        $this->absensi = new AbsensiModel();
    }

    public function index()
    {
        //
    }

    public function settingjam()
    {
        $data = [
            'title' => 'Jam Absen',
            'jamAbsen' => $this->absensi->getJamAbsen(),
        ];
        return view('admin/absensi/settingjam',$data);
    }

    public function aturlibur()
    {
        $data = [
            'title' => 'Libur',
            'weekend' => $this->absensi->getLiburWeekend(),
            'nasional' => $this->absensi->getLiburNasional(),
        ];
        return view('admin/absensi/aturlibur',$data);
    }
}
