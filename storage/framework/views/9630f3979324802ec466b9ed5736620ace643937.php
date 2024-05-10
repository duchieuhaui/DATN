
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="mb40">
            <div class="d-flex justify-content-between">
                <h1 class="title-bar"><?php echo e($group['name']); ?></h1>
            </div>
            <hr>
        </div>
        <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <strong>
                            <i class="fa fa-cogs"></i> <?php echo e(__("Main Settings")); ?></strong>
                    </div>
                    <div class="list-group list-group-flush">
                        <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a
                                class="list-group-item list-group-item-action <?php if($current_group == $id): ?> active <?php endif; ?>"
                                href="<?php echo e(route('core.admin.settings.index',['group'=>$id])); ?>"
                            >
                                <?php if(!empty($setting['icon'])): ?>
                                    <i class="<?php echo e($setting['icon']); ?>"></i>
                                <?php endif; ?>
                                <?php echo e($setting['title']); ?>

                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <form action="<?php echo e(route('core.admin.settings.store',['group'=>$current_group])); ?>" method="post" autocomplete="off">
                    <?php echo csrf_field(); ?>

                    <?php echo $__env->make('Language::admin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="lang-content-box">
                        <?php if(empty($group['view'])): ?>
                            <?php echo $__env->make('Core::admin.settings.groups.'.$current_group, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php else: ?>
                            <?php echo $__env->make($group['view'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </div>

                    <hr>
                    <div class="d-flex justify-content-between">
                        <span></span>
                        <button class="btn btn-primary" type="submit"><?php echo e(__('Save settings')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\mytravel.2.4.0\modules/Core/Views/admin/settings/index.blade.php ENDPATH**/ ?>