<div class="list-item">
    <div class="row">
        <?php if($rows->total() > 0): ?>
            <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $layout = setting_item("hotel_layout_item_search",'list') ?>
                <?php if($layout == "list"): ?>
                    <div class="col-lg-12 col-md-12">
                        <?php echo $__env->make('Hotel::frontend.layouts.search.loop-list',['wrap_class'=>'inner-loop-wrap'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php else: ?>
                    <div class="col-lg-4 col-md-12">
                        <?php echo $__env->make('Hotel::frontend.layouts.search.loop-grid',['wrap_class'=>'mb-3 item-loop-wrap'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <div class="col-lg-12">
                <?php echo e(__("Hotel not found")); ?>

            </div>
        <?php endif; ?>
    </div>
</div>
<div class="bravo-pagination">
    <?php if($rows->total() > 0): ?>
        <div class="text-center text-md-left font-size-14 mb-3 text-lh-1"><?php echo e(__("Showing :from - :to of :total hotels",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()])); ?></div>
    <?php endif; ?>
    <?php echo e($rows->appends(request()->except(['_ajax']))->links()); ?>

</div>
<?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\themes/Mytravel/Hotel/Views/frontend/ajax/search-result.blade.php ENDPATH**/ ?>