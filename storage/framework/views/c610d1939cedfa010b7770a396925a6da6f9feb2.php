<div class="form-group magic-field" data-id="title" data-type="title">
    <label class="control-label"><?php echo e(__('Title')); ?></label>
    <input type="text" value="<?php echo e($translation->title ?? 'New Post'); ?>" placeholder="News title" name="title" class="form-control">
</div>
<div class="form-group magic-field" data-id="content" data-type="content" data-editor="1">
    <label class="control-label"><?php echo e(__('Content')); ?> </label>
    <div class="">
        <textarea name="content" class="d-none has-ckeditor" id="content" cols="30" rows="10"><?php echo e($translation->content); ?></textarea>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\modules/News/Views/admin/news/form.blade.php ENDPATH**/ ?>