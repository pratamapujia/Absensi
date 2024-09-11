<?php

namespace App\Http\Controllers;

use App\Models\SetJam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jamKerja = SetJam::orderBy('kd_jam')->get();
        return view('admin.jam.index', compact('jamKerja'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Generate kode Jam Baru
        $lastKode = SetJam::orderBy('kd_jam', 'desc')->first();
        $nextKode = 'JK001'; // Initialize with a default value
        if ($lastKode) {
            $kode = $lastKode->kd_jam;
            $nextKode = 'JK' . str_pad(intval(substr($kode, 2)) + 1, 3, '0', STR_PAD_LEFT);
        }
        return view('admin.jam.create', compact('nextKode'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi
        $validasi = Validator::make($request->all(), [
            'nama_jam' => 'required',
            'awal_jam' => 'required',
            'jam_masuk' => 'required',
            'akhir_jam' => 'required',
            'jam_pulang' => 'required',
        ], [
            'nama_jam.required' => 'Nama Jam tidak boleh kosong',
            'awal_jam.required' => 'Awal Jam tidak boleh kosong',
            'jam_masuk.required' => 'Jam Masuk tidak boleh kosong',
            'akhir_jam.required' => 'Akhir Jam tidak boleh kosong',
            'jam_pulang.required' => 'Jam Pulang tidak boleh kosong',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $jamKerja = new SetJam();
        $jamKerja->kd_jam = $request->kd_jam;
        $jamKerja->nama_jam = $request->nama_jam;
        $jamKerja->awal_jam = $request->awal_jam;
        $jamKerja->jam_masuk = $request->jam_masuk;
        $jamKerja->akhir_jam = $request->akhir_jam;
        $jamKerja->jam_pulang = $request->jam_pulang;

        if ($jamKerja->save()) {
            return redirect()->route('setjam.index')->with('pesan', 'Data berhasil disimpan 👍');
        } else {
            return redirect()->back()->with('gagal', 'Data gagal Disimpan 😭');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = SetJam::find($id);
        return view('admin.jam.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi
        $validasi = Validator::make($request->all(), [
            'nama_jam' => 'required',
            'awal_jam' => 'required',
            'jam_masuk' => 'required',
            'akhir_jam' => 'required',
            'jam_pulang' => 'required',
        ], [
            'nama_jam.required' => 'Nama Jam tidak boleh kosong',
            'awal_jam.required' => 'Awal Jam tidak boleh kosong',
            'jam_masuk.required' => 'Jam Masuk tidak boleh kosong',
            'akhir_jam.required' => 'Akhir Jam tidak boleh kosong',
            'jam_pulang.required' => 'Jam Pulang tidak boleh kosong',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $data = SetJam::find($id);
        $data->kd_jam = $request->kd_jam;
        $data->nama_jam = $request->nama_jam;
        $data->awal_jam = $request->awal_jam;
        $data->jam_masuk = $request->jam_masuk;
        $data->akhir_jam = $request->akhir_jam;
        $data->jam_pulang = $request->jam_pulang;

        if ($data->update()) {
            return redirect()->route('setjam.index')->with('pesan', 'Data berhasil Diperbarui 👍');
        } else {
            return redirect()->back()->with('gagal', 'Data gagal Diperbarui 😭');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = SetJam::find($id);
        if ($data->delete()) {
            return redirect()->route('setjam.index')->with('pesan', 'Data berhasil Dihapus 👍');
        } else {
            return redirect()->back()->with('gagal', 'Data gagal Dihapus 😭');
        }
    }
}
