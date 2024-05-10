<?php
$passengers = $booking->passengers;
if(!count($passengers)) return;
?>
<h4 class="form-section-title"><?php echo e(__("Tickets / Guests Information:")); ?></h4>
<div class="accordion gateways-table my-3" id="passengers_info">
    <?php $__currentLoopData = $passengers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>$passenger): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card">
            <div class="card-header c-pointer" id="passenger_heading_<?php echo e($i + 1); ?>">
                <h4 class="mb-0 " style="font-size: 16px" data-toggle="collapse" data-target="#passenger_<?php echo e($i + 1); ?>" aria-expanded="true"
                    aria-controls="passenger_<?php echo e($i + 1); ?>">
                    <?php echo e(__("Guest #:number",['number'=>$i + 1])); ?>: <?php echo e($passenger->first_name); ?> <?php echo e($passenger->last_name); ?>

                </h4>
            </div>

            <div id="passenger_<?php echo e($i + 1); ?>" class="collapse <?php if($i + 1 == 1): ?> show <?php endif; ?>"
                 aria-labelledby="passenger_heading_<?php echo e($i + 1); ?>" data-parent="#passengers_info">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo e(__("First Name")); ?>: </label>
                                <strong> <?php echo e($passenger->first_name); ?></strong>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo e(__("Last Name")); ?>:</label>

                                <strong><?php echo e($passenger->last_name); ?></strong>
                            </div>
                        </div>
                        <div class="col-md-6 field-email">
                            <div class="form-group">
                                <label><?php echo e(__("Email")); ?>: </label>
                                <strong>
                                <?php echo e($passenger->email); ?></strong>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo e(__("Phone")); ?>: </label>

                                <strong><?php echo e($passenger->phone); ?></strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\themes/Base/Booking/Views/frontend/detail/passengers.blade.php ENDPATH**/ ?>