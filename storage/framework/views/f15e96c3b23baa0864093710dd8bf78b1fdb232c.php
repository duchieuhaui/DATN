
<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(url('libs/daterange/daterangepicker.css')); ?>"/>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="d-flex align-items-center justify-content-between">
        <h2 class="title-bar no-border-bottom">
            <?php echo e(__("Booking Report")); ?>

        </h2>
        <button class="btn btn-info"  data-toggle="modal" data-target="#filter"><?php echo e(__('Advanced Filter')); ?></button>
    </div>
    <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="booking-history-manager">
        <div class="tabbable">
            <ul class="nav nav-tabs ht-nav-tabs">
                <?php $status_type = Request::query('status'); ?>
                <li class="<?php if(empty($status_type)): ?> active <?php endif; ?>">
                    <a href="<?php echo e(route("vendor.bookingReport")); ?>"><?php echo e(__("All Booking")); ?></a>
                </li>
                <?php if(!empty($statues)): ?>
                    <?php $__currentLoopData = $statues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="<?php if(!empty($status_type) && $status_type == $status): ?> active <?php endif; ?>">
                            <a href="<?php echo e(route("vendor.bookingReport",['status'=>$status])); ?>"><?php echo e(booking_status_to_text($status)); ?></a>
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
                                <th width="15%"><?php echo e(__("Payment Detail")); ?></th>
                                <th><?php echo e(__("Commission")); ?></th>
                                <th class="a-hidden"><?php echo e(__("Status")); ?></th>
                                <th><?php echo e(__("Action")); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo $__env->make(ucfirst($booking->object_model).'::frontend.bookingReport.loop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
    <!-- Modal -->
    <div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-lg">
                <form action="">
                    <input type="hidden" name="status" value="<?php echo e(request()->input('status')); ?>">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__("Advanced Filter")); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><?php echo e(__("Customer name")); ?></label>
                            <input type="text" name="customer_name" class="form-control" placeholder="<?php echo e(__("Customer Name")); ?>" value="<?php echo e(request()->input("customer_name")); ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"><?php echo e(__("From - To")); ?></label>
                            <div id="reportrange">
                                <input type="text" class="form-control" name="date" placeholder="<?php echo e(__("From - To")); ?>" value="<?php echo e(request()->input("date")); ?>">
                                <input type="hidden" name="from" value="<?php echo e(date("Y-m-d",strtotime('today'))); ?>">
                                <input type="hidden" name="to" value="<?php echo e(date("Y-m-d",strtotime('today'))); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__("Close")); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo e(__("Filter")); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(url('libs/daterange/daterangepicker.min.js?_ver='.config('app.asset_version'))); ?>"></script>
    <script>
        $(document).on('click', '#set_paid_btn', function (e) {
            var id = $(this).data('id');
            $.ajax({
                url:bookingCore.url+'/booking/setPaidAmount',
                data:{
                    id: id,
                    remain: $('#modal-paid-'+id+' #set_paid_input').val(),
                },
                dataType:'json',
                type:'post',
                success:function(res){
                    alert(res.message);
                    window.location.reload();
                }
            });
        });
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
        jQuery(function ($){
            function cb(start, end) {
                $('#reportrange input[name=date]').val(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                $('#reportrange input[name=from]').val(start.format('YYYY-MM-DD'));
                $('#reportrange input[name=to]').val(end.format('YYYY-MM-DD'));
            }

            $('#reportrange  input[name=date]').daterangepicker({
                "alwaysShowCalendars": true,
                "opens": "center",
                "showDropdowns": true,
            }, cb).on('apply.daterangepicker', function (ev, picker) {
                $('#reportrange input[name=from]').val(picker.startDate.format('YYYY-MM-DD'));
                $('#reportrange input[name=to]').val(picker.endDate.format('YYYY-MM-DD'));
            });
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\themes/Mytravel/Vendor/Views/frontend/bookingReport/index.blade.php ENDPATH**/ ?>