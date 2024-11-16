@extends('layouts.user')

@section('content')
    <div class="container mt-5">
        <h2>Daftar Mobil Tersedia</h2>
        <div class="row">
            @foreach ($cars as $car)
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $car->merek }} - {{ $car->model }}</h5>
                            <p>Tarif Sewa: Rp {{ number_format($car->tarif_sewa_per_hari, 0, ',', '.') }} / hari</p>
                            <a href="{{ route('user.mobil.show', $car->id) }}" class="btn btn-primary">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
