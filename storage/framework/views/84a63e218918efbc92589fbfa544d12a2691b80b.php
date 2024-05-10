<?php if(is_default_lang()): ?>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label><?php echo e(__("Price")); ?> <span class="text-danger">*</span></label>
                <input type="number" required value="<?php echo e($row->price); ?>" min="1" placeholder="<?php echo e(__("Price")); ?>" name="price" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label><?php echo e(__("Number of room")); ?> <span class="text-danger">*</span></label>
                <input type="number" required value="<?php echo e($row->number ?? 1); ?>" min="1" max="100" placeholder="<?php echo e(__("Number")); ?>" name="number" class="form-control">
            </div>
        </div>
    </div>
    <hr>
    <?php if(is_default_lang()): ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label class="control-label"><?php echo e(__("Minimum day stay requirements")); ?></label>
                    <input type="number" name="min_day_stays" class="form-control" value="<?php echo e($row->min_day_stays); ?>" placeholder="<?php echo e(__("Ex: 2")); ?>">
                    <i><?php echo e(__("Leave blank if you dont need to set minimum day stay option")); ?></i>
                </div>
            </div>
        </div>
        <hr>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label><?php echo e(__("Number of beds")); ?> </label>
                <input type="number"  value="<?php echo e($row->beds ?? 1); ?>" min="1" max="10" placeholder="<?php echo e(__("Number")); ?>" name="beds" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label><?php echo e(__("Room Size")); ?> </label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="size" value="<?php echo e($row->size ?? 0); ?>" placeholder="<?php echo e(__("Room size")); ?>" >
                    <div class="input-group-append">
                        <span class="input-group-text" ><?php echo size_unit_format(); ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label><?php echo e(__("Max Adults")); ?> </label>
                <input type="number" min="1"  value="<?php echo e($row->adults ?? 1); ?>"  name="adults" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label><?php echo e(__("Max Children")); ?> </label>
                <input type="number" min="0"  value="<?php echo e($row->children ?? 0); ?>"  name="children" class="form-control">
            </div>
        </div>
    </div>
    <hr>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\modules/Hotel/Views/admin/room/form-detail/pricing.blade.php ENDPATH**/ ?>