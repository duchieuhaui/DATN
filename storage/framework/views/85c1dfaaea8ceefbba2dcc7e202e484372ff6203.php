<?php if(count($car_related) > 0): ?>
    <div class="bravo-list-car-related product-card-carousel-block product-card-carousel-v5 mb-3">
        <div class="space-1">
            <div class="w-md-80 w-lg-50 text-center mx-md-auto mt-3">
                <h2 class="section-title text-black font-size-30 font-weight-bold mb-0"><?php echo e(__("You might also like...")); ?></h2>
            </div>
            <div class="travel-slick-carousel u-slick u-slick--equal-height u-slick--gutters-3"
                 data-slides-show="4"
                 data-slides-scroll="1"
                 data-arrows-classes="d-none d-xl-inline-block u-slick__arrow-classic v1 u-slick__arrow-classic--v1 u-slick__arrow-centered--y rounded-circle"
                 data-arrow-left-classes="fa fa-chevron-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left shadow-5"
                 data-arrow-right-classes="fa fa-chevron-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right shadow-5"
                 data-pagi-classes="text-center d-xl-none u-slick__pagination mt-4"
                 data-responsive='[{
                            "breakpoint": 1025,
                            "settings": {
                            "slidesToShow": 3
                            }
                            }, {
                            "breakpoint": 992,
                            "settings": {
                            "slidesToShow": 2
                            }
                            }, {
                            "breakpoint": 768,
                            "settings": {
                            "slidesToShow": 1
                            }
                            }, {
                            "breakpoint": 554,
                            "settings": {
                            "slidesToShow": 1
                            }
                            }]'>
                <?php $__currentLoopData = $car_related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="js-slide mt-5 mb-1">
                        <?php echo $__env->make('Car::frontend.layouts.search.loop-grid',['row'=>$item,'include_param'=>0,'wrap_class' => 'w-100 h-100'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\themes/Mytravel/Car/Views/frontend/layouts/details/related.blade.php ENDPATH**/ ?>