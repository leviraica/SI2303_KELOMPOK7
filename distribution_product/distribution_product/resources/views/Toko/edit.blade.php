@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Edit Profil Toko</div>
            <div class="card-body">
                <form method="POST" action="{{ route('toko.update', $toko->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="nama_toko" class="form-label">Nama Toko</label>
                        <input type="text" class="form-control" id="nama_toko" name="nama_toko" value="{{ old('nama_toko', $toko->nama_toko) }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $toko->email) }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ old('alamat', $toko->alamat) }}</textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="text" class="form-control" id="telepon" name="telepon" value="{{ old('telepon', $toko->telepon) }}" required>
                    </div>
                                        
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="notifikasi_email" name="notifikasi_email" {{ old('notifikasi_email', $toko->notifikasi_email) ? 'checked' : '' }}>
                        <label class="form-check-label" for="notifikasi_email">Aktifkan Notifikasi Email</label>
                    </div>
                    
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="notifikasi_sms" name="notifikasi_sms" {{ old('notifikasi_sms', $toko->notifikasi_sms) ? 'checked' : '' }}>
                        <label class="form-check-label" for="notifikasi_sms">Aktifkan Notifikasi SMS</label>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="{{ route('toko.edit-password', $toko->id) }}" class="btn btn-secondary">Ganti Password</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection