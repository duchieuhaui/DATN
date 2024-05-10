<?php if(!empty($terms)): ?>
    <div class="bravo-list-term-car border-bottom border-color-8">
        <div class="container space-1">
            <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-5 mt-4">
                <h2 class="section-title text-black font-size-30 font-weight-bold mb-0"><?php echo e($title); ?></h2>
            </div>
            <div class="row">
                <?php $__currentLoopData = $terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 col-xl-3">
                        <div class="mb-5">
                            <a class="d-block position-50-hover text-center overflow-hidden" href="<?php echo e(route('car.search',['terms' => $row['id']])); ?>">
                                <div class="bg-img-hero rounded-xs bg-gray-23 min-height-200">
                                    <div class="pt-4 mb-5">
                                        <h6 class="mb-0 font-size-17 font-weight-bold text-dark-1"><?php echo e($row['name']); ?></h6>
                                    </div>
                                    <img class="img-fluid position-50-horizontal" src="<?php echo e(get_file_url($row['image_id'],'full')); ?>" alt="<?php echo e($row['name']); ?>">
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php endif; ?>


<?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\themes/Mytravel/Car/Views/frontend/blocks/term-car/style_1.blade.php ENDPATH**/ ?>