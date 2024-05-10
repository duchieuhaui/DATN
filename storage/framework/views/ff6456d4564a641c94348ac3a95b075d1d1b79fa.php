<div class="form-group">
    <label><?php echo e(__("Room Name")); ?> <span class="text-danger">*</span></label>
    <input type="text" required value="<?php echo clean($translation->title); ?>" placeholder="<?php echo e(__("Room name")); ?>" name="title" class="form-control">
</div>
<div class="form-group d-none">
    <label><?php echo e(__("Room Description")); ?></label>
    <textarea name="content" cols="30" rows="5" class="form-control"><?php echo e($translation->content); ?></textarea>
</div>
<?php if(is_default_lang()): ?>
    <div class="form-group">
        <label ><?php echo e(__('Feature Image')); ?> </label>
        <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('image_id',$row->image_id); ?>

    </div>

    <div class="form-group">
        <label ><?php echo e(__('Gallery')); ?></label>
        <?php echo \Modules\Media\Helpers\FileHelper::fieldGalleryUpload('gallery',$row->gallery); ?>

    </div>
    <hr>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\modules/Hotel/Views/admin/room/form-detail/content.blade.php ENDPATH**/ ?>