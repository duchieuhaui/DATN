<div class="form-group">
    <label><?php echo e(__("List Contact")); ?></label>
    <div class="form-controls">
        <div class="form-group-item">
            <div class="form-group-item">
                <div class="g-items-header">
                    <div class="row">
                        <div class="col-md-4"><?php echo e(__("Title")); ?></div>
                        <div class="col-md-7"><?php echo e(__('Info Contact')); ?></div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
                <div class="g-items">
                    <?php
                    $page_contact_lists = setting_item_with_lang('page_contact_lists',request()->query('lang'));
                    if(!empty($page_contact_lists)) $page_contact_lists = json_decode($page_contact_lists,true);
                    if(empty($page_contact_lists) or !is_array($page_contact_lists))
                        $page_contact_lists = [];
                    ?>
                    <?php $__currentLoopData = $page_contact_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item" data-number="<?php echo e($key); ?>">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" name="page_contact_lists[<?php echo e($key); ?>][title]" class="form-control" value="<?php echo e($item['title']); ?>">
                                </div>
                                <div class="col-md-7">
                                    <label for=""><?php echo e(__("Address")); ?></label>
                                    <input type="text" name="page_contact_lists[<?php echo e($key); ?>][address]" class="form-control" value="<?php echo e($item['address']); ?>">
                                    <label for=""><?php echo e(__("Phone")); ?></label>
                                    <input type="text" name="page_contact_lists[<?php echo e($key); ?>][phone]" class="form-control" value="<?php echo e($item['phone']); ?>">
                                    <label for=""><?php echo e(__("Email")); ?></label>
                                    <input type="text" name="page_contact_lists[<?php echo e($key); ?>][email]" class="form-control" value="<?php echo e($item['email']); ?>">
                                    <label for=""><?php echo e(__("Link View on Map")); ?></label>
                                    <input type="text" name="page_contact_lists[<?php echo e($key); ?>][link_map]" class="form-control" value="<?php echo e($item['link_map']); ?>">
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
                            <div class="col-md-4">
                                <label for=""><?php echo e(__("Address")); ?></label>
                                <input type="text" __name__="page_contact_lists[__number__][title]" class="form-control" value="">
                            </div>
                            <div class="col-md-7">
                                <label for=""><?php echo e(__("Address")); ?></label>
                                <input type="text" __name__="page_contact_lists[__number__][address]" class="form-control" value="">
                                <label for=""><?php echo e(__("Phone")); ?></label>
                                <input type="text" __name__="page_contact_lists[__number__][phone]" class="form-control" value="">
                                <label for=""><?php echo e(__("Email")); ?></label>
                                <input type="text" __name__="page_contact_lists[__number__][email]" class="form-control" value="">
                                <label for=""><?php echo e(__("Link View on Map")); ?></label>
                                <input type="text" __name__="page_contact_lists[__number__][link_map]" class="form-control" value="">
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
<div class="form-group">
    <label class=""><?php echo e(__("Iframe google map")); ?></label>
    <div class="form-controls">
        <input type="text" class="form-control" name="page_contact_iframe_google_map" value="<?php echo e(setting_item_with_lang('page_contact_iframe_google_map',request()->query('lang'))); ?>">
    </div>
</div><?php /**PATH C:\laragon\www\mytravel.2.4.0\themes/Mytravel/Core/Views/admin/settings/setting-after-contact.blade.php ENDPATH**/ ?>