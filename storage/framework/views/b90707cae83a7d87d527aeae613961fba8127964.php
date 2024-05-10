
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar"><?php echo e(__('Plan request management')); ?></h1>
        </div>
        <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="filter-div d-flex justify-content-between">
            <div class="col-left">
                <?php if(!empty($rows)): ?>
                    <form method="post" action="<?php echo e(route('user.admin.plan_request.bulkEdit')); ?>" class="filter-form filter-form-left d-flex justify-content-start">
                        <?php echo e(csrf_field()); ?>

                        <select name="action" class="form-control">
                            <option value=""><?php echo e(__(" Bulk Actions ")); ?></option>
                            <option value="completed"><?php echo e(__("Mark as completed")); ?></option>
                            <option value="cancelled"><?php echo e(__("Mark as cancelled")); ?></option>
                        </select>
                        <button data-confirm="<?php echo e(__("Do you want to delete?")); ?>" class="btn-info btn btn-icon dungdt-apply-form-btn" type="button"><?php echo e(__('Apply')); ?></button>
                    </form>
                <?php endif; ?>
            </div>
            <div class="col-left">
                <form method="get" action="" class="filter-form filter-form-right d-flex justify-content-end">
                    <select name="status" class="form-control">
                        <option value=""><?php echo e(__("-- Status --")); ?></option>
                        <option <?php if(request()->query('status') == 'fail'): ?> selected <?php endif; ?> value="fail"><?php echo e(__("Failed")); ?></option>
                        <option <?php if(request()->query('status') == 'processing'): ?> selected <?php endif; ?> value="processing"><?php echo e(__("Processing")); ?></option>
                        <option <?php if(request()->query('status') == 'completed'): ?> selected <?php endif; ?> value="completed"><?php echo e(__("Completed")); ?></option>
                    </select>
                    <?php echo csrf_field(); ?>
                    <?php
                    $user = !empty(Request()->user_id) ? App\User::find(Request()->user_id) : false;
                    \App\Helpers\AdminForm::select2('user_id', [
                        'configs' => [
                            'ajax'        => [
                                'url'      => route('user.admin.getForSelect2'),
                                'dataType' => 'json'
                            ],
                            'allowClear'  => true,
                            'placeholder' => __('-- User --')
                        ]
                    ], !empty($user->id) ? [
                        $user->id,
                        $user->name_or_email . ' (#' . $user->id . ')'
                    ] : false)
                    ?>
                    <button class="btn-info btn btn-icon" type="submit"><?php echo e(__('Filter')); ?></button>
                </form>
            </div>
        </div>
        <div class="text-right">
            <p><i><?php echo e(__('Found :total items',['total'=>$rows->total()])); ?></i></p>
        </div>
        <div class="panel booking-history-manager">
            <div class="panel-title"><?php echo e(__('Purchase logs')); ?></div>
            <div class="panel-body">
                <form action="" class="bravo-form-item">
                    <table class="table table-hover bravo-list-item">
                        <thead>
                        <tr>
                            <th width="80px"><input type="checkbox" class="check-all"></th>
                            <th><?php echo e(__('Customer')); ?></th>
                            <th><?php echo e(__('Plan')); ?></th>
                            <th width="80px"><?php echo e(__('Amount')); ?></th>
                            <th width="80px"><?php echo e(__('Status')); ?></th>
                            <th width="150px"><?php echo e(__('Payment Method')); ?></th>
                            <th width="120px"><?php echo e(__('Created At')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if($rows->total()): ?>
                            <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><input type="checkbox" class="check-item" name="ids[]" value="<?php echo e($row->id); ?>">
                                        #<?php echo e($row->id); ?></td>
                                    <td>
                                        <?php if($row->user): ?>
                                            <a target="_blank" href="<?php echo e(route('user.admin.detail',['id' => $row->user->id])); ?>"><?php echo e($row->user->display_name); ?></a>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if(!empty($row->plan)): ?>
                                            <p><?php echo e(__('Name: :name',['name'=>$row->plan->title])); ?>


                                            <?php if($row->getMeta('annual')!=1): ?>
                                                <p><?php echo e(__('Duration:  :duration_text',['duration_text'=>$row->plan->duration_text])); ?></p>
                                                <?php else: ?>
                                                <p><?php echo e(__('Year')); ?></p>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e(format_money_main($row->amount)); ?></td>
                                    <td>
                                        <span class="badge badge-<?php echo e($row->status_badge); ?>"><?php echo e($row->statusName); ?></span>
                                    </td>
                                    <td>
                                        <?php echo e($row->gatewayObj ? $row->gatewayObj->getDisplayName() : ''); ?>

                                    </td>
                                    <td><?php echo e(display_datetime($row->updated_at)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center"><b><?php echo e(__("No data")); ?></b></td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <?php echo e($rows->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\modules/User/Views/admin/plan-request/index.blade.php ENDPATH**/ ?>