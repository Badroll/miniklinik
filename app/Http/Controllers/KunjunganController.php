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
        $pasien = Pasien::all();
        $dokter = Dokter::all();
        return view('kunjungan.create', compact("pasien", "dokter"));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $data = $request->validate([
            'pasien_id'     => 'required|int',
            'dokter_id'     => 'required|int',
            'tanggal'       => 'required|date',
            'keluhan'       => 'required',
            'diagnosis'     => 'required',
            'biaya'         => 'required|numeric',
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
        $pasien = Pasien::all();
        $dokter = Dokter::all();
        return view('kunjungan.edit', compact('kunjungan', "pasien", "dokter"));
    }

    public function update(Request $request, Kunjungan $kunjungan)
    {
        $data = $request->validate([
            // pasien dan dokter harus valid (ada record nya)
            'pasien_id'     => 'required|int',
            'dokter_id'     => 'required|int',
            'tanggal'       => 'required|date',
            'keluhan'       => 'required',
            'diagnosis'     => 'required',
            'biaya'         => 'required|numeric',
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
