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
            <a class="navbar-brand" href="{{ route('user.mobil') }}">Rental Mobil</a>

            <ul class="navbar-nav ms-auto d-flex align-items-center">
                <li class="nav-item me-3">
                    <span class="nav-link">
                        <a href="{{ route('user.rentals') }}" class="text-white text-decoration-none">Mobil Saya</a>
                    </span>
                </li>

                <li class="nav-item me-3">
                    <span class="nav-link">
                        <a href="{{ route('user.return') }}" class="text-white text-decoration-none">Pengembalian</a>
                    </span>
                </li>

                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}" class="d-flex align-items-center">
                        @csrf
                        <button type="submit" class="btn btn-link text-white text-decoration-none p-0 mb-3">Keluar</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>


    <div class="container mt-5">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @yield('scripts')
</body>

</html>
