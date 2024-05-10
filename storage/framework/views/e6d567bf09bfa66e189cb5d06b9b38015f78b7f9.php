<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#booking-detail-<?php echo e($booking->id); ?>"><?php echo e(__("Booking Detail")); ?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#booking-customer-<?php echo e($booking->id); ?>">
            <?php if(!empty($informationRole)): ?>
                <?php echo e(__("Customer Information")); ?>

            <?php else: ?>
                <?php echo e(__('Personal Information')); ?>

            <?php endif; ?>
        </a>
    </li>
    <?php if(count($booking->passengers)): ?>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#booking-guests-<?php echo e($booking->id); ?>">
                <?php echo e(__('Guests Information')); ?>

            </a>
        </li>
    <?php endif; ?>
</ul>
<div class="tab-content">
    <div id="booking-detail-<?php echo e($booking->id); ?>" class="tab-pane active">
        <div class="booking-review">
            <div class="booking-review-content">
                <div class="review-section">
                    <div class="info-form">
                        <ul>
                            <li>
                                <div class="label"><?php echo e(__('Booking Status')); ?></div>
                                <div class="val"><?php echo e($booking->statusName); ?></div>
                            </li>
                            <li>
                                <div class="label"><?php echo e(__('Booking Date')); ?></div>
                                <div class="val"><?php echo e(display_date($booking->created_at)); ?></div>
                            </li>
                            <?php if(!empty($booking->gateway)): ?>
                                <?php $gateway = get_payment_gateway_obj($booking->gateway);?>
                                <?php if($gateway): ?>
                                    <li>
                                        <div class="label"><?php echo e(__('Payment Method')); ?></div>
                                        <div class="val"><?php echo e($gateway->name); ?></div>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php $vendor = $service->author; ?>
                            <?php if($vendor->hasPermission('dashboard_vendor_access') and !$vendor->hasPermission('dashboard_access')): ?>
                                <li>
                                    <div class="label"><?php echo e(__("Vendor")); ?></div>
                                    <div class="val"><a href="<?php echo e(route('user.profile',['id'=>$vendor->id])); ?>" target="_blank" ><?php echo e($vendor->getDisplayName()); ?></a></div>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="more-booking-review">
            <?php echo $__env->make($service->checkout_booking_detail_file ?? '', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    <div id="booking-customer-<?php echo e($booking->id); ?>" class="tab-pane fade">
        <?php echo $__env->make($service->booking_customer_info_file ?? 'Booking::frontend/booking/booking-customer-info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div id="booking-guests-<?php echo e($booking->id); ?>" class="tab-pane fade">
        <?php echo $__env->make('Booking::frontend.detail.passengers', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\themes/Base/Booking/Views/frontend/detail/modal.blade.php ENDPATH**/ ?>