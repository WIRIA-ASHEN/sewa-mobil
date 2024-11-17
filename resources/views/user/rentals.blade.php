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
                    <th>
                        Status
                        <i class="bi bi-question-circle" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus"
                            title="Product Status"
                            data-bs-content="Klik untuk active atau inactive produk.">
                        </i>
                    </th>
                    
                </tr>
            </thead>
            <tbody>
                @php
                    use Carbon\Carbon;
                    Carbon::setLocale('id');
                @endphp
                @foreach ($rentals as $rental)
                    <tr>
                        <td>{{ $rental->car->merek }}</td>
                        <td>{{ $rental->car->model }}</td>
                        <td>{{ Carbon::parse($rental->tanggal_mulai)->translatedFormat('d F Y') }}</td>
                        <td>{{ Carbon::parse($rental->tanggal_selesai)->translatedFormat('d F Y') }}</td>
                        <td>
                            @if ($rental->status_rental == 'berjalan')
                                <button class="btn btn-primary">{{ ucfirst($rental->status_rental) }}</button>
                                <a href="{{ route('user.rentals.detail', $rental->id) }}" class="btn btn-secondary">Detail
                                    </a>
                            @elseif($rental->status_rental == 'pending')
                                <button class="btn btn-warning">{{ ucfirst($rental->status_rental) }}</button>
                                <a href="{{ route('user.rentals.detail', $rental->id) }}" class="btn btn-secondary">Detail</a>
                            @elseif($rental->status_rental == 'selesai')
                                <button class="btn btn-success">{{ ucfirst($rental->status_rental) }}</button>
                                <a href="{{ route('user.rentals.detail', $rental->id) }}"
                                    class="btn btn-secondary">Detail</a>
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
