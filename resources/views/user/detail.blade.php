@extends('layouts.user')

@section('content')
    @php
        use Carbon\Carbon;
        Carbon::setLocale('id');
    @endphp
    <div class="card mt-5">
        <div class="card-header">
            <h3>Detail Rental - {{ $rental->car->merek }} ({{ $rental->car->nomor_plat }})</h3>
        </div>
        <div class="card-body">
            <p><strong>Nama Mobil:</strong> {{ $rental->car->merek }} - {{ $rental->car->model }}</p>
            <p><strong>Nomor Plat:</strong> {{ $rental->car->nomor_plat }}</p>
            <p><strong>Tarif per Hari</strong> Rp {{ number_format($rental->car->tarif_sewa_per_hari, 0, ',', '.') }}</p>
            <p><strong>Status Rental:</strong>
                @if ($rental->status_rental == 'berjalan')
                    <span class="badge bg-primary">{{ ucfirst($rental->status_rental) }}</span>
                @elseif($rental->status_rental == 'pending')
                    <span class="badge bg-warning">{{ ucfirst($rental->status_rental) }}</span>
                @elseif($rental->status_rental == 'selesai')
                    <span class="badge bg-success">{{ ucfirst($rental->status_rental) }}</span>
                @else
                    <span class="badge bg-secondary">{{ ucfirst($rental->status_rental) }}</span>
                @endif
            </p>
            <p><strong>Tanggal Mulai:</strong> {{ Carbon::parse($rental->tanggal_mulai)->translatedFormat('d F Y') }}</p>
            <p><strong>Tanggal Selesai:</strong> {{ Carbon::parse($rental->tanggal_selesai)->translatedFormat('d F Y') }}
            </p>
            <p><strong>Total Harga:</strong> Rp {{ number_format($rental->total_harga, 0, ',', '.') }}</p>

            @if ($rental->return)
                <p><strong>Tanggal Pengembalian:</strong> {{ Carbon::parse($rental->tanggal_pengembalian)->translatedFormat('d F Y') }}</p>
                <p><strong>Jumlah Hari Sewa:</strong> {{ $rental->return->jumlah_hari_sewa }} hari</p>
                <p><strong>Biaya Sewa:</strong> Rp {{ number_format($rental->return->biaya_sewa, 0, ',', '.') }}</p>
            @else
                <p><strong>Belum ada data pengembalian.</strong></p>
            @endif

            <a href="{{ route('user.rentals') }}" class="btn btn-secondary">Kembali ke Daftar Rental</a>
        </div>
    </div>
@endsection
