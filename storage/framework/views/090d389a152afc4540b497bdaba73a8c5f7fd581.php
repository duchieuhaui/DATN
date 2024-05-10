
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar"><?php echo e(__("Room Management")); ?></h1>
            <div class="title-actions">
                <a href="<?php echo e(route('hotel.admin.room.availability.index',['hotel_id'=>$hotel->id])); ?>" class="btn btn-warning btn-xs"><i class="fa fa-calendar"></i> <?php echo e(__("Room Availability")); ?></a>
                <a href="<?php echo e(route('hotel.admin.edit',['id'=>$hotel->id])); ?>" class="btn btn-info btn-xs"><i class="fa fa-hand-o-right"></i> <?php echo e(__("Back to hotel")); ?></a>
            </div>
        </div>
        <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-md-4">
                <form novalidate class="needs-validation" action="<?php echo e(route('hotel.admin.room.store',['hotel_id'=>$hotel->id,'id'=>($row->id) ? $row->id : '-1','lang'=>request()->query('lang')])); ?>" method="post">
                    <div class="panel">
                        <div class="panel-title"><strong><?php echo e(__("Add Room")); ?></strong></div>
                        <div class="panel-body">
                            <?php echo csrf_field(); ?>
                            <?php echo $__env->make('Hotel::admin.room.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="panel-footer">
                            <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> <?php echo e(__("Add Room")); ?></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-8">
                <div class="filter-div d-flex justify-content-between ">
                    <div class="col-left">
                        <?php if(!empty($rows)): ?>
                            <form method="post" action="<?php echo e(route('hotel.admin.room.bulkEdit')); ?>" class="filter-form filter-form-left d-flex justify-content-start">
                                <?php echo e(csrf_field()); ?>

                                <select name="action" class="form-control">
                                    <option value=""><?php echo e(__(" Bulk Actions ")); ?></option>
                                    <option value="publish"><?php echo e(__(" Publish ")); ?></option>
                                    <option value="draft"><?php echo e(__(" Move to Draft ")); ?></option>
                                    <option value="pending"><?php echo e(__("Move to Pending")); ?></option>
                                    
                                    <option value="delete"><?php echo e(__(" Delete ")); ?></option>
                                </select>
                                <button data-confirm="<?php echo e(__("Do you want to delete?")); ?>" class="btn-info btn btn-icon dungdt-apply-form-btn" type="button"><?php echo e(__('Apply')); ?></button>
                            </form>
                        <?php endif; ?>
                    </div>
                    <div class="col-right">
                        <p><i><?php echo e(__('Found :total items',['total'=>$rows->total()])); ?></i></p>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-body">
                        <form action="" class="bravo-form-item">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th width="45px"><input type="checkbox" class="check-all"></th>
                                        <th> <?php echo e(__('Room name')); ?></th>
                                        <th width="100px"> <?php echo e(__('Number')); ?></th>
                                        <th width="100px"> <?php echo e(__('Price')); ?></th>
                                        <th width="100px"> <?php echo e(__('Status')); ?></th>
                                        <th width="100px"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if($rows->total() > 0): ?>
                                        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="<?php echo e($row->status); ?>">
                                                <td><input type="checkbox" name="ids[]" class="check-item" value="<?php echo e($row->id); ?>">
                                                </td>
                                                <td class="title">
                                                    <a href="<?php echo e(route('hotel.admin.room.edit',['hotel_id'=>$hotel->id,'id'=>$row->id])); ?>"><?php echo e($row->title); ?></a>
                                                </td>
                                                <td><?php echo e($row->number); ?></td>
                                                <td><?php echo e(format_money($row->price)); ?></td>
                                                <td><span class="badge badge-<?php echo e($row->status); ?>"><?php echo e($row->status); ?></span></td>
                                                <td>
                                                    <a href="<?php echo e(route('hotel.admin.room.edit',['id'=>$row->id,'hotel_id'=>$hotel->id])); ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> <?php echo e(__('Edit')); ?>

                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="7"><?php echo e(__("No room found")); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                        <?php echo e($rows->appends(request()->query())->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\modules/Hotel/Views/admin/room/index.blade.php ENDPATH**/ ?>