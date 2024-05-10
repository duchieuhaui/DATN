<div class="form-group">
    <label><?php echo e(__("Footer Info Contact")); ?></label>
    <div class="form-controls">
        <div id="info_text_editor" class="ace-editor" style="height: 400px" data-theme="textmate" data-mod="html"><?php echo e(setting_item_with_lang('footer_info_text',request()->query('lang'))); ?></div>
        <textarea class="d-none" name="footer_info_text" > <?php echo e(setting_item_with_lang('footer_info_text',request()->query('lang'))); ?> </textarea>
    </div>
</div>
<?php if(is_default_lang()): ?>
    <div class="form-group">
        <label><?php echo e(__("Phone Contact")); ?></label>
        <div class="form-controls">
            <input type="text" class="form-control" name="phone_contact" value="<?php echo e(setting_item("phone_contact")); ?>">
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\themes/Mytravel/Core/Views/admin/settings/setting-after-footer.blade.php ENDPATH**/ ?>