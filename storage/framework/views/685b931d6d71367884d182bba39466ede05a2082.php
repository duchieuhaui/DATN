<?php
if(!is_default_lang()) return;
?>
<input type="hidden" name="mytravel_save_extra" value="1">
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label class="control-label"><?php echo e(__("Date From-To")); ?></label>
            <input type="text" name="date_form_to" class="form-control" value="<?php echo e($row->date_form_to); ?>" placeholder="<?php echo e(__("Date From-To")); ?>">
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label class="control-label"><?php echo e(__("Min age")); ?></label>
            <input type="text" name="min_age" class="form-control" value="<?php echo e($row->min_age); ?>" placeholder="<?php echo e(__("Min age")); ?>">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label class="control-label"><?php echo e(__("Pickup")); ?></label>
            <input type="text" name="pickup" class="form-control" value="<?php echo e($row->pickup); ?>" placeholder="<?php echo e(__("Pickup")); ?>">
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label class="control-label"><?php echo e(__("Wifi available")); ?></label> <br>
            <input type="checkbox" name="wifi_available" <?php if($row->wifi_available): ?> checked <?php endif; ?> value="1"> <?php echo e(__("Enable featured")); ?>

        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\themes/Mytravel/Tour/Views/admin/tour/extra_mytravel.blade.php ENDPATH**/ ?>