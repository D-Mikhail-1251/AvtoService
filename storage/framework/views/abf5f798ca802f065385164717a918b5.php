<?php $__env->startSection('main'); ?>
    <div class="login" data-bs-theme="dark">
        <?php if($errors->any()): ?>
            <div style="color: red;">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p><?php echo e($error); ?></p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <form action="<?php echo e(route('register.post')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <h1>Регистрация</h1>
            <div class="mb-3" >
                <label for="exampleInputName" class="form-label">Имя</label>
                <input type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp" name="name">
            </div>
            <div class="mb-3" >
                <label for="exampleInputEmail1" class="form-label">Электронная почта</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Повторите пароль</label>
                <input type="password" class="form-control" name="password_confirmation" id="exampleInputPassword1">
            </div>
            <label class="form-check-label" for="exampleCheck1">Запомнить данные при входе</label>
            <input type="checkbox" name="remember_me" id="exampleCheck1" value="1">
            <button type="submit" class="btn btn-primary">Регистрация</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\headsplit\PhpstormProjects\AutoService\resources\views/pages/register.blade.php ENDPATH**/ ?>