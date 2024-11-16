<!DOCTYPE html>
<html>

<head>
    <title>Halaman Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<body>
    <div class="container">
        <h1>Register</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <label for="email">Nama:</label>
            <input type="nama" id="nama" name="nama" required>
            <label for="alamat">Alamat:</label>
            <input type="alamat" id="alamat" name="alamat" required>
            <label for="nomor_telepon">Nomor Telepon:</label>
            <input type="nomor_telepon" id="nomor_telepon" name="nomor_telepon" required>
            <label for="nomor_sim">Nomor Sim:</label>
            <input type="nomor_sim" id="nomor_sim" name="nomor_sim" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <label for="password_confirmation">Konfirmasi Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>

            <button type="submit">Register</button>
        </form>
        <p>Sudah punya akun? <a href="{{ route('login') }}">Login disini</a></p>
    </div>
</body>

</html>
