@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Tambah Profil Toko Baru</div>
            <div class="card-body">
                <form method="POST" action="{{ route('toko.store') }}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="nama_toko" class="form-label">Nama Toko</label>
                        <input type="text" class="form-control @error('nama_toko') is-invalid @enderror" id="nama_toko" name="nama_toko" value="{{ old('nama_toko') }}" required>
                        @error('nama_toko')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3" required>{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="telepon" name="telepon" value="{{ old('telepon') }}" required>
                        @error('telepon')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                                        
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="notifikasi_email" name="notifikasi_email" {{ old('notifikasi_email') ? 'checked' : '' }}>
                        <label class="form-check-label" for="notifikasi_email">Aktifkan Notifikasi Email</label>
                    </div>
                    
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="notifikasi_sms" name="notifikasi_sms" {{ old('notifikasi_sms') ? 'checked' : '' }}>
                        <label class="form-check-label" for="notifikasi_sms">Aktifkan Notifikasi SMS</label>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('toko.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection