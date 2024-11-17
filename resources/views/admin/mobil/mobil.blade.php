@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Daftar Mobil</h2>
        <form action="{{ route('admin.mobil') }}" method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Cari merek atau model..."
                        value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <select name="status" class="form-select">
                        <option value="">-- Pilih Status --</option>
                        <option value="disewa" {{ request('status') == 'disewa' ? 'selected' : '' }}>Disewa</option>
                        <option value="tersedia" {{ request('status') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('admin.mobil') }}" class="btn btn-secondary">Reset</a>
                </div>
            </div>
        </form>

        <a href="{{ route('admin.mobil.tambah') }}" class="btn btn-success mb-3">Tambah Mobil</a>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Merk</th>
                    <th>Model</th>
                    <th>Nomor Plat</th>
                    <th>Tarif Sewa</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                    <tr>
                        <td>{{ $car->id }}</td>
                        <td>{{ $car->merek }}</td>
                        <td>{{ $car->model }}</td>
                        <td>{{ $car->nomor_plat }}</td>
                        <td>Rp {{ number_format($car->tarif_sewa_per_hari, 0, ',', '.') }}</td>
                        <td>{{ $car->status }}</td>
                        <td>
                            <a href="{{ route('admin.mobil.edit', $car->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.mobil.hapus', $car->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
