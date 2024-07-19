<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Dashboard extends Controller
{
    public function index()
    {
        $hariIni = date('Y-m-d');
        $bulanIni = date('m') * 1;
        $tahunIni = date('Y');
        $nik = Auth::guard('karyawan')->user()->nik;

        $presensiHariIni = DB::table('absensi')
            ->where('nik', $nik)
            ->where('tgl_absen', $hariIni)
            ->first();

        $historiBulanIni = DB::table('absensi')
            ->where('nik', $nik)
            ->whereRaw("strftime('%m', tgl_absen) = ?", [$bulanIni])
            ->whereRaw("strftime('%Y', tgl_absen) = ?", [$tahunIni])
            ->orderBy('tgl_absen')
            ->get();

        $rekapPresensi = DB::table('absensi')
            ->selectRaw('COUNT(nik) as jmlHadir, SUM(CASE WHEN jam_in > "07:00" THEN 1 ELSE 0 END) as jmlTerlambat')
            ->where('nik', $nik)
            ->whereRaw("strftime('%m', tgl_absen) = ?", [$bulanIni])
            ->whereRaw("strftime('%Y', tgl_absen) = ?", [$tahunIni])
            ->first();

        $leaderboard = DB::table('absensi')
            ->join('karyawan', 'absensi.nik', '=', 'karyawan.nik')
            ->where('tgl_absen', $hariIni)
            ->orderBy('jam_in')
            ->get();

        $namaBulan = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        $rekapIjin = DB::table('perizinan')
            ->selectRaw('SUM(CASE WHEN keterangan = "i" THEN 1 ELSE 0 END) as izin, SUM(CASE WHEN keterangan = "s" THEN 1 ELSE 0 END) as sakit')
            ->where('nik', $nik)
            ->whereRaw("strftime('%m', tgl_izin) = ?", [$bulanIni])
            ->whereRaw("strftime('%Y', tgl_izin) = ?", [$tahunIni])
            ->where('laporan', 1)
            ->first();


        return view('index', compact('presensiHariIni', 'historiBulanIni', 'namaBulan', 'bulanIni', 'tahunIni', 'rekapPresensi', 'leaderboard', 'rekapIjin'));
    }
}
