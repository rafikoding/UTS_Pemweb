<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;

class PasienController extends Controller
{
    public function index()
    {
        // Mendapatkan semua data pasien dari model Pasien
        $pasiens = Pasien::all();

        // Tampilkan data pasien ke view
        return view('pasiens.index', ['pasiens' => $pasiens]);
    }

    public function create()
    {
        // Tampilkan halaman pembuatan pasien baru
        return view('pasiens.create');
    }

    public function store(Request $request)
    {
        // Validasi input dari request
        $request->validate([
            'nama' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        // Buat data pasien baru berdasarkan input request
        $pasien = new Pasien();
        $pasien->nama = $request->input('nama');
        $pasien->tanggal_lahir = $request->input('tanggal_lahir');
        $pasien->alamat = $request->input('alamat');
        $pasien->jenis_kelamin = $request->input('jenis_kelamin');
        $pasien->save();

        // Redirect ke halaman daftar pasien
        return redirect()->route('pasiens.index')->with('success', 'Pasien berhasil ditambahkan.');
    }

    // Tambahkan metode aksi lainnya seperti show(), edit(), update(), destroy() sesuai kebutuhan aplikasi Anda.
}
