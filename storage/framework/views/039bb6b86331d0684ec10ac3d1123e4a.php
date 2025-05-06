<?php $__env->startSection('main'); ?>
    <div>
        <form class="d-flex flex-column align-items-center gap-4" action="<?php echo e(route('create.post')); ?>" method="post">
            <h1 style="color: #FFFFFF;" class="pt-5">Создание заявки</h1>
            <?php echo csrf_field(); ?>
            <input style="width: 60%; padding: 15px" class="form-control" type="text" name="full_name" id="full_name" placeholder="ФИО" required>
            <input style="width: 60%; padding: 15px" class="form-control" type="text" name="mark" id="" placeholder="Марка машины" required>
            <input style="width: 60%; padding: 15px" class="form-control" type="text" name="model" placeholder="Модель" required>
            <input style="width: 60%; padding: 15px" class="form-control" type="text" name="state_number" id="" placeholder="Госномер" required>
            <input style="width: 60%; padding: 15px" class="form-control" type="text" name="region" id="" placeholder="Номер региона" required>
            <input style="width: 60%; padding: 15px" class="form-control" type="text" name="phone_number" id="" placeholder="Номер телефона" required>
            <input style="width: 60%; padding: 15px" class="form-control" type="hidden" name="user_id" value="<?php echo e(\Illuminate\Support\Facades\Auth::user()->id); ?>">
            <button class="btn btn-success" type="submit">Отправить</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\headsplit\PhpstormProjects\AutoService\resources\views/pages/create_order.blade.php ENDPATH**/ ?>