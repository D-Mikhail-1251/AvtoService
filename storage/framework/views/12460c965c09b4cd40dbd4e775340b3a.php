<?php $__env->startSection('main'); ?>
    <div id="carouselExample" data-bs-theme="dark" class="carousel slide bg-white">
        <table class="flat-table flat-table-1">
            <thead>
            <th>Клиент</th>
            <th>Машина</th>
            <th>Модель</th>
            <th>Гос.номер</th>
            <th>Номер региона</th>
            <th>Номер телефона</th>
            <th>Действия</th>
            </thead>
            <tbody>
            <?php $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <form action="<?php echo e(route('order.accept')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <td>
                            <input type="text" name="full_name_client" value="<?php echo e($request->full_name); ?>" readonly class="form-control-plaintext">
                        </td>
                        <td>
                            <input type="text" name="mark" value="<?php echo e($request->mark); ?>" readonly class="form-control-plaintext">
                        </td>
                        <td>
                            <input type="text" name="model" value="<?php echo e($request->model); ?>" readonly class="form-control-plaintext">
                        </td>
                        <td>
                            <input type="text" name="state_number" value="<?php echo e($request->state_number); ?>" readonly class="form-control-plaintext">
                        </td>
                        <td>
                            <input type="text" name="region" value="<?php echo e($request->region); ?>" readonly class="form-control-plaintext">
                        </td>
                        <td>
                            <input type="text" name="phone_number_client" value="<?php echo e($request->phone_number); ?>" readonly class="form-control-plaintext">
                        </td>
                        <td>
                            <input type="hidden" name="user_id" value="<?php echo e($request->user_id); ?>">
                            <input type="hidden" name="id" value="<?php echo e($request->id); ?>">

                            <button type="submit" name="action" value="accept" class="btn btn-success">Принять</button>
                            <button type="submit" name="action" value="reject" class="btn btn-danger">Отказать</button>
                        </td>
                    </form>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\headsplit\PhpstormProjects\AutoService\resources\views/admin/requests.blade.php ENDPATH**/ ?>