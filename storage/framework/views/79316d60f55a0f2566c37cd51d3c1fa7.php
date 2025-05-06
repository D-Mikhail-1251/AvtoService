<?php $__env->startSection('main'); ?>
    <div class="container">
        <h2>Данные заказа #<?php echo e($order->id); ?></h2>

        <table class="table table-bordered custom-table-bg">
            <tbody>
            <tr>
                <td>Мастер</td>
                <td>
                    <input type="text" value="<?php echo e($order->master ??  'Не назначен'); ?>" class="form-control" readonly>
                </td>
            </tr>
            <tr>
                <td>ФИО клиента</td>
                <td>
                    <input type="text" value="<?php echo e($order->full_name_client); ?>" class="form-control" readonly>
                </td>
            </tr>
            <tr>
                <td>Марка</td>
                <td>
                    <input type="text" value="<?php echo e($order->mark); ?>" class="form-control" readonly>
                </td>
            </tr>
            <tr>
                <td>Модель</td>
                <td>
                    <input type="text" value="<?php echo e($order->model); ?>" class="form-control" readonly>
                </td>
            </tr>
            <tr>
                <td>Гос. номер</td>
                <td>
                    <input type="text" value="<?php echo e($order->state_number . ' ' . $order->region); ?>" class="form-control" readonly>
                </td>
            </tr>
            <tr>
                <td>Цена</td>
                <td>
                    <input type="text" value="<?php echo e($order->price ?? 'Не установлена'); ?>" class="form-control" readonly>
                </td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>
                    <textarea class="form-control" readonly><?php echo e($order->description ?? 'Не установлено'); ?></textarea>
                </td>
            </tr>
            <tr>
                <td>Статус</td>
                <td>
                    <input type="text" value="<?php echo e($order->status); ?>" class="form-control" readonly>
                </td>
            </tr>
            <tr>
                <td>Дата завершения</td>
                <td>
                    <input type="text" value="<?php echo e($order->EndTime ? \Carbon\Carbon::parse($order->EndTime)->format('d.m.Y') : 'Не установлена'); ?>" class="form-control" readonly>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\headsplit\PhpstormProjects\AutoService\resources\views/pages/order.blade.php ENDPATH**/ ?>