@extends('layouts.app')

@section('title', 'Data Kunjungan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Data Kunjungan Pasien</h4>
    <a href="{{ route('kunjungan.create') }}" class="btn btn-primary btn-sm">+ Tambah Kunjungan</a>
</div>

@if(session('ok'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('ok') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>Tanggal</th>
                    <th>Pasien</th>
                    <th>Keluhan</th>
                    <th>Diagnosis</th>
                    <th>Biaya</th>
                    <th>Dokter</th>
                    <th>Status</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kunjungan as $p)
                <tr>
                    <td><span class="badge bg-secondary">{{ \Carbon\Carbon::parse($p->tanggal)->translatedFormat('d F Y') }}</span></td>
                    <td>{{ $p->pasien->nama }}</td>
                    <td>{{ $p->keluhan }}</td>
                    <td>{{ $p->diagnosis }}</td>
                    <td>Rp {{ number_format($p->biaya, 2, ",", ".") }}</td>
                    <td>{{ $p->dokter->nama }}</td>
                    
                        {{-- 
                    <td>
                        @if($p->jenis_kelamin === 'L')
                            <span class="badge bg-info text-dark">Laki-laki</span>
                        @elseif($p->jenis_kelamin === 'P')
                            <span class="badge bg-pink" style="background:#e91e8c;color:#fff">Perempuan</span>
                        @else
                            -
                        @endif
                    </td>
                    
                        --}}
                    <td>{{ $p->status }}</td>
                    <td class="text-end">
                        <a href="{{ route('kunjungan.edit', $p) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('kunjungan.destroy', $p) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Hapus kunjungan ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted py-4">Belum ada data kunjungan</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">
    {{ $kunjungan->links() }}
</div>
@endsection
