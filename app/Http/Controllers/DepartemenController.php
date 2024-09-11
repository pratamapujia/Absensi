<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class DepartemenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dep = Departemen::orderBy('updated_at', 'DESC')->get();
        return view('admin.departemen.index', compact('dep'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi
        $validasi = Validator::make($request->all(), [
            'kd_departemen' => 'required|unique:departemen,kd_departemen',
            'nama_departemen' => 'required|max:100',
        ], [
            'kd_departemen.required' => 'Kode Departemen tidak boleh kosong',
            'kd_departemen.unique' => 'Kode Departemen tidak boleh sama',
            'nama_departemen.required' => 'Nama Departemen tidak boleh kosong',
            'nama_departemen.max' => 'Nama Departemen hanya hanya maximal 100 huruf',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $dep = new Departemen();
        $dep->kd_departemen = $request->kd_departemen;
        $dep->nama_departemen = $request->nama_departemen;

        if ($dep->save()) {
            return redirect()->route('departemen.index')->with('pesan', 'Data berhasil Disimpan 👍');
        } else {
            return redirect()->route('departemen.index')->with('gagal', 'Data gagal Disimpan 😭');
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
    public function edit(Request $request)
    {
        $id_dep = $request->id_departemen;
        $dep = DB::table('departemen')->where('id_departemen', $id_dep)->first();
        return view('admin.departemen.edit', compact('dep'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = Validator::make($request->all(), [
            'kd_departemen' => 'required',
            'nama_departemen' => 'required|max:100',
        ], [
            'kd_departemen.required' => 'Kode Departemen tidak boleh kosong',
            'nama_departemen.required' => 'Nama Departemen tidak boleh kosong',
            'nama_departemen.max' => 'Nama Departemen hanya hanya maximal 100 huruf',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        // Update the resource
        $dep = Departemen::find($id);
        $dep->kd_departemen = $request->kd_departemen;
        $dep->nama_departemen = $request->nama_departemen;

        if ($dep->update()) {
            return redirect()->route('departemen.index')->with('pesan', 'Data berhasil Diperbarui 👍');
        } else {
            return redirect()->route('departemen.index')->with('gagal', 'Data gagal Diperbarui 😭');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $dep = Departemen::find($id);
            if ($dep->delete()) {
                return redirect()->route('departemen.index')->with('pesan', 'Data berhasil Dihapus 👍');
            } else {
                return redirect()->route('departemen.index')->with('gagal', 'Data gagal Dihapus 😭');
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('departemen.index')->with('gagal', 'Data gagal Dihapus 😭');
        }
    }
}
