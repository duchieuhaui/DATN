<div class="form-group">
	<label><?php echo e(__("Import url")); ?></label>
	<input type="text" value="<?php echo e($row->ical_import_url); ?>" name="ical_import_url" class="form-control">
</div>
<?php if(!empty($row->id)): ?>
	<div class="form-group">
		<label><?php echo e(__("Export url")); ?></label>
		<input type="text" value="<?php echo e(route('booking.admin.export-ical',['type'=>'room',$row->id])); ?>" class="form-control">
	</div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\modules/Hotel/Views/admin/room/form-detail/ical.blade.php ENDPATH**/ ?>