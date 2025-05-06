<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo e($title); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('style/app.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap&subset=cyrillic" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-md bg-danger border-bottom border-body sticky-custom" data-bs-theme="dark" style="z-index: 1030; position: sticky; top: 0;">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo e(route('home')); ?>">СТО "100"</a>
            <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('home')); ?>">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('about')); ?>">О нас</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('masters')); ?>">Наши мастера</a>
                    </li>
                    <?php if(auth()->guard()->check()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('lk')); ?>">Личный кабинет</a>
                        </li>
                        <?php if(\Illuminate\Support\Facades\Auth::user()->role == 'админ'): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('requests')); ?>">Админ панель</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('admin.masters')); ?>">Мастера</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('add.master')); ?>">Добавить мастера</a>
                            </li>
                        <?php endif; ?>
                        <?php if(\Illuminate\Support\Facades\Auth::user()->role == 'мастер'): ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route('master.tasks')); ?>" class="nav-link">Мои задачи</a>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if(auth()->guard()->guest()): ?>
                        <li class="nav-item">
                            <a class="nav-link  " href="<?php echo e(route('register')); ?>">Регистрация</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  " href="<?php echo e(route('login')); ?>">Вход</a>
                        </li>
                    <?php endif; ?>
                    <?php if(Auth::check() && (Auth::user()->role == 'админ' || Auth::user()->role == 'мастер')): ?>
                        <li class="nav-item">
                            <a class="nav-link  " href="<?php echo e(route('orders.index')); ?>">Заказы</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>


<main style="min-height: 89vh; background-color: #000000;">
<?php echo $__env->yieldContent('main'); ?>
</main>

<footer class="bg-danger">
    <p>&copy; <?php echo e(date('Y')); ?> СТО "100. All rights reserved.</p>
</footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<?php /**PATH C:\Users\headsplit\PhpstormProjects\AutoService\resources\views/layouts/index.blade.php ENDPATH**/ ?>