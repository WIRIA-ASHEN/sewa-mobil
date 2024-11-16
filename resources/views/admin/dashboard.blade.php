@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="mb-4">Selamat Datang, Admin!</h1>
        <div class="row">
            <!-- Card: Jumlah Mobil -->
            <div class="col-md-3">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Mobil Disewa</h5>
                        <p class="card-text fs-2">{{ $jumlahmobildisewa }}</p>
                    </div>
                </div>
            </div>

            <!-- Card: Jumlah Rental -->
            <div class="col-md-3">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Mobil Tersedia</h5>
                        <p class="card-text fs-2">{{ $jumlahmobiltersedia }}</p>
                    </div>
                </div>
            </div>

            <!-- Card: Jumlah Pengembalian -->
            <div class="col-md-3">
                <div class="card bg-warning text-dark mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Mobil Dirental</h5>
                        <p class="card-text fs-2">{{ $jumlahmobildirental }}</p>
                    </div>
                </div>
            </div>

            <!-- Card: Pengembalian Berjalan -->
            <div class="col-md-3">
                <div class="card bg-info text-white mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Pengembalian Mobil</h5>
                        <p class="card-text fs-2">{{ $jumlahPengembalian }}</p>
                    </div>
                </div>
            </div>

            <!-- Card: Pengembalian Selesai -->
            {{-- <div class="col-md-3">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Pengembalian Selesai</h5>
                        <p class="card-text fs-2">{{ $jumlahPengembalianSelesai }}</p>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
