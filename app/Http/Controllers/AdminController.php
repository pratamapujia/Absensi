<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $hariIni = date('Y-m-d');

        $rekapPresensi = DB::table('absensi')
            ->selectRaw('COUNT(nik) as jmlHadir, SUM(CASE WHEN jam_in > "07:00" THEN 1 ELSE 0 END) as jmlTerlambat')
            ->where('tgl_absen', $hariIni)
            ->first();

        $rekapIzin = DB::table('perizinan')
            ->selectRaw('SUM(CASE WHEN keterangan = "i" THEN 1 ELSE 0 END) as izin, SUM(CASE WHEN keterangan = "s" THEN 1 ELSE 0 END) as sakit')
            ->where('tgl_izin', $hariIni)
            ->where('laporan', 1)
            ->first();
        return view('admin.index', compact('rekapPresensi', 'rekapIzin'));
    }
}
