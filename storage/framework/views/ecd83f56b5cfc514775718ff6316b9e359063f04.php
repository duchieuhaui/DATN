<?php if(is_default_lang()): ?>
    <div class="row">
        <div class="col-sm-4">
            <h3 class="form-group-title"><?php echo e(__("Disable Wallet module?")); ?></h3>
        </div>
        <div class="col-sm-8">
            <div class="panel">
                <div class="panel-title"><strong><?php echo e(__("Disable wallet module")); ?></strong></div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-controls">
                            <label><input type="checkbox" name="wallet_module_disable" value="1" <?php if(setting_item('wallet_module_disable')): ?> checked <?php endif; ?> > <?php echo e(__('Yes, please disable it')); ?></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-4">
            <h3 class="form-group-title"><?php echo e(__("Credit Options")); ?></h3>
        </div>
        <div class="col-sm-8">
            <div class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="" ><?php echo e(__("Credit exchange rate")); ?></label>
                        <div class="form-controls">
                            <input type="number" class="form-control" name="wallet_credit_exchange_rate" min="0" step="0.1" value="<?php echo e(setting_item('wallet_credit_exchange_rate',1)); ?>"/>
                            <p><i><?php echo e(__("Exchange rate will be used in checkout page. Example: Credit * Exchange rate = Money")); ?></i></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-4">
            <h3 class="form-group-title"><?php echo e(__("Deposit Options")); ?></h3>
        </div>
        <div class="col-sm-8">
            <div class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label ><?php echo e(__("Deposit type")); ?></label>
                        <select name="wallet_deposit_type" class="form-control">
                            <option value=""><?php echo e(__('User input')); ?></option>
                            <option value="list" <?php echo e(setting_item('wallet_deposit_type') == 'list' ? 'selected' : ''); ?> ><?php echo e(__('Select from lists')); ?></option>
                        </select>
                    </div>
                    <div class="form-group" data-condition="wallet_deposit_type:is()">
                        <label ><?php echo e(__("Deposit rate")); ?></label>
                        <input type="number" class="form-control" name="wallet_deposit_rate" min="0" step="0.1" value="<?php echo e(setting_item('wallet_deposit_rate',1)); ?>"/>
                        <p><i><?php echo e(__("Example: Money * Deposit rate = Credit")); ?></i></p>
                    </div>
                    <div class="form-group" data-condition="wallet_deposit_type:is(list)">
                        <label class="" ><?php echo e(__("Deposit lists")); ?></label>

                        <div class="form-controls">
                                <div class="form-group-item">
                                    <div class="form-group-item">
                                        <div class="g-items-header">
                                            <div class="row">
                                                <div class="col-md-5"><?php echo e(__("Name")); ?></div>
                                                <div class="col-md-3"><?php echo e(__('Amount')); ?></div>
                                                <div class="col-md-3"><?php echo e(__('Earn credit')); ?></div>
                                                <div class="col-md-1"></div>
                                            </div>
                                        </div>
                                        <div class="g-items">
                                            <?php
                                            $items = json_decode(setting_item('wallet_deposit_lists'),true);
                                            if(empty($items) or !is_array($items))
                                                $items = [];
                                            ?>
                                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="item" data-number="<?php echo e($key); ?>">
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <input type="text" name="wallet_deposit_lists[<?php echo e($key); ?>][name]" class="form-control" value="<?php echo e($item['name']); ?>">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="number" name="wallet_deposit_lists[<?php echo e($key); ?>][amount]" step="0.1" class="form-control" value="<?php echo e($item['amount']); ?>" >
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="number" name="wallet_deposit_lists[<?php echo e($key); ?>][credit]" step="0.1" class="form-control" value="<?php echo e($item['credit']); ?>" >
                                                        </div>
                                                        <div class="col-md-1">
                                                            <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <p><i><?php echo e(__("All amount will be in main currency")); ?></i></p>
                                        <div class="text-right">
                                            <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> <?php echo e(__('Add item')); ?></span>
                                        </div>
                                        <div class="g-more hide">
                                            <div class="item" data-number="__number__">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <input type="text" __name__="wallet_deposit_lists[__number__][name]" class="form-control" value="">
                                                    </div>

                                                    <div class="col-md-3">
                                                        <input type="number" __name__="wallet_deposit_lists[__number__][amount]" step="0.1" class="form-control" value="" >
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="number" __name__="wallet_deposit_lists[__number__][credit]" step="0.1" class="form-control" value="0" >
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
    </div>
<?php endif; ?>
<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__("New Credit Purchase Email Template")); ?></h3>
        <div class="form-group-desc">
            <?php $__currentLoopData = \Modules\User\Emails\CreditPaymentEmail::CODE; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div><code><?php echo e($value); ?></code></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-title"><strong><?php echo e(__("Email for Admin")); ?></strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="" ><?php echo e(__("Subject")); ?></label>
                    <div class="form-controls">
                        <textarea name="wallet_new_deposit_admin_subject" class="form-control" cols="30" rows="2"><?php echo e(setting_item_with_lang('wallet_new_deposit_admin_subject',request()->query('lang')) ?? '','New credit order'); ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="" ><?php echo e(__("Content")); ?></label>
                    <div class="form-controls">
                        <textarea name="wallet_new_deposit_admin_content" class="d-none has-ckeditor" cols="30" rows="10"><?php echo e(setting_item_with_lang('wallet_new_deposit_admin_content',request()->query('lang')) ?? '',\Modules\User\Emails\CreditPaymentEmail::defaultNewBody()); ?></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-title"><strong><?php echo e(__("Email for Customer")); ?></strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="" ><?php echo e(__("Subject")); ?></label>
                    <div class="form-controls">
                        <textarea name="wallet_new_deposit_customer_subject" class="form-control" cols="30" rows="2"><?php echo e(setting_item_with_lang('wallet_new_deposit_customer_subject',request()->query('lang')) ?? '','Thank you for your purchasing'); ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="" ><?php echo e(__("Content")); ?></label>
                    <div class="form-controls">
                        <textarea name="wallet_new_deposit_customer_content" class="d-none has-ckeditor" cols="30" rows="10"><?php echo e(setting_item_with_lang('wallet_new_deposit_customer_content',request()->query('lang')) ?? '',\Modules\User\Emails\CreditPaymentEmail::defaultNewBody()); ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__("Credit Purchase Updated Template")); ?></h3>
        <div class="form-group-desc">
            <?php $__currentLoopData = \Modules\User\Emails\CreditPaymentEmail::CODE; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div><code><?php echo e($value); ?></code></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-title"><strong><?php echo e(__("Email for Admin")); ?></strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="" ><?php echo e(__("Subject")); ?></label>
                    <div class="form-controls">
                        <textarea name="wallet_update_deposit_admin_subject" class="form-control" cols="30" rows="2"><?php echo e(setting_item_with_lang('wallet_update_deposit_admin_subject',request()->query('lang')) ?? ''); ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="" ><?php echo e(__("Content")); ?></label>
                    <div class="form-controls">
                        <textarea name="wallet_update_deposit_admin_content" class="d-none has-ckeditor" cols="30" rows="10"><?php echo e(setting_item_with_lang('wallet_update_deposit_admin_content',request()->query('lang')) ?? ''); ?></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-title"><strong><?php echo e(__("Email for Customer")); ?></strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="" ><?php echo e(__("Subject")); ?></label>
                    <div class="form-controls">
                        <textarea name="wallet_update_deposit_customer_subject" class="form-control" cols="30" rows="2"><?php echo e(setting_item_with_lang('wallet_update_deposit_customer_subject',request()->query('lang')) ?? ''); ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="" ><?php echo e(__("Content")); ?></label>
                    <div class="form-controls">
                        <textarea name="wallet_update_deposit_customer_content" class="d-none has-ckeditor" cols="30" rows="10"><?php echo e(setting_item_with_lang('wallet_update_deposit_customer_content',request()->query('lang')) ?? ''); ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\modules/User/Views/admin/settings/wallet.blade.php ENDPATH**/ ?>