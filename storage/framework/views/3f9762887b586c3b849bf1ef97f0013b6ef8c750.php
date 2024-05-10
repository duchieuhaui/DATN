<?php if(!empty($translation->specifications) and is_array($translation->specifications)): ?>
<div class=" py-4">
    <h5 id="scroll-specifications" class="font-size-21 font-weight-bold text-dark mb-4"><?php echo e(__('Specifications')); ?></h5>
    <ul class="list-group list-group-borderless list-group-horizontal list-group-flush no-gutters row">
        <?php $__currentLoopData = $translation->specifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="col-md-4 mb-5 list-group-item py-0">
                <div class="font-weight-bold text-dark"><?php echo e($item['name']); ?></div>
                <span class="text-gray-1"><?php echo e($item['desc']); ?></span>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\themes/Mytravel/Car/Views/frontend/layouts/details/specifications.blade.php ENDPATH**/ ?>