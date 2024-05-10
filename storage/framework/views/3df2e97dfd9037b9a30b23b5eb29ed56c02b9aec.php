<?php
$passengers = $booking->passengers;
if(!count($passengers)) return;
?>
<div class="b-panel">
    <div class="b-panel-title"><?php echo e(__("Tickets / Guests Information:")); ?></div>
    <div class="b-table-wrap">
        <div class="b-table b-table-div">
            <?php $__currentLoopData = $passengers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>$passenger): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="info-first-name b-tr">
                <div class="label"><?php echo e(__("Guest #:number",['number'=>$i + 1])); ?>: <?php echo e($passenger->first_name); ?> <?php echo e($passenger->last_name); ?></div>
                <div class="val text-left" style="text-align: left">
                    <?php echo e(__("First Name: ")); ?> <strong><?php echo e($passenger->first_name); ?></strong><br>
                    <?php echo e(__("Last Name: ")); ?> <strong><?php echo e($passenger->last_name); ?></strong><br>
                    <?php echo e(__("Email: ")); ?> <strong><?php echo e($passenger->email); ?></strong><br>
                    <?php echo e(__("Phone: ")); ?> <strong><?php echo e($passenger->phone); ?></strong><br>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\themes/Base/Booking/Views/emails/parts/panel-passengers.blade.php ENDPATH**/ ?>