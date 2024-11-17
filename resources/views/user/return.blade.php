@extends('layouts.user')

@section('content')
    <div class="container">
        <h2 class="mt-5">Pengembalian Mobil</h2>
        <div class="card mt-4">
            <div class="card-body">
                <form action="{{ route('user.return.process') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nomor_plat" class="form-label">Nomor Plat Mobil</label>
                        <input type="text" name="nomor_plat" id="nomor_plat" class="form-control"
                            placeholder="Masukkan Nomor Plat Mobil" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Kembalikan</button>
                </form>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success mt-4">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger mt-4">{{ session('error') }}</div>
        @endif

        @if (isset($return))
            <div class="card mt-5">
                <div class="card-header">Detail Pengembalian</div>
                <div class="card-body">
                    <p><strong>Nama Mobil:</strong> {{ $return->rental->car->nama_mobil }}</p>
                    <p><strong>Nomor Plat:</strong> {{ $return->rental->car->nomor_plat }}</p>
                    <p><strong>Tanggal Mulai:</strong> {{ $return->rental->tanggal_mulai }}</p>
                    <p><strong>Tanggal Selesai:</strong> {{ $return->tanggal_pengembalian }}</p>
                    <p><strong>Jumlah Hari Sewa:</strong> {{ $return->jumlah_hari_sewa }} hari</p>
                    <p><strong>Biaya Total:</strong> Rp {{ number_format($return->biaya_sewa, 0, ',', '.') }}</p>
                </div>
            </div>
        @endif
    </div>
@endsection