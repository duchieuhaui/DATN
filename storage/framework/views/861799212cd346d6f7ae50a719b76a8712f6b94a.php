<?php
    $terms_ids = $row->terms->pluck('term_id');
    $attributes = \Modules\Core\Models\Terms::getTermsById($terms_ids);
?>
<?php if(!empty($terms_ids) and !empty($attributes)): ?>
    <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $translate_attribute = $attribute['parent']->translate() ?>
        <?php if(empty($attribute['parent']['hide_in_single'])): ?>
            <div class="list-attributes border-bottom py-4 <?php echo e($attribute['parent']->slug); ?> attr-<?php echo e($attribute['parent']->id); ?>">
                <h3 class="font-size-21 font-weight-bold text-dark mb-4"><?php echo e($translate_attribute->name); ?></h3>
                <?php $terms = $attribute['child'] ?>
                <ul class="list-group list-group-borderless list-group-horizontal list-group-flush no-gutters row">
                    <?php $__currentLoopData = $terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $translate_term = $term->translate() ?>
                        <li class="col-md-4 mb-3 list-group-item item <?php echo e($term->slug); ?> term-<?php echo e($term->id); ?>">
                            <?php if(!empty($term->image_id)): ?>
                                <?php $image_url = get_file_url($term->image_id, 'full'); ?>
                                <img src="<?php echo e($image_url); ?>" class="img-responsive" alt="<?php echo e($translate_term->name); ?>">
                            <?php else: ?>
                                <i class="mr-2 font-size-16 text-primary <?php echo e($term->icon ?? "flaticon-tick icon-default"); ?>"></i>
                            <?php endif; ?>
                            <?php echo e($translate_term->name); ?>

                        </li>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\themes/Mytravel/Car/Views/frontend/layouts/details/attributes.blade.php ENDPATH**/ ?>