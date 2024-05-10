<?php if(is_default_lang()): ?>
    <div class="form-group">
        <label><?php echo e(__("Logo Color")); ?></label>
        <div class="form-controls form-group-image">
            <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('logo_id_2',setting_item('logo_id_2')); ?>

        </div>
    </div>
<?php endif; ?>
<div class="form-group">
    <label><?php echo e(__("Logo Text")); ?></label>
    <div class="form-controls">
        <input type="text" class="form-control" name="logo_text" value="<?php echo e(setting_item_with_lang('logo_text',request()->query('lang'))); ?>">
    </div>
</div><?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\themes/Mytravel/Core/Views/admin/settings/setting-after-logo.blade.php ENDPATH**/ ?>