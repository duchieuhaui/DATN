<?php if(!empty($translation->badge_tags)): ?>
    <ul class="list-unstyled mb-2 d-flex flex-lg-wrap flex-xl-nowrap mb-2">
        <?php $__currentLoopData = $translation->badge_tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="border border-<?php echo e($item['color']); ?> bg-<?php echo e($item['color']); ?> rounded-xs d-flex align-items-center text-lh-1 py-1 px-3 mr-2 mb-2 mb-md-0 mb-lg-2 mb-xl-0 mb-md-0">
                <span class="font-weight-normal font-size-14 text-white"> <?php echo e($item['title']); ?> </span>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php endif; ?>
<div class="d-block d-md-flex flex-center-between align-items-start mb-2">
    <div class="mb-3">
        <div class="d-block d-md-flex flex-horizontal-center mb-2 mb-md-0">
            <h4 class="font-size-23 font-weight-bold mb-1"><?php echo e($translation->title); ?></h4>
            <div class="ml-md-3 font-size-10 letter-spacing-2">
                <?php if($row->star_rate): ?>
                    <span class="d-block green-lighter ml-1">
                        <?php for($star = 1 ;$star <= $row->star_rate ; $star++): ?>
                            <span class="fa fa-star"></span>
                        <?php endfor; ?>
                    </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="d-flex flex-horizontal-center font-size-14 text-gray-1">
            <?php if($translation->address): ?>
                <i class="icon flaticon-placeholder mr-2 font-size-20"></i><?php echo e($translation->address); ?>

                <?php if($row->map_lat && $row->map_lng): ?>
                    <a target="_blank" href="https://www.google.com/maps/place/<?php echo e($row->map_lat); ?>,<?php echo e($row->map_lng); ?>/@<?php echo $row->map_lat ?>,<?php echo e($row->map_lng); ?>,<?php echo e(!empty($row->map_zoom) ? $row->map_zoom : 12); ?>z" class="ml-1 d-block d-md-inline">
                        - <?php echo e(__('View on map')); ?>

                    </a>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>

</div>
<div class="pb-4 mb-2">
    <?php if($row->getGallery()): ?>
        <div class="position-relative">
            <div id="sliderSyncingNav" class="travel-slick-carousel u-slick mb-2"
                 data-infinite="true"
                 data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle"
                 data-arrow-left-classes="flaticon-back u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-lg-2 ml-xl-4"
                 data-arrow-right-classes="flaticon-next u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-lg-2 mr-xl-4"
                 data-nav-for="#sliderSyncingThumb">
                <?php $__currentLoopData = $row->getGallery(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="js-slide">
                        <img class="img-fluid border-radius-3" src="<?php echo e($item['large']); ?>" alt="<?php echo e(__("Gallery")); ?>">
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php if(!empty($row->video)): ?>
                <div class="position-absolute right-0 mr-3 mt-md-n11 mt-n9">
                    <div class="flex-horizontal-center">
                        <a class="travel-fancybox btn btn-white transition-3d-hover py-2 px-md-5 px-3 shadow-6 mr-1" href="javascript:;"
                           data-src="<?php echo e(handleVideoUrl($row->video)); ?>"
                           data-speed="700">
                            <i class="flaticon-movie mr-md-2 font-size-18 text-primary"></i>
                            <span class="d-none d-md-inline"><?php echo e(__("Video")); ?></span>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
            <div id="sliderSyncingThumb" class="travel-slick-carousel u-slick u-slick--gutters-4 u-slick--transform-off"
                 data-infinite="true"
                 data-slides-show="6"
                 data-is-thumbs="true"
                 data-nav-for="#sliderSyncingNav"
                 data-responsive='[{
                                        "breakpoint": 992,
                                        "settings": {
                                            "slidesToShow": 4
                                        }
                                    }, {
                                        "breakpoint": 768,
                                        "settings": {
                                            "slidesToShow": 3
                                        }
                                    }, {
                                        "breakpoint": 554,
                                        "settings": {
                                            "slidesToShow": 2
                                        }
                                    }]'>
                <?php $__currentLoopData = $row->getGallery(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="js-slide" style="cursor: pointer;">
                        <img class="img-fluid border-radius-3 height-110" src="<?php echo e($item['thumb']); ?>" alt="<?php echo e(__("Gallery")); ?>">
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endif; ?>
</div>
<div class="position-relative border-bottom pb-3">
    <h5 class="font-size-21 font-weight-bold text-dark mb-3">
        <?php echo e(__("Description")); ?>

    </h5>
    <div class="description">
        <?php echo $translation->content ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\themes/Mytravel/Hotel/Views/frontend/layouts/details/hotel-detail.blade.php ENDPATH**/ ?>