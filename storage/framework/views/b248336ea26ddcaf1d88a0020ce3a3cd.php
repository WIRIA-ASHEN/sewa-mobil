<!DOCTYPE html>
<html>

<head>
    <title>Halaman Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(asset('css/login.css')); ?>">
</head>

<body>
    <div class="container">
        <h1>Login</h1>
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <?php echo e(implode(' ', $errors->all())); ?>

            </div>
        <?php endif; ?>
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
        <form action="<?php echo e(route('login')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>


            <button type="submit">Login</button>
        </form>
        <p>Belum punya akun? <a href="<?php echo e(route('register')); ?>">Buat akun</a></p>
    </div>
</body>

</html>
<?php /**PATH C:\laragon\www\persewaan-mobil\resources\views/user/login.blade.php ENDPATH**/ ?>