
<?php $__env->startSection('content'); ?>
    <h2 class="title-bar no-border-bottom">
        <?php echo e(__("Booking History")); ?>

    </h2>
    <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="booking-history-manager">
        <div class="tabbable">
            <ul class="nav nav-tabs ht-nav-tabs">
                <?php $status_type = Request::query('status'); ?>
                <li class="<?php if(empty($status_type)): ?> active <?php endif; ?>">
                    <a href="<?php echo e(route("user.booking_history")); ?>"><?php echo e(__("All Booking")); ?></a>
                </li>
                <?php if(!empty($statues)): ?>
                    <?php $__currentLoopData = $statues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="<?php if(!empty($status_type) && $status_type == $status): ?> active <?php endif; ?>">
                            <a href="<?php echo e(route("user.booking_history",['status'=>$status])); ?>"><?php echo e(booking_status_to_text($status)); ?></a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </ul>
            <?php if(!empty($bookings) and $bookings->total() > 0): ?>
                <div class="tab-content">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-booking-history">
                            <thead>
                            <tr>
                                <th width="2%"><?php echo e(__("Type")); ?></th>
                                <th><?php echo e(__("Title")); ?></th>
                                <th class="a-hidden"><?php echo e(__("Order Date")); ?></th>
                                <th class="a-hidden"><?php echo e(__("Execution Time")); ?></th>
                                <th><?php echo e(__("Total")); ?></th>
                                <th><?php echo e(__("Paid")); ?></th>
                                <th><?php echo e(__("Remain")); ?></th>
                                <th class="a-hidden"><?php echo e(__("Status")); ?></th>
                                <th><?php echo e(__("Action")); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo $__env->make(ucfirst($booking->object_model).'::frontend.bookingHistory.loop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="bravo-pagination">
                        <?php echo e($bookings->appends(request()->query())->links()); ?>

                    </div>
                </div>
            <?php else: ?>
                <?php echo e(__("No Booking History")); ?>

            <?php endif; ?>
        </div>
        <div class="modal" tabindex="-1" id="modal_booking_detail">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo e(__('Booking ID: #')); ?> <span class="user_id"></span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex justify-content-center"><?php echo e(__("Loading...")); ?></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script>
        $('.btn-info-booking').on('click',function (e){
            var btn = $(this);
            $(this).find('.user_id').html(btn.data('id'));
            $(this).find('.modal-body').html('<div class="d-flex justify-content-center"><?php echo e(__("Loading...")); ?></div>');
            var modal = $("#modal_booking_detail");
            $.get(btn.data('ajax'), function (html){
                    modal.find('.modal-body').html(html);
                }
            )
        })
    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\themes/Base/User/Views/frontend/bookingHistory.blade.php ENDPATH**/ ?>