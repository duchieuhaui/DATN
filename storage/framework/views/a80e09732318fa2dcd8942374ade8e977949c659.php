<div class="d-block d-md-flex flex-center-between align-items-start mb-3">
    <div class="mb-3">
        <div class="d-block d-md-flex flex-horizontal-center mb-2 mb-md-0">
            <h4 class="font-size-23 font-weight-bold mb-1 mr-3"><?php echo clean($translation->title); ?></h4>
            <?php if($row->getReviewEnable()): ?>
                <span class="font-size-14 text-primary mr-2"><?php echo e($review_score['score_total']); ?>/5 <?php echo e($review_score['score_text']); ?></span>
                <span class="font-size-14 text-gray-1 ml-1"><?php echo e(__(":number reviews",['number'=>$review_score['total_review']])); ?></span>
            <?php endif; ?>

        </div>
        <div class=" d-md-flex flex-horizontal-center font-size-14 text-gray-1">
            <?php if($translation->address): ?>
                <i class="icon flaticon-placeholder mr-2 font-size-20"></i>
                <?php echo e($translation->address); ?>

            <?php endif; ?>
            <?php if($row->map_lat && $row->map_lng): ?>
                <a target="_blank" href="https://www.google.com/maps/place/<?php echo e($row->map_lat); ?>,<?php echo e($row->map_lng); ?>/@<?php echo $row->map_lat ?>,<?php echo e($row->map_lng); ?>,<?php echo e(!empty($row->map_zoom) ? $row->map_zoom : 12); ?>z" class="ml-1 d-block d-md-inline">
                    - <?php echo e(__('View on map')); ?>

                </a>
            <?php endif; ?>
        </div>
    </div>
    <ul class="list-group list-group-horizontal custom-social-share">
        <li class="list-group-item px-1 border-0">
            <span class="height-45 width-45 border rounded border-width-2 flex-content-center service-wishlist <?php echo e($row->isWishList()); ?>" data-id="<?php echo e($row->id); ?>" data-type="<?php echo e($row->type); ?>">
                <i class="flaticon-like font-size-18 text-dark"></i>
            </span>
        </li>
        <li class="list-group-item px-1 border-0">
            <a id="shareDropdownInvoker<?php echo e($row->id); ?>"
               class="dropdown-nav-link dropdown-toggle d-flex height-45 width-45 border rounded border-width-2 flex-content-center"
               href="javascript:;" role="button" aria-controls="shareDropdown<?php echo e($row->id); ?>" aria-haspopup="true" aria-expanded="false" data-unfold-event="hover"
               data-unfold-target="#shareDropdown<?php echo e($row->id); ?>" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-delay="300" data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp" data-unfold-animation-out="fadeOut">
                <i class="flaticon-share font-size-18 text-dark"></i>
            </a>
            <div id="shareDropdown<?php echo e($row->id); ?>" class="dropdown-menu dropdown-unfold dropdown-menu-right mt-0 px-3 min-width-3" aria-labelledby="shareDropdownInvoker<?php echo e($row->id); ?>">
                <a class="btn btn-icon btn-pill btn-bg-transparent transition-3d-hover  btn-xs btn-soft-dark  facebook mb-3" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e($row->getDetailUrl()); ?>&amp;title=<?php echo e($translation->title); ?>" target="_blank" rel="noopener" original-title="<?php echo e(__("Facebook")); ?>">
                    <span class="font-size-15 fa fa-facebook-f btn-icon__inner"></span>
                </a>
                <br/>
                <a class="btn btn-icon btn-pill btn-bg-transparent transition-3d-hover  btn-xs btn-soft-dark  twitter" href="https://twitter.com/share?url=<?php echo e($row->getDetailUrl()); ?>&amp;title=<?php echo e($translation->title); ?>" target="_blank" rel="noopener" original-title="<?php echo e(__("Twitter")); ?>">
                    <span class="font-size-15 fa fa-twitter btn-icon__inner"></span>
                </a>
            </div>
        </li>
    </ul>
</div>
<div class="py-4 border-top border-bottom mb-4">
    <ul class="list-group list-group-borderless list-group-horizontal flex-center-between text-center mx-md-4 flex-wrap">
        <?php if($row->passenger): ?>
            <li class="list-group-item text-lh-sm ">
                <i class="icon-passenger text-primary font-size-50 mb-1 "></i>
                <div class="text-gray-1"><?php echo e($row->passenger); ?> <?php echo e(__("Seats")); ?></div>
            </li>
        <?php endif; ?>
        <?php if($row->gear): ?>
            <li class="list-group-item text-lh-sm ">
                <i class="icon-gear text-primary font-size-50 mb-1 "></i>
                <div class="text-gray-1"> <?php echo e($row->gear); ?> <?php echo e(__("Gear")); ?></div>
            </li>
        <?php endif; ?>
        <?php if($row->baggage): ?>
            <li class="list-group-item text-lh-sm ">
                <i class="icon-baggage text-primary font-size-50 mb-1 "></i>
                <div class="text-gray-1"> <?php echo e($row->baggage); ?> <?php echo e(__("Baggage")); ?></div>
            </li>
        <?php endif; ?>
        <?php if(!empty($row->door)): ?>
            <li class="list-group-item text-lh-sm ">
                <i class="icon-door text-primary font-size-50 mb-1 "></i>
                <div class="text-gray-1"><?php echo e($row->door); ?> <?php echo e(__("Door")); ?></div>
            </li>
        <?php endif; ?>
    </ul>
</div>
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
<?php if($translation->content): ?>
    <div class="border-bottom position-relative mt-5">
        <h5 class="font-size-21 font-weight-bold text-dark">
            <?php echo e(__("Description")); ?>

        </h5>
        <div class="description">
            <?php echo $translation->content ?>
        </div>
    </div>
<?php endif; ?>
<?php echo $__env->make('Car::frontend.layouts.details.attributes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('Car::frontend.layouts.details.specifications', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if($translation->faqs): ?>
    <div class="g-faq">
        <h3 class="font-size-21 font-weight-bold text-dark mb-4"> <?php echo e(__("FAQs")); ?> </h3>
        <?php $__currentLoopData = $translation->faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item">
                <div class="header">
                    <i class="field-icon icofont-support-faq"></i>
                    <h5><?php echo e($item['title']); ?></h5>
                    <span class="arrow"><i class="fa fa-angle-down"></i></span>
                </div>
                <div class="body">
                    <?php echo e($item['content']); ?>

                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>
<?php if($row->map_lat && $row->map_lng): ?>
    <div class="mt-4">
        <h3 class="font-size-21 font-weight-bold text-dark mb-4"><?php echo e(__("Location")); ?></h3>
        <div class="location-map">
            <div id="map_content"></div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\themes/Mytravel/Car/Views/frontend/layouts/details/detail.blade.php ENDPATH**/ ?>