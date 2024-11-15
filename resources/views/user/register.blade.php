<!DOCTYPE html>
<html>

<head>
    <title>Halaman Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <div class="container">
        <h1>Register</h1>
        <form method="POST" action="{{ url('register') }}">
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

            <button type="submit">Register</button>
        </form>
    </div>
</body>

</html>
