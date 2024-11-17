@extends('layouts.admin')

@section('content')
    <h2>Daftar Rental</h2>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Mobil</th>
                <th>Tanggal Pengembalian</th>
                <th>Tarif Sewa</th>
                <th>jumlah hari</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @php
                use Carbon\Carbon;
                Carbon::setLocale('id');
            @endphp
            @foreach ($returns as $return)
                <tr>
                    <td>{{ $return->rental->user->nama }}</td>
                    <td>{{ $return->rental->car->merek }} - {{ $return->rental->car->model }}</td>
                    <td>{{ Carbon::parse($return->tanggal_pengembalian)->translatedFormat('d F Y') }}</td>
                    <td>Rp {{ number_format($return->rental->car->tarif_sewa_per_hari, 0, ',', '.') }}</td>
                    <td>{{ $return->jumlah_hari_sewa }} hari</td>
                    <td>Rp {{ number_format($return->biaya_sewa, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
