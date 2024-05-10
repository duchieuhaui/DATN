<?php if($totalPassenger = $booking->calTotalPassenger()): ?>
    <?php $old_data = old('passengers', []) ?>
    <hr>
    <div class="form-section">
        <h4 class="form-section-title"><?php echo e(__("Tickets / Guests Information:")); ?></h4>
        <div class="accordion gateways-table" id="passengers_info">
            <?php for($i = 1 ; $i <= $totalPassenger ; $i ++): ?>
                <?php $old_item = $old_data[$i] ?? []; ?>
                <div class="card">
                    <div class="card-header c-pointer" id="passenger_heading_<?php echo e($i); ?>">
                        <h4 class="mb-0 " data-toggle="collapse" data-target="#passenger_<?php echo e($i); ?>" aria-expanded="true"
                            aria-controls="passenger_<?php echo e($i); ?>">
                            <?php echo e(__("Guest #:number",['number'=>$i])); ?>:
                        </h4>
                    </div>

                    <div id="passenger_<?php echo e($i); ?>" class="collapse <?php if($i == 1): ?> show <?php endif; ?>"
                         aria-labelledby="passenger_heading_<?php echo e($i); ?>" data-parent="#passengers_info">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php echo e(__("First Name")); ?> </label>
                                        <input type="text" placeholder="<?php echo e(__("First Name")); ?>" class="form-control"
                                               value="<?php echo e($old_item['first_name'] ?? ''); ?>"
                                               name="passengers[<?php echo e($i); ?>][first_name]">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php echo e(__("Last Name")); ?></label>
                                        <input type="text" placeholder="<?php echo e(__("Last Name")); ?>" class="form-control"
                                               value="<?php echo e($old_item['last_name'] ?? ''); ?>"
                                               name="passengers[<?php echo e($i); ?>][last_name]">
                                    </div>
                                </div>
                                <div class="col-md-6 field-email">
                                    <div class="form-group">
                                        <label><?php echo e(__("Email")); ?> </label>
                                        <input type="email" placeholder="<?php echo e(__("email@domain.com")); ?>"
                                               class="form-control" value="<?php echo e($old_item['email'] ?? ''); ?>"
                                               name="passengers[<?php echo e($i); ?>][email]">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php echo e(__("Phone")); ?> </label>
                                        <input type="text" placeholder="<?php echo e(__("Your Phone")); ?>" class="form-control"
                                               value="<?php echo e($old_item['phone'] ?? ''); ?>" name="passengers[<?php echo e($i); ?>][phone]">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\themes/Base/Booking/Views/frontend/booking/checkout-passengers.blade.php ENDPATH**/ ?>