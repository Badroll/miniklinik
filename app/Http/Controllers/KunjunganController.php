<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Kunjungan;
use Illuminate\Http\Request;

class KunjunganController extends Controller
{
    public function index()
    {
        $kunjungan = Kunjungan::orderBy('tanggal', 'desc')->paginate(10);
        //dd($kunjungan);
        return view('kunjungan.index', compact('kunjungan'));
    }

    public function create()
    {
        return view('kunjungan.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'pasien_id'     => 'required|int',
            'dokter_id'     => 'required|int',
            'nama'          => 'required',
            'tanggal'       => 'required|date',
            'keluhan'       => 'required',
            'diagnosis'     => 'required',
            'biaya'         => 'required|decimal',
            'status'        => 'required',
        ]);

        Kunjungan::create($data);

        return redirect()->route('kunjungan.index')->with('ok', 'Data kunjungan berhasil ditambahkan.');
    }

    public function show(Kunjungan $kunjungan)
    {
        return redirect()->route('kunjungan.index');
    }

    public function edit(Kunjungan $kunjungan)
    {
        return view('kunjungan.edit', compact('kunjungan'));
    }

    public function update(Request $request, Kunjungan $kunjungan)
    {
        $data = $request->validate([
            'pasien_id'     => 'required|int',
            'dokter_id'     => 'required|int',
            'nama'          => 'required',
            'tanggal'       => 'required|date',
            'keluhan'       => 'required',
            'diagnosis'     => 'required',
            'biaya'         => 'required|decimal',
            'status'        => 'required',
        ]);

        $kunjungan->update($data);

        return redirect()->route('kunjungan.index')->with('ok', 'Data kunjungan diperbarui.');
    }

    public function destroy(Kunjungan $kunjungan)
    {
        $kunjungan->delete();

        return redirect()->route('kunjungan.index')->with('ok', 'Data kunjungan dihapus.');
    }
}
