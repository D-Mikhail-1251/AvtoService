<?php $__env->startSection('main'); ?>
    <h1 style="text-align: center; color: #FFFFFF; padding-top: 30px">Наши мастера</h1>
    <div class="d-flex justify-content-center">
            <div class="cards d-flex flex-wrap justify-content-center mt-5 gap-3">
                <?php $__currentLoopData = $masters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $master): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $workExperience = \Carbon\Carbon::parse($master->work_experience);
                        $now = \Carbon\Carbon::now();
                        $diff = $now->diff($workExperience);
                    ?>
                    <div class="card" data-bs-theme="dark" style="width: 25rem;">
                        <img src="<?php echo e($master->image ?? 'https://avatars.mds.yandex.net/i?id=d6493f0f6e42938ed8678a1ffb2b2415_l-4821375-images-thumbs&n=13'); ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($master->name); ?> <?php echo e($master->last_name); ?></h5>
                            <p class="card-text">
                                Опыт работы:
                                <?php echo e($diff->y); ?> <?php echo e($diff->y == 1 ? 'год' : ($diff->y > 1 && $diff->y < 5 ? 'года' : 'лет')); ?>

                                <?php echo e($diff->m); ?> <?php echo e($diff->m == 1 ? 'месяц' : ($diff->m > 1 && $diff->m < 5 ? 'месяца' : 'месяцев')); ?>

                                <?php echo e($diff->d); ?> <?php echo e($diff->d == 1 ? 'день' : ($diff->d > 1 && $diff->d < 5 ? 'дня' : 'дней')); ?>

                            </p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\headsplit\PhpstormProjects\AutoService\resources\views/pages/masters.blade.php ENDPATH**/ ?>