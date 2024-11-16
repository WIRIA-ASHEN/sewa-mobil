@extends('layouts.user')

@section('content')
    <div class="container mt-5">
        <h2>Mobil yang Disewa</h2>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Merk</th>
                    <th>Model</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Status</th>
                    {{-- <th>Aksi</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($rentals as $rental)
                    <tr>
                        <td>{{ $rental->car->merek }}</td>
                        <td>{{ $rental->car->model }}</td>
                        <td>{{ $rental->tanggal_mulai }}</td>
                        <td>{{ $rental->tanggal_selesai }}</td>
                        <td>
                            @if ($rental->status_rental == 'berjalan')
                                <button class="btn btn-primary">{{ ucfirst($rental->status_rental) }}</button>
                            @elseif($rental->status_rental == 'pending')
                                <button class="btn btn-warning">{{ ucfirst($rental->status_rental) }}</button>
                            @elseif($rental->status_rental == 'selesai')
                                <button class="btn btn-success">{{ ucfirst($rental->status_rental) }}</button>
                            @else
                                <button class="btn btn-secondary">{{ ucfirst($rental->status_rental) }}</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
