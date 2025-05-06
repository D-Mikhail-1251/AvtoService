<?php $__env->startSection('main'); ?>
    <h1 style="color: #FFFFFF; text-align: center; padding: 20px 0">Заказы</h1>
    <table class="flat-table flat-table-1">
        <thead style="background: #ff0000">
        <th>ФИО клиента</th>
        <th>Мастер</th>
        <th>Машина</th>
        <th>Модель</th>
        <th>Гос.номер</th>
        <th>Цена</th>
        <th>Услуга</th>
        <th>Статус</th>
        <th>Примерная дата окончания</th>
        <th>Действие</th>
        </thead>
        <tbody style="background: linear-gradient(135deg, #fff, #ff7f50, #e34f4f, #d32f2f);">
        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <form action="<?php echo e(route('order.edit', $order->id)); ?>" method="get">
                <?php echo csrf_field(); ?>
                <tr>
                    <td>
                        <input type="text" name="full_name_client"
                               value="<?php echo e($order->full_name_client); ?>"
                               class="form-control" readonly>
                    </td>
                    <td>
                        <input type="text" name="master_name"
                               value="<?php echo e($order->master_name ?? 'Не назначен'); ?>"
                               class="form-control" readonly>
                    </td>
                    <td>
                        <input type="text" name="mark" value="<?php echo e($order->mark); ?>" class="form-control">
                    </td>
                    <td>
                        <input type="text" name="model" value="<?php echo e($order->model); ?>" class="form-control">
                    </td>
                    <td>
                        <input type="text" name="state_number" value="<?php echo e($order->state_number . ' ' . $order->region); ?>" class="form-control">
                    </td>
                    <td>
                        <input type="text" name="price" value="<?php echo e($order->price ?? 'Не установлена'); ?>" class="form-control">
                    </td>
                    <td>
                        <input type="text" name="description" value="<?php echo e($order->description ?? 'Не установлено'); ?>" class="form-control">
                    </td>
                    <td>
                        <select name="status" id="status" class="form-control">
                            <option value="Формируется" <?php echo e($order->status == 'Формируется' ? 'selected' : ''); ?>>Формируется</option>
                            <option value="Начат" <?php echo e($order->status == 'Начат' ? 'selected' : ''); ?>>Начат</option>
                            <option value="В работе" <?php echo e($order->status == 'В работе' ? 'selected' : ''); ?>>В работе</option>
                            <option value="Выполнен" <?php echo e($order->status == 'Выполнен' ? 'selected' : ''); ?>>Выполнен</option>
                            <option value="Отменен" <?php echo e($order->status == 'Отменен' ? 'selected' : ''); ?>>Отменен</option>
                        </select>
                    </td>
                    <td>
                        <input type="date" name="end_time" value="<?php echo e(\Carbon\Carbon::parse($order->EndTime)->format('Y-m-d')); ?>"
                               class="form-control <?php $__errorArgs = ['end_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" readonly>
                        <?php $__errorArgs = ['end_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </td>
                    <td>
                        <a href="<?php echo e(route('order.edit', $order->id)); ?>" class="btn btn-info">Редактировать</a>
                    </td>
                </tr>
            </form>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\headsplit\PhpstormProjects\AutoService\resources\views/pages/orders.blade.php ENDPATH**/ ?>