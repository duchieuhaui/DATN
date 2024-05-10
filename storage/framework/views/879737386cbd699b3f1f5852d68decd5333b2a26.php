<div class="item filter-item dropdown filter-simple">
    <div class="border-bottom border-width-2 border-color-1 mb-0 form-content dropdown-toggle" data-toggle="dropdown">
        <h3 class="filter-title"><?php echo e(__('Price filter')); ?> <i class="fa fa-angle-down"></i></h3>
    </div>
    <div class="filter-dropdown dropdown-menu dropdown-menu-right">
        <div class="bravo-filter-price">
            <?php
                $price_min = $pri_from = floor(App\Currency::convertPrice($hotel_min_max_price[0]));
                 $price_max = $pri_to = ceil(App\Currency::convertPrice($hotel_min_max_price[1]));
                 if (!empty($price_range = Request::query('price_range'))) {
                 $pri_from = explode(";", $price_range)[0];
                 $pri_to = explode(";", $price_range)[1];
                 }
                 $currency = App\Currency::getCurrency(App\Currency::getCurrent());
            ?>
            <span class="d-block font-size-lg-15 font-size-17 font-weight-bold text-dark mb-2"><?php echo e(__("Price Range")); ?> (<?php echo e($currency['symbol'] ?? ''); ?>)</span>
            <div class="pb-3 mb-1 d-flex text-lh-1">
                <span><?php echo e($currency['symbol'] ?? ''); ?></span>
                <span id="rangeSliderMinResult"></span>
                <span class="mx-0dot5"> — </span>
                <span><?php echo e($currency['symbol'] ?? ''); ?></span>
                <span id="rangeSliderMaxResult"></span>
            </div>
            <input class="filter-price" type="text" name="price_range"
                   data-extra-classes="u-range-slider height-35"
                   data-type="double"
                   data-grid="false"
                   data-hide-from-to="true"
                   data-min="<?php echo e($price_min); ?>"
                   data-max="<?php echo e($price_max); ?>"
                   data-from="<?php echo e($pri_from); ?>"
                   data-to="<?php echo e($pri_to); ?>"
                   data-prefix="<?php echo e($currency['symbol'] ?? ''); ?>"
                   data-result-min="#rangeSliderMinResult"
                   data-result-max="#rangeSliderMaxResult">
            <div class="text-right">
                <a href="#" onclick="return false;" class="btn btn-primary btn-sm btn-apply-advances"><?php echo e(__("APPLY")); ?></a>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\themes/Mytravel/Hotel/Views/frontend/layouts/search-map/fields/price.blade.php ENDPATH**/ ?>