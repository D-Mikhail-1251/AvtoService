<?php $__env->startSection('main'); ?>
    <div class="login" data-bs-theme="dark">
        <?php if(auth()->guard()->guest()): ?>
        <form action="<?php echo e(route('post.login')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <h1>Логин</h1>
            <div class="mb-3" >
                <label for="exampleInputEmail1" class="form-label">Электронная почта</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember_me">
                <label class="form-check-label" for="exampleCheck1">Запомнить данные при входе</label>
            </div>
            <button type="submit" class="btn btn-primary">Вход</button>
        </form>
    </div>
    <?php endif; ?>
    <?php if(auth()->guard()->check()): ?>
        <div class="login" data-bs-theme="dark">Вы уже авторизованы</div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\headsplit\PhpstormProjects\AutoService\resources\views/pages/login.blade.php ENDPATH**/ ?>