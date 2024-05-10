<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__('Other Settings')); ?></h3>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <label class="" ><?php echo e(__("Why Book With Us?")); ?></label>
                </div>
                <div class="form-group">
                    <div class="form-group-item">
                        <div class="form-group-item">
                            <div class="g-items-header">
                                <div class="row">
                                    <div class="col-md-3"><?php echo e(__("Title")); ?></div>
                                    <div class="col-md-8"><?php echo e(__('Class icon')); ?></div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                            <div class="g-items">
                                <?php $booking_why_book_with_us = setting_item_array('booking_why_book_with_us',[]); ?>
                                <?php $__currentLoopData = $booking_why_book_with_us; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="item" data-number="<?php echo e($key); ?>">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <label><?php echo e(__("Title")); ?></label>
                                                <div>
                                                    <input type="text" name="booking_why_book_with_us[<?php echo e($key); ?>][title]" placeholder="<?php echo e(__("Customer care available 24/7")); ?>" class="form-control" value="<?php echo e($item['title'] ?? ""); ?>">
                                                    <input type="text" name="booking_why_book_with_us[<?php echo e($key); ?>][link]" placeholder="<?php echo e(__("#")); ?>" class="form-control" value="<?php echo e($item['link'] ?? ""); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label><?php echo e(__("Icon")); ?></label>
                                                <div>
                                                    <input type="text" name="booking_why_book_with_us[<?php echo e($key); ?>][icon]"placeholder="fa fa-phone" class="form-control" value="<?php echo e($item['icon'] ?? ""); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="text-right">
                                <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> <?php echo e(__('Add item')); ?></span>
                            </div>
                            <div class="g-more hide">
                                <div class="item" data-number="__number__">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <label><?php echo e(__("Title - Link info")); ?></label>
                                            <div>
                                                <input type="text" __name__="booking_why_book_with_us[__number__][title]" placeholder="<?php echo e(__("Customer care available 24/7")); ?>" class="form-control" value="">
                                                <input type="text" __name__="booking_why_book_with_us[__number__][link]" placeholder="<?php echo e(__("#")); ?>" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label><?php echo e(__("Icon")); ?></label>
                                            <div>
                                                <input type="text" __name__="booking_why_book_with_us[__number__][icon]"placeholder="fa fa-phone" class="form-control" value="">
                                            </div>
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
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\themes/Mytravel/Booking/Views/admin/settings/setting-after-booking-config.blade.php ENDPATH**/ ?>