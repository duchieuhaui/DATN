
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar"><?php echo e(__("Plan Report")); ?></h1>
        </div>
        <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="filter-div d-flex justify-content-between ">
                    <div class="col-left">












                    </div>
                    <div class="col-left">
                        <form method="get" action="" class="filter-form filter-form-right d-flex justify-content-end" role="search">
                            <?php if(is_admin()): ?>
                                <?php
                                $company = \App\User::find(Request()->input('create_user'));
                                \App\Helpers\AdminForm::select2('create_user', [
                                    'configs' => [
                                        'ajax'        => [
                                            'url' => route('user.admin.getForSelect2'),
                                            'dataType' => 'json'
                                        ],
                                        'allowClear'  => true,
                                        'placeholder' => __('-- Select Employer --')
                                    ]
                                ], !empty($company->id) ? [
                                    $company->id,
                                    $company->getDisplayName()
                                ] : false)
                                ?>
                            <?php endif; ?>
                                <select name="plan_id" class="form-control">
                                       <option value=""><?php echo e(__(" All Plan ")); ?></option>
                                    <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <option <?php if(Request()->plan_id == $plan->id): ?> selected <?php endif; ?> value="<?php echo e($plan->id); ?>"><?php echo e($plan->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            <button class="btn-info btn btn-icon btn_search" id="search-submit" type="submit"><?php echo e(__('Search')); ?></button>
                        </form>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-body">
                        <form class="bravo-form-item">
                            <table class="table table-hover">
                                <thead>
                                <tr>

                                    <th><?php echo e(__("Plan ID")); ?></th>
                                    <th><?php echo e(__("Customer")); ?></th>
                                    <th><?php echo e(__("Plan Name")); ?></th>
                                    <th><?php echo e(__("Expiry")); ?></th>
                                    <th><?php echo e(__("Used/Total")); ?></th>
                                    <th><?php echo e(__("Price")); ?></th>
                                    <th><?php echo e(__("Status")); ?></th>
                                    <th width="100px"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if($rows->total() > 0): ?>
                                    <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>

                                            <td>#<?php echo e($row->id); ?></td>
                                            <td><?php echo e($row->user ? $row->user->getDisplayName() : ''); ?></td>
                                            <td class="trans-id"><?php echo e($row->plan->title ?? ''); ?></td>
                                            <td class="total-jobs"><?php echo e(display_datetime($row->end_date)); ?></td>
                                            <td class="used"><?php if(!$row->max_service): ?> <?php echo e(__("Unlimited")); ?> <?php else: ?> <?php echo e($row->used); ?>/<?php echo e($row->max_service); ?> <?php endif; ?></td>
                                            <td class="remaining"><?php echo e(format_money($row->price)); ?></td>
                                            <td >
                                                <?php if($row->status==0): ?>
                                                    <div class="text-warning mb-3"><?php echo e(__('Pending')); ?></div>
                                                <?php elseif($row->status==2): ?>
                                                    <div class="text-warning mb-3"><?php echo e(__('Cancel')); ?></div>
                                                <?php elseif($row->is_valid): ?>
                                                    <span class="text-success"><?php echo e(__('Active')); ?></span>
                                                <?php else: ?>
                                                    <div class="text-danger mb-3"><?php echo e(__('Expired')); ?></div>
                                                    <div>
                                                        <a href="<?php echo e(route('plan')); ?>" class="btn btn-warning"><?php echo e(__('Renew')); ?></a>
                                                    </div>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr class="text-center">
                                        <td colspan="6"><?php echo e(__("No data")); ?></td>
                                    </tr>
                                <?php endif; ?>
                                </tbody>
                            </table>
                            <?php echo e($rows->appends(request()->query())->links()); ?>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\modules/User/Views/admin/plan-report/index.blade.php ENDPATH**/ ?>