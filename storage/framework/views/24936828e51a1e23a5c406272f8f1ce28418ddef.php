<input type="hidden" name="mytravel_save_extra" value="1">
<div class="panel">
    <div class="panel-title"><strong><?php echo e(__("Specifications")); ?></strong></div>
    <div class="panel-body">
        <div class="form-group-item">
            <label class="control-label"><?php echo e(__('Specifications List')); ?></label>
            <div class="g-items-header">
                <div class="row">
                    <div class="col-md-5"><?php echo e(__("Name")); ?></div>
                    <div class="col-md-6"><?php echo e(__('Desc')); ?></div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            <div class="g-items">
                <?php if(!empty($translation->specifications)): ?>
                    <?php $__currentLoopData = $translation->specifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item" data-number="<?php echo e($key); ?>">
                            <div class="row">
                                <div class="col-md-5">
                                    <input type="text" name="specifications[<?php echo e($key); ?>][name]" class="form-control" value="<?php echo e($item['name'] ?? ''); ?>" placeholder="<?php echo e(__('Extra price name')); ?>">
                                </div>
                                <div class="col-md-6">
                                    <textarea name="specifications[<?php echo e($key); ?>][desc]" class="form-control" placeholder="<?php echo e(__('Specifications Desc')); ?>"><?php echo e($item['desc'] ?? ""); ?></textarea>
                                </div>
                                <div class="col-md-1">
                                    <?php if(is_default_lang()): ?>
                                        <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
            <div class="text-right">
                <?php if(is_default_lang()): ?>
                    <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> <?php echo e(__('Add item')); ?></span>
                <?php endif; ?>
            </div>
            <div class="g-more hide">
                <div class="item" data-number="__number__">
                    <div class="row">
                        <div class="col-md-5">
                            <input type="text" __name__="specifications[__number__][name]" class="form-control" value="" placeholder="<?php echo e(__('Specifications name')); ?>">
                        </div>
                        <div class="col-md-6">
                            <textarea __name__="specifications[__number__][desc]" class="form-control" placeholder="<?php echo e(__('Specifications Desc')); ?>"></textarea>
                        </div>
                        <div class="col-md-1">
                            <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\themes/Mytravel/Car/Views/admin/car/mytravel/specifications.blade.php ENDPATH**/ ?>