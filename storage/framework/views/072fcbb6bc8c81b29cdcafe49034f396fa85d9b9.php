<?php if(!empty($field['attr']) and !empty($attr = \Modules\Core\Models\Attributes::find($field['attr']))): ?>
    <?php
        $attr_translate = $attr->translate();
        if(request()->query('term_id'))
            $selected = \Modules\Core\Models\Terms::find(request()->query('term_id'));
        else $selected = false;
        $list_cat_json = [];
    ?>
    <?php if($attr): ?>
        <div class="item filter-item">
            <div class="mb-0">
                <div class="input-group border-bottom border-width-2 border-color-1">
                    <i class="icofont-paperclip d-flex align-items-center mr-2 text-primary font-weight-semi-bold font-size-22"></i>
                    <?php $__currentLoopData = $attr->terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $translate = $term->translate();
                        $list_cat_json[] = [
                            'id' => $term->id,
                            'title' => $translate->name,
                        ];;
                        ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="smart-search border-0 p-0 form-control  height-40">
                        <input type="text" class="smart-select parent_text form-control font-weight-bold" readonly placeholder="<?php echo e(__("All :name",['name'=>$attr_translate->name])); ?>" value="<?php echo e($selected ? $selected->name ?? '' :''); ?>" data-default="<?php echo e(json_encode($list_cat_json)); ?>">
                        <input type="hidden" class="child_id" name="terms[]" value="<?php echo e(Request::query('term_id')); ?>">
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>

<?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\themes/Mytravel/Hotel/Views/frontend/layouts/search-map/fields/attr.blade.php ENDPATH**/ ?>