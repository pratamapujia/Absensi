<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KonfigurasiController extends Controller
{
    // Konfigurasi Lokasi
    public function setLokasi()
    {
        $lok_kantor = DB::table('lokasi')->where('id', 1)->first();
        return view('admin.konfigurasi.lokasi', compact('lok_kantor'));
    }

    public function updateLokasi(Request $request)
    {
        $koor = $request->koordinat;
        $radius = $request->radius;
        $lok = DB::table('lokasi')->where('id', 1)->update([
            'koordinat' => $koor,
            'radius' => $radius,
        ]);

        if ($lok) {
            return redirect()->back()->with('pesan', 'Data berhasil Diperbarui 👍');
        } else {
            return redirect()->back()->with('gagal', 'Data gagal Diperbarui 😭');
        }
    }
}
