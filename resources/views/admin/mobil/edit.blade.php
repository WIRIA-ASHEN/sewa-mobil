@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2>Edit Mobil</h2>
        <form action="{{ route('admin.mobil.update', $car->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="merk" class="form-label">Merk</label>
                <input type="text" class="form-control" id="merek" name="merek" value="{{ $car->merek }}" required>
            </div>
            <div class="mb-3">
                <label for="model" class="form-label">Model</label>
                <input type="text" class="form-control" id="model" name="model" value="{{ $car->model }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="nomor_plat" class="form-label">Nomor plat</label>
                <input type="text" class="form-control" id="nomor_plat" name="nomor_plat" value="{{ $car->nomor_plat }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="tarif_sewa_per_hari" class="form-label">Tarif Sewa per Hari</label>
                <input type="number" class="form-control" id="tarif_sewa_per_hari" name="tarif_sewa_per_hari"
                    value="{{ $car->tarif_sewa_per_hari }}" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select" required>
                    <option value="tersedia" {{ $car->status === 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="disewa" {{ $car->status === 'disewa' ? 'selected' : '' }}>Di Sewa</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
@endsection
