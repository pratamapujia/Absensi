<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\SetjamKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawan = DB::table('karyawan')
            ->orderBy('karyawan.updated_at', 'DESC')
            ->join('departemen', 'karyawan.kd_departemen', '=', 'departemen.kd_departemen')
            ->get();
        return view('admin.karyawan.index', compact('karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dept = DB::table('departemen')->get();
        return view('admin.karyawan.create', compact('dept'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $validasi = Validator::make($request->all(), [
            'nik' => 'required|numeric|unique:karyawan,nik|digits_between:3,5',
            'nama_lengkap' => 'required|max:30',
            'jabatan' => 'required|max:20',
            'kd_departemen' => 'required',
            'no_hp' => 'required|numeric|digits_between:10,13|unique:karyawan,no_hp',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'nik.required' => 'NIK tidak boleh kosong',
            'nik.digits_between' => 'NIK hanya minimal 3 dan maximal 5 angka',
            'nik.numeric' => 'NIK hanya boleh angka',
            'nik.unique' => 'NIK tidak boleh sama',
            'nama_lengkap.required' => 'Nama tidak boleh kosong',
            'nama_lengkap.max' => 'Nama hanya hanya maximal 30 huruf',
            'jabatan.required' => 'Jabatan tidak boleh kosong',
            'jabatan.max' => 'Jabatan hanya maximal 20 huruf',
            'kd_departemen.required' => 'Departemen tidak boleh kosong',
            'no_hp.required' => 'No Hp tidak boleh kosong',
            'no_hp.unique' => 'No Hp tidak boleh sama',
            'no_hp.digits_between' => 'No Hp minimal 10 dan maximal 13 angka',
            'foto.image' => 'Yang anda masukkan bukan Image',
            'foto.mimes' => 'Format foto (jpeg, png, jpg)',
            'foto.max' => 'Ukuran foto maximal 2Mb',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $karyawan = new Karyawan();
        $karyawan->nik = $request->nik;
        $karyawan->nama_lengkap = $request->nama_lengkap;
        $karyawan->jabatan = $request->jabatan;
        $karyawan->no_hp = $request->no_hp;
        $karyawan->kd_departemen = $request->kd_departemen;
        $karyawan->password = Hash::make('password');

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $fileName = $this->generateFileName($karyawan->nik);

            // Use Intervention Image package for cropping
            $manager = new ImageManager(Driver::class);
            $croppedImage = $manager->read($image)->cover(300, 300, 'top-center'); // Adjust as needed

            // Save the image to storage
            $croppedImage->save(storage_path("app/public/uploads/karyawan/{$fileName}"));

            $karyawan->foto = $fileName; // Save file name to Karyawan model if needed
        }

        if ($karyawan->save()) {
            return redirect()->route('karyawan.index')->with('pesan', 'Data berhasil disimpan 👍');
        } else {
            return redirect()->back()->with('gagal', 'Data gagal disimpan 😭');
        }
    }

    private function generateFileName($nik)
    {
        return "{$nik}_" . date('Ymd_Hi') . ".png";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dept = DB::table('departemen')->get();
        $data = DB::table('karyawan')->where('id_karyawan', $id)->first();
        return view('admin.karyawan.edit', compact('dept', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validation
        $validasi = Validator::make($request->all(), [
            'nama_lengkap' => 'required|max:30',
            'jabatan' => 'required|max:20',
            'kd_departemen' => 'required',
            'no_hp' => 'required|numeric|digits_between:10,13',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'nama_lengkap.required' => 'Nama tidak boleh kosong',
            'nama_lengkap.max' => 'Nama hanya hanya maximal 30 huruf',
            'jabatan.required' => 'Jabatan tidak boleh kosong',
            'jabatan.max' => 'Jabatan hanya maximal 20 huruf',
            'kd_departemen.required' => 'Departemen tidak boleh kosong',
            'no_hp.required' => 'No Hp tidak boleh kosong',
            'no_hp.digits_between' => 'No Hp minimal 10 dan maximal 13 angka',
            'foto.image' => 'Yang anda masukkan bukan Image',
            'foto.mimes' => 'Format foto (jpeg, png, jpg)',
            'foto.max' => 'Ukuran foto maximal 2Mb',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $karyawan = Karyawan::find($id);
        $karyawan->nik = $request->nik;
        $karyawan->nama_lengkap = $request->nama_lengkap;
        $karyawan->jabatan = $request->jabatan;
        $karyawan->no_hp = $request->no_hp;
        $karyawan->kd_departemen = $request->kd_departemen;
        $karyawan->password = Hash::make('password');
        $old_foto = $request->old_foto;

        if ($request->hasFile('foto')) {
            $karyawan->foto = $request->nik . "." . $request->file('foto')->getClientOriginalExtension();
            $path = "public/uploads/karyawan/";
            $pathOld = "public/uploads/karyawan/" . $old_foto;
            Storage::delete($pathOld);
            // Lakukan cropping
            $manager = new ImageManager(Driver::class);
            $croppedImage = $manager->read($request->file('foto'));
            $croppedImage->cover(300, 300, 'top-center')->save(storage_path('app/' . $path . $karyawan->foto));
        } else {
            $karyawan->foto = $old_foto;
        }

        if ($karyawan->update()) {
            return redirect()->route('karyawan.index')->with('pesan', 'Data berhasil Diperbarui 👍');
        } else {
            return redirect()->back()->with('gagal', 'Data gagal Diperbarui 😭');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $karyawan = Karyawan::find($id);
            if ($karyawan->delete()) {
                return redirect()->route('karyawan.index')->with('pesan', 'Data berhasil Dihapus 👍');
            } else {
                return redirect()->route('karyawan.index')->with('gagal', 'Data gagal Dihapus 😭');
            }
        } catch (\Exception $e) {
            return redirect()->route('karyawan.index')->with('gagal', 'Data gagal Dihapus 😭');
        }
    }

    public function setjam($id)
    {

        $karyawan = DB::table('karyawan')->where('id_karyawan', $id)->first();
        $existingJamKerja = SetjamKerja::where('nik', $karyawan->nik)->first();
        $jam = DB::table('jam_kerja')->orderBy('nama_jam')->get();

        if ($existingJamKerja) {
            // Redirect to edit page if work hours exist
            return redirect()->route('karyawan.editjam', $id);
        }

        // If no work hours exist, continue to setjam view
        $jam = DB::table('jam_kerja')->orderBy('nama_jam')->get();
        return view('admin.karyawan.setjam', compact('karyawan', 'jam'));
    }

    public function storejam(Request $request)
    {
        $messages = [
            'kd_jam.required' => 'Kode jam harus dipilih untuk setiap hari.',
            'kd_jam.array' => 'Kode jam harus berupa array.',
            'kd_jam.*.exists' => 'Pilih kode jam',
            'kd_jam.*.required' => 'Silakan pilih jam untuk :attribute.',
        ];

        $request->validate([
            'kd_jam' => 'required|array',
            'kd_jam.*' => 'exists:jam_kerja,kd_jam', // Ensure jam exists
        ], $messages);

        $nik = $request->nik;
        $hari = $request->hari;
        $kd_jam = $request->kd_jam;

        $data = [];
        foreach ($hari as $index => $day) {
            $data[] = [
                'nik' => $nik,
                'hari' => $day,
                'kd_jam' => $kd_jam[$index] ?? null, // Ensure index exists
            ];
        }

        try {
            SetjamKerja::insert($data);
            return redirect()->route('karyawan.index')->with('pesan', 'Berhasil Set Jam Kerja 👍');
        } catch (\Exception $e) {
            return redirect()->route('karyawan.index')->with('gagal', 'Gagal Set Jam Kerja 😭');
        }
    }

    public function editjam($id)
    {
        $karyawan = DB::table('karyawan')->where('id_karyawan', $id)->first();
        $jamKerja = SetjamKerja::where('nik', $karyawan->nik)->get();
        $jam = DB::table('jam_kerja')->orderBy('nama_jam')->get();

        return view('admin.karyawan.editjam', compact('karyawan', 'jam', 'jamKerja'));
    }

    public function updatejam(Request $request)
    {
        $messages = [
            'kd_jam.required' => 'Kode jam harus dipilih untuk setiap hari.',
            'kd_jam.array' => 'Kode jam harus berupa array.',
            'kd_jam.*.exists' => 'Kode jam yang dipilih tidak valid.',
        ];

        $request->validate([
            'kd_jam' => 'required|array',
            'kd_jam.*' => 'required|exists:jam_kerja,kd_jam',
        ], $messages);

        $nik = $request->nik;

        // Update logic
        foreach ($request->kd_jam as $index => $kd_jam) {
            SetjamKerja::where('nik', $nik)
                ->where('hari', $request->hari[$index])
                ->update(['kd_jam' => $kd_jam]);
        }

        return redirect()->route('karyawan.index')->with('pesan', 'Berhasil Update Jam Kerja 👍');
    }
}
