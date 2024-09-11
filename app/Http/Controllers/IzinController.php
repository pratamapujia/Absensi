<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IzinController extends Controller
{
    public function index()
    {
        $izinsakit = DB::table('perizinan')
            ->join('karyawan', 'perizinan.nik', '=', 'karyawan.nik')
            ->orderBy('tgl_izin', 'desc')->get();
        return view('admin.izin.index', compact('izinsakit'));
    }

    public function update(Request $request, string $id)
    {
        $status = $request->input('laporan'); // Validate and sanitize input
        return DB::table('perizinan')->where('id_perizinan', $id)->update(['laporan' => $status])
            ? redirect()->back()->with('pesan', 'Data berhasil Diperbarui 👍')
            : redirect()->back()->with('gagal', 'Data gagal Diperbarui 😭');
    }

    public function cancel(int $id)
    {
        return DB::table('perizinan')->where('id_perizinan', $id)->update(['laporan' => 0])
            ? redirect()->back()->with('pesan', 'Data berhasil Dibatalkan 👍')
            : redirect()->back()->with('gagal', 'Data gagal Dibatalkan 😭');
    }
}
