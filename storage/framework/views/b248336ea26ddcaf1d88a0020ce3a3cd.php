<!DOCTYPE html>
<html>

<head>
    <title>Halaman Login</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/login.css')); ?>">
</head>

<body>
    <div class="container">
        <h1>Login</h1>
        <form method="POST" action="<?php echo e(route('login')); ?>">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            
            <button type="submit">Login</button>
        </form>
        <p>Belum punya akun? <a href="#">Buat akun</a></p>
    </div>
</body>

</html>
<?php /**PATH C:\laragon\www\persewaan-mobil\resources\views/user/login.blade.php ENDPATH**/ ?>