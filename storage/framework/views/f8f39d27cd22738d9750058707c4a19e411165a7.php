<div class="modal fade" id="modal-paid-<?php echo e($booking->id); ?>">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><?php echo e(__("Booking ID")); ?>: #<?php echo e($booking->id); ?></h4>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="booking-review">
                    <div class="booking-review-content">
                        <div class="review-section total-review">
                            <ul class="review-list">
                                <li class="final-total d-block border-0">
                                    <div class="d-flex justify-content-between">
                                        <div class="label"><?php echo e(__("Total:")); ?></div>
                                        <div class="val"><?php echo e(format_money($booking->total)); ?></div>
                                    </div>
                                    <?php if($booking->status !='draft'): ?>
                                        <div class="d-flex justify-content-between">
                                            <div class="label"><?php echo e(__("Paid:")); ?></div>
                                            <div class="val"><?php echo e(format_money($booking->paid)); ?></div>
                                        </div>
                                        <?php if($booking->paid < $booking->total ): ?>
                                            <div class="d-flex justify-content-between">
                                                <div class="label"><?php echo e(__("Remain:")); ?></div>
                                                <div class="val"><?php echo e(currency_symbol()); ?><input class="text-right" type="number" min="0" max="<?php echo e($booking->total); ?>" id="set_paid_input" value="<?php echo e(($booking->total - $booking->paid)); ?>" />
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <span class="btn btn btn-primary" id="set_paid_btn" data-id="<?php echo e($booking->id); ?>"><?php echo e(__("Save")); ?></span>
                <span class="btn btn-secondary" data-dismiss="modal"><?php echo e(__("Close")); ?></span>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\themes/Mytravel/Tour/Views/frontend/booking/set-paid-modal.blade.php ENDPATH**/ ?>