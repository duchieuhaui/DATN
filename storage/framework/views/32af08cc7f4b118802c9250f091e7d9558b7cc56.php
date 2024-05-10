<div class="g-rules border-bottom">
    <h3 class="font-size-21 font-weight-bold text-dark mb-4"><?php echo e(__("Hotel Rules - Policies")); ?></h3>
    <div class="description">
        <div class="row">
            <div class="col-lg-4">
                <div class="key"><?php echo e(__("Check In")); ?></div>
            </div>
            <div class="col-lg-8">
                <div class="value">	<strong><?php echo e($row->check_in_time); ?></strong> </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="key"><?php echo e(__("Check Out")); ?></div>
            </div>
            <div class="col-lg-8">
                <div class="value">	<strong><?php echo e($row->check_out_time); ?></strong> </div>
            </div>
        </div>
        <?php if($translation->policy): ?>
            <div class="row">
                <div class="col-lg-4">
                    <div class="key"><?php echo e(__("Hotel Policies")); ?></div>
                </div>
                <div class="col-lg-8">
                    <?php $__currentLoopData = $translation->policy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item <?php if($key > 1): ?> d-none <?php endif; ?>">
                            <div class="strong"><?php echo e($item['title']); ?></div>
                            <div class="context"><?php echo $item['content']; ?></div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if( count($translation->policy) > 2): ?>
                        <div class="btn-show-all">
                            <span class="text"><?php echo e(__("Show All")); ?></span>
                            <i class="fa fa-caret-down"></i>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div><?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\themes/Mytravel/Hotel/Views/frontend/layouts/details/hotel-rules-policy.blade.php ENDPATH**/ ?>