<div class="mb-3">
    <label class="form-label fw-semibold">Pasien <span class="text-danger">*</span></label>
     <select class="form-select" name="pasien_id">
        @foreach ($pasien as $p)
            <option value="{{ $p->id }}" @if(isset($kunjungan) && $kunjungan->pasien_id == $p->id) selected @endif >{{ $p->nama }}</option>
        @endforeach
     </select>
    @error('pasien_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Dokter <span class="text-danger">*</span></label>
     <select class="form-select" name="dokter_id">
        @foreach ($dokter as $p)
            <option value="{{ $p->id }}" @if(isset($kunjungan) && $kunjungan->dokter_id == $p->id) selected @endif >{{ $p->nama }}</option>
        @endforeach
     </select>
    @error('dokter_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Tanggal</label>
    <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror"
            value="{{ old('tanggal', $kunjungan->tanggal ?? '') }}">
    @error('tanggal')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Keluhan</label>
    <textarea name="keluhan" class="form-control @error('keluhan') is-invalid @enderror"
              rows="2" placeholder="keluhan...">{{ old('keluhan', $kunjungan->keluhan ?? '') }}</textarea>
    @error('keluhan')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Diagnosis</label>
    <input type="text" name="diagnosis" class="form-control @error('diagnosis') is-invalid @enderror"
           value="{{ old('diagnosis', $kunjungan->diagnosis ?? '') }}" placeholder="">
    @error('diagnosis')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Biaya</label>
    <input type="number" name="biaya" class="form-control @error('biaya') is-invalid @enderror"
           value="{{ old('biaya', $kunjungan->biaya ?? '') }}" placeholder="">
    @error('biaya')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
     <select class="form-select" name="status">
        <option value="ditangani" @if(isset($kunjungan) && $kunjungan->status == "ditangani") selected @endif>ditangani</option>
        <option value="menunggu resep" @if(isset($kunjungan) && $kunjungan->status == "menunggu resep") selected @endif>menunggu resep</option>
     </select>
    @error('status')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>