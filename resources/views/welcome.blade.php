<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <!-- Brand Logo -->
            <a class="navbar-brand" href="/">Rental Mobil</a>

            <!-- Navbar Links -->
            <ul class="navbar-nav ms-auto d-flex align-items-center">
                <!-- Link: Mobil Saya -->
                {{-- <li class="nav-item me-3">
                    <span class="nav-link">
                        <a href="{{ route('user.rentals') }}" class="text-white text-decoration-none">Mobil Saya</a>
                    </span>
                </li>

                <!-- Link: Pengembalian -->
                <li class="nav-item me-3">
                    <span class="nav-link">
                        <a href="{{ route('user.return') }}" class="text-white text-decoration-none">Pengembalian</a>
                    </span>
                </li> --}}

                <!-- Logout Button -->
                <li class="nav-item">
                    {{-- <form method="POST" action="{{ route('logout') }}" class="d-flex align-items-center">
                        @csrf
                        <button type="submit" class="btn btn-link text-white text-decoration-none p-0 mb-3">Keluar</button>
                    </form>
                     --}}
                    <a href="{{ route('login') }}" class="text-white text-decoration-none">Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="container mt-5">
            <h2>Daftar Mobil Tersedia</h2>
            <div class="row">
                @foreach ($cars as $car)
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ $car->merek }} - {{ $car->model }}</h5>
                                <p>Tarif Sewa: Rp {{ number_format($car->tarif_sewa_per_hari, 0, ',', '.') }} / hari</p>
                                <a href="{{ route('user.mobil.show', $car->id) }}" class="btn btn-primary">Lihat
                                    Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- @yield('scripts') --}}
</body>

</html>
