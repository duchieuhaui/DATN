<?php echo $__env->make('Hotel::admin.room.form-detail.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('Hotel::admin.room.form-detail.pricing', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('Hotel::admin.room.form-detail.attributes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('Hotel::admin.room.form-detail.ical', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if(is_default_lang()): ?>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label ><strong><?php echo e(__('Status')); ?></strong> </label>
                <select name="status"  class="custom-select">
                    <option value="publish" ><?php echo e(__('Publish')); ?></option>
                    <option value="pending"  <?php if($row->status == 'pending'): ?> selected <?php endif; ?> ><?php echo e(__('Pending')); ?></option>
                    <option value="draft"  <?php if($row->status == 'draft'): ?> selected <?php endif; ?> ><?php echo e(__('Draft')); ?></option>
                </select>
            </div>
        </div>
    </div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\modules/Hotel/Views/admin/room/form.blade.php ENDPATH**/ ?>