<input type="hidden" name="mytravel_save_extra" value="1">
<div class="form-group-item">
    <label class="control-label"><?php echo e(__('Badge tag')); ?></label>
    <div class="g-items-header">
        <div class="row">
            <div class="col-md-5"><?php echo e(__("Title")); ?></div>
            <div class="col-md-5"><?php echo e(__('Color')); ?></div>
            <div class="col-md-1"></div>
        </div>
    </div>
    <div class="g-items">
        <?php if(!empty($translation->badge_tags)): ?>
            <?php $__currentLoopData = $translation->badge_tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item" data-number="<?php echo e($key); ?>">
                    <div class="row">
                        <div class="col-md-7">
                            <input type="text" name="badge_tags[<?php echo e($key); ?>][title]" class="form-control" value="<?php echo e($item['title']); ?>" placeholder="<?php echo e(__('Eg: service VIP')); ?>">
                        </div>
                        <div class="col-md-4">
                            <select name="badge_tags[<?php echo e($key); ?>][color]" class="form-control">
                                <option <?php if($item['color'] == "brown"): ?> selected <?php endif; ?> value="brown"><?php echo e(__("Brown")); ?></option>
                                <option <?php if($item['color'] == "maroon"): ?> selected <?php endif; ?> value="maroon"><?php echo e(__("Maroon")); ?></option>
                                <option <?php if($item['color'] == "green"): ?> selected <?php endif; ?> value="green"><?php echo e(__("Green")); ?></option>
                                <option <?php if($item['color'] == "danger"): ?> selected <?php endif; ?> value="danger"><?php echo e(__("Danger")); ?></option>
                                <option <?php if($item['color'] == "warning"): ?> selected <?php endif; ?> value="warning"><?php echo e(__("Warning")); ?></option>
                                <option <?php if($item['color'] == "info"): ?> selected <?php endif; ?> value="info"><?php echo e(__("Info")); ?></option>
                                <option <?php if($item['color'] == "success"): ?> selected <?php endif; ?> value="success"><?php echo e(__("Success")); ?></option>
                                <option <?php if($item['color'] == "dark"): ?> selected <?php endif; ?> value="dark"><?php echo e(__("Dark")); ?></option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
    <div class="text-right">
        <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> <?php echo e(__('Add item')); ?></span>
    </div>
    <div class="g-more hide">
        <div class="item" data-number="__number__">
            <div class="row">
                <div class="col-md-7">
                    <input type="text" __name__="badge_tags[__number__][title]" class="form-control" placeholder="<?php echo e(__('Eg: Service VIP')); ?>">
                </div>
                <div class="col-md-4">
                    <select __name__="badge_tags[__number__][color]" class="form-control">
                        <option value="brown"><?php echo e(__("Brown")); ?></option>
                        <option value="maroon"><?php echo e(__("Maroon")); ?></option>
                        <option value="green"><?php echo e(__("Green")); ?></option>
                        <option value="danger"><?php echo e(__("Danger")); ?></option>
                        <option value="warning"><?php echo e(__("Warning")); ?></option>
                        <option value="info"><?php echo e(__("Info")); ?></option>
                        <option value="success"><?php echo e(__("Success")); ?></option>
                        <option value="dark"><?php echo e(__("Dark")); ?></option>
                    </select>
                </div>
                <div class="col-md-1">
                    <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\themes/Mytravel/Hotel/Views/admin/hotel/mytravel/badge.blade.php ENDPATH**/ ?>