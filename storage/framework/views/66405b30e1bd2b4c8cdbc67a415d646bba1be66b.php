<?php if($row->banner_image_id): ?>
    <div class="bravo_banner">
        <?php if(!empty($breadcrumbs)): ?>
            <div class="container">
                <nav class="py-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-no-gutter mb-0 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="<?php echo e(url('')); ?>"><?php echo e(__('Home')); ?></a></li>
                        <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 <?php echo e($breadcrumb['class'] ?? ''); ?>">
                                <?php if(!empty($breadcrumb['url'])): ?>
                                    <a href="<?php echo e(url($breadcrumb['url'])); ?>"><?php echo e($breadcrumb['name']); ?></a>
                                <?php else: ?>
                                    <?php echo e($breadcrumb['name']); ?>

                                <?php endif; ?>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ol>
                </nav>
            </div>
        <?php endif; ?>
        <div class="mb-8">
            <div class="travel-slick-carousel u-slick u-slick__img-overlay"
                 data-arrows-classes="d-none d-md-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle"
                 data-arrow-left-classes="flaticon-back u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-md-4 ml-xl-8"
                 data-arrow-right-classes="flaticon-next u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-md-4 mr-xl-8"
                 data-infinite="true"
                 data-slides-show="1"
                 data-slides-scroll="1"
                 data-center-mode="true"
                 data-pagi-classes="d-md-none text-center u-slick__pagination mt-5 mb-0"
                 data-center-padding="450px"
                 data-responsive='[{
                        "breakpoint": 1480,
                        "settings": {
                            "centerPadding": "300px"
                        }
                    }, {
                        "breakpoint": 1199,
                        "settings": {
                            "centerPadding": "200px"
                        }
                    }, {
                        "breakpoint": 992,
                        "settings": {
                            "centerPadding": "120px"
                        }
                    }, {
                        "breakpoint": 554,
                        "settings": {
                            "centerPadding": "20px"
                        }
                    }]'>

                <?php if($row->getGallery()): ?>
                    <?php $__currentLoopData = $row->getGallery(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="js-slide bg-img-hero min-height-550" style="background-image: url('<?php echo e($item['large']); ?>');"></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\themes/Mytravel/Space/Views/frontend/layouts/details/space-banner.blade.php ENDPATH**/ ?>