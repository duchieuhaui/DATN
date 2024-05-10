<div class="item filter-item">
    <div class="col dropdown-custom px-0">
        <?php
        $cat_ids = Request::query('cat_id');
        $cat_name = "";
        $list_cat_json = [];
        $traverse = function ($categories, $prefix = '') use (&$traverse, &$list_cat_json , &$cat_name , $cat_ids) {
            foreach ($categories as $category) {
                $translate = $category->translate();
                if (!empty($cat_ids[0]) and $cat_ids[0] == $category->id){
                    $cat_name = $translate->name;
                }
                $list_cat_json[] = [
                    'id' => $category->id,
                    'title' => $prefix . ' ' . $translate->name,
                ];
                $traverse($category->children, $prefix . '-');
            }
        };
        $traverse($tour_category);
        ?>
        <span class="d-block text-gray-1 text-left font-weight-normal"><?php echo e($field['title'] ?? ""); ?></span>
        <div class="flex-horizontal-center border-bottom border-width-2 border-color-1 d-flex">
            <i class="flaticon-backpack d-flex align-items-center mr-2 font-size-24 text-primary"></i>
            <div class="smart-search">
                <input type="text" class="smart-select parent_text form-control border-0 font-weight-bold font-size-16" readonly placeholder="<?php echo e(__("All Category")); ?>" value="<?php echo e($cat_name); ?>" data-default="<?php echo e(json_encode($list_cat_json)); ?>">
                <input type="hidden" class="child_id" name="cat_id[]" value="<?php echo e($cat_ids[0] ?? ""); ?>">
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\themes/Mytravel/Tour/Views/frontend/layouts/search-map/fields/category.blade.php ENDPATH**/ ?>