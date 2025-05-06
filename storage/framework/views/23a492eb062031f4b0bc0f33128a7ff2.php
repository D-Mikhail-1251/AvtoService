<?php $__env->startSection('main'); ?>
    <h1 style="color: #FFFFFF; text-align: center; padding: 20px 0">Мастера</h1>
    <table class="flat-table flat-table-1">
        <thead>
        <th>Id</th>
        <th>Имя</th>
        <th>Фамилия</th>
        <th>Стаж работы</th>
        <th>Дата устройства</th>
        <th>Действия</th>
        </thead>
        <tbody>
        <?php $__currentLoopData = $masters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $master): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $workExperience = \Carbon\Carbon::parse($master->work_experience);
                $now = \Carbon\Carbon::now();
                $diff = $now->diff($workExperience);
            ?>
            <tr>
                <td>
                    <?php echo e($master->id); ?>

                </td>
                <td>
                    <input type="text" value="<?php echo e($master->name); ?>" class="form-control" readonly>
                </td>
                <td>
                    <input type="text" value="<?php echo e($master->last_name); ?>" class="form-control" readonly>
                </td>
                <td>
                    <input type="text" value="<?php echo e($diff->y); ?> Лет <?php echo e($diff->m); ?> Месяца <?php echo e($diff->d); ?> Дня" class="form-control" readonly>
                </td>
                <td>
                    <input type="text" value="<?php echo e($master->created_at); ?>" class="form-control" readonly>
                </td>
                <td>
                    <form action="<?php echo e(route('delete.master')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="user_id" value="<?php echo e($master->user_id); ?>">
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\headsplit\PhpstormProjects\AutoService\resources\views/admin/masters.blade.php ENDPATH**/ ?>