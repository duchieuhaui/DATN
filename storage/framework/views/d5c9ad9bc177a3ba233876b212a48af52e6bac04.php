<?php
    $terms_ids = $row->terms->pluck('term_id');
    $attributes = \Modules\Core\Models\Terms::getTermsById($terms_ids);
?>
<?php if(!empty($terms_ids) and !empty($attributes)): ?>
    <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="border-bottom py-4 position-relative <?php echo e($attribute['parent']->slug); ?> attr-<?php echo e($attribute['parent']->id); ?>">
        <?php $translate_attribute = $attribute['parent']->translate() ?>
        <?php if(empty($attribute['parent']['hide_in_single'])): ?>
            <h5 id="scroll-<?php echo e($attribute['parent']->slug); ?>" class="font-size-21 font-weight-bold text-dark mb-4">
                <h5 id="scroll-specifications" class="font-size-21 font-weight-bold text-dark mb-4">
                    <?php echo e($translate_attribute->name); ?>

                </h5>
            </h5>

            <ul class="list-group list-group-borderless list-group-horizontal list-group-flush no-gutters row">
                <?php $terms = $attribute['child'] ?>
                <?php $__currentLoopData = $terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $translate_term = $term->translate() ?>
                    <li class="col-md-4 mb-5 list-group-item py-0">
                        <i class="<?php echo e($term->icon ?? "icofont-check-circled icon-default"); ?> mr-3 text-primary font-size-24"></i><?php echo e($translate_term->name); ?>

                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        <?php endif; ?>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>


<?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\themes/Mytravel/Hotel/Views/frontend/layouts/details/hotel-attributes.blade.php ENDPATH**/ ?>