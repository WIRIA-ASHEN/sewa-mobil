@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2>Tambah Mobil</h2>
        <form action="{{ route('admin.mobil.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="merek" class="form-label">Merek</label>
                <input type="text" class="form-control" id="merek" name="merek" required>
            </div>
            <div class="mb-3">
                <label for="model" class="form-label">Model</label>
                <input type="text" class="form-control" id="model" name="model" required>
            </div>
            <div class="mb-3">
                <label for="nomor_plat" class="form-label">Nomor Plat</label>
                <input type="text" class="form-control" id="nomor_plat" name="nomor_plat" required>
            </div>
            <div class="mb-3">
                <label for="tarif_sewa_per_hari" class="form-label">Tarif Sewa per Hari</label>
                <input type="number" class="form-control" id="tarif_sewa_per_hari" name="tarif_sewa_per_hari" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
