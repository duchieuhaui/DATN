
<?php $__env->startPush('css'); ?>
    <link href="<?php echo e(asset('dist/frontend/module/booking/css/checkout.css?_ver='.config('app.asset_version'))); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="bravo-booking-page padding-content ">
        <div class="bg-gray space-2">
            <div class="container">
                <div class="row booking-success-notice">
                    <div class="col-lg-8 col-xl-9">
                        <div class="mb-5 shadow-soft bg-white rounded-sm">
                            <div class="py-6 px-5 border-bottom">
                                <div class="flex-horizontal-center">
                                    <?php switch($booking->status):
                                        case (\Modules\Booking\Models\Booking::COMPLETED): ?>
                                        <?php case (\Modules\Booking\Models\Booking::PROCESSING): ?>
                                        <?php case (\Modules\Booking\Models\Booking::CONFIRMED): ?>
                                        <?php case (\Modules\Booking\Models\Booking::CONFIRMED): ?>

                                        <div class="height-50 width-50 flex-shrink-0 flex-content-center bg-primary rounded-circle">
                                            <i class="flaticon-tick text-white font-size-24"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h3 class="font-size-18 font-weight-bold text-dark mb-0 text-lh-sm">
                                                <?php echo e(__('Thank You. Your booking was submitted successfully!')); ?>

                                            </h3>
                                            <p class="mb-0">
                                                <?php echo e(__('Booking details has been sent to:')); ?> <span><?php echo e($booking->email); ?></span>
                                            </p>
                                            <?php if($note = $gateway->getOption("payment_note")): ?>
                                                <p class="mb-0">
                                                    <?php echo clean($note); ?>

                                                </p>
                                            <?php endif; ?>
                                        </div>
                                        <?php break; ?>
                                    <?php default: ?>
                                        <div class="height-50 width-50 flex-shrink-0 flex-content-center bg-primary rounded-circle">
                                            <i class=" fa fa-warning text-white font-size-24"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h3 class="font-size-18 font-weight-bold text-dark mb-0 text-lh-sm">
                                                <?php echo e(__('Your booking status is: :status',['status'=>booking_status_to_text($booking->status)])); ?>

                                            </h3>
                                        </div>
                                    <?php break; ?>
                                    <?php endswitch; ?>
                                </div>
                            </div>
                            <?php echo $__env->make($service->booking_customer_info_file ?? 'Booking::frontend/booking/booking-customer-info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="text-right py-4 pr-4">
                                <a href="<?php echo e(route('user.booking_history')); ?>" class="btn btn-primary rounded-sm transition-3d-hover font-size-16 font-weight-bold py-3"><?php echo e(__('Booking History')); ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-3">
                        <?php echo $__env->make($service->checkout_booking_detail_file ?? '', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\themes/Mytravel/Booking/Views/frontend/detail.blade.php ENDPATH**/ ?>