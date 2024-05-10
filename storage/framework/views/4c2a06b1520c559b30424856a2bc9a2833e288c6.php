<?php if(empty($hideMap)): ?>
<div class="item">
    <a href="<?php echo e(route($routeName,['_layout'=>'map'])); ?>"><?php echo e(__("Show on the map")); ?></a>
</div>
<?php endif; ?>
<div class="item orderby">
    <?php
        $param = request()->input();
        $orderby =  request()->input("orderby");
    ?>
    <div class="item-title">
        <?php echo e(__("Sort by:")); ?>

    </div>
    <input type="hidden" name="orderby" value="<?php echo e($orderby); ?>">
    <div class="dropdown ">
        <span class=" dropdown-toggle"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php switch($orderby):
                case ("price_low_high"): ?>
                <?php echo e(__("Price (Low to high)")); ?>

                <?php break; ?>
                <?php case ("price_high_low"): ?>
                <?php echo e(__("Price (High to low)")); ?>

                <?php break; ?>
                <?php case ("rate_high_low"): ?>
                <?php echo e(__("Rating (High to low)")); ?>

                <?php break; ?>
                <?php default: ?>
                <?php echo e(__("Recommended")); ?>

            <?php endswitch; ?>
        </span>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#" data-value=""><?php echo e(__("Recommended")); ?></a>
            <a class="dropdown-item" href="#" data-value="price_low_high"><?php echo e(__("Price (Low to high)")); ?></a>
            <a class="dropdown-item" href="#" data-value="price_high_low"><?php echo e(__("Price (High to low)")); ?></a>
            <a class="dropdown-item" href="#" data-value="rate_high_low"><?php echo e(__("Rating (High to low)")); ?></a>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\themes/Mytravel/Layout/global/search/orderby.blade.php ENDPATH**/ ?>