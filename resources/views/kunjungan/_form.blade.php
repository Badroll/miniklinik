<div class="mb-3">
    <label class="form-label fw-semibold">No. Rekam Medis <span class="text-danger">*</span></label>
    <input type="text" name="no_rm" class="form-control @error('no_rm') is-invalid @enderror"
           value="{{ old('no_rm', $pasien->no_rm ?? '') }}" placeholder="Contoh: RM0021">
    @error('no_rm')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Nama Lengkap <span class="text-danger">*</span></label>
    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
           value="{{ old('nama', $pasien->nama ?? '') }}" placeholder="Nama pasien">
    @error('nama')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Tanggal Lahir</label>
        <input type="date" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror"
               value="{{ old('tgl_lahir', $pasien->tgl_lahir ?? '') }}">
        @error('tgl_lahir')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror">
            <option value="">-- Pilih --</option>
            <option value="L" {{ old('jenis_kelamin', $pasien->jenis_kelamin ?? '') === 'L' ? 'selected' : '' }}>Laki-laki</option>
            <option value="P" {{ old('jenis_kelamin', $pasien->jenis_kelamin ?? '') === 'P' ? 'selected' : '' }}>Perempuan</option>
        </select>
        @error('jenis_kelamin')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Alamat</label>
    <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror"
              rows="2" placeholder="Alamat lengkap">{{ old('alamat', $pasien->alamat ?? '') }}</textarea>
    @error('alamat')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">No. HP</label>
    <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror"
           value="{{ old('no_hp', $pasien->no_hp ?? '') }}" placeholder="08xxxxxxxxxx">
    @error('no_hp')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
