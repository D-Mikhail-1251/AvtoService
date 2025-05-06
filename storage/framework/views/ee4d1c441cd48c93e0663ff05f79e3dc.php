<?php $__env->startSection('main'); ?>
    <h1 style="color: #FFFFFF; text-align: center; padding: 20px 0">Добавить мастера</h1>

    <form action="<?php echo e(route('create.master')); ?>" method="POST" enctype="multipart/form-data" style="height: 77vh;" class="d-flex flex-column align-items-center gap-3">
        <?php echo csrf_field(); ?>

        <div class="form-group" style="width: 70%">
            <label for="user_id" class="text-white">Выберите пользователя</label>
            <select name="user_id" id="user_id" class="form-control" required>
                <option value="" disabled selected>Выберите пользователя</option>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="form-group" style="width: 70%">
            <label for="name" class="text-white">Имя</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Введите Имя">
        </div>

        <div class="form-group" style="width: 70%">
            <label for="last_name" class="text-white">Фамилия</label>
            <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Введите фамилию">
        </div>

        <div class="form-group" style="width: 70%">
            <label class="text-white">Дата первого устройства на работу</label>
            <input type="date" name="work_experience" id="work_experience" class="form-control" required>
        </div>

        <div class="form-group" style="width: 70%">
            <lable class="text-white">Фотография</lable>
            <input type="url" name="image" id="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Добавить мастера</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\headsplit\PhpstormProjects\AutoService\resources\views/admin/add_master.blade.php ENDPATH**/ ?>