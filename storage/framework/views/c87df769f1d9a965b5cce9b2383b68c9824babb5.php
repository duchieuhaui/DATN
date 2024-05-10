<?php $translation = $row->translate(); ?>
<div class="mb-4">
    <?php if($row->getGallery()): ?>
        <div class="position-relative mb-5">
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
    <?php elseif($image_tag = get_image_tag($row->image_id,'full',['alt'=>$translation->title,'class'=>'img-fluid mb-4 rounded-xs w-100'])): ?>
        <a class="d-block" href="<?php echo e($row->getDetailUrl()); ?>">
            <?php echo $image_tag; ?>

        </a>
    <?php endif; ?>
    <h5 class="font-weight-bold font-size-21 text-gray-3">
        <a href="<?php echo e($row->getDetailUrl()); ?>"><?php echo clean($translation->title); ?></a>
    </h5>
    <div class="mb-3">
        <a class="mr-3 pr-1" href="#">
            <span class="font-weight-normal text-gray-3"><?php echo e(display_date($row->updated_at)); ?></span>
        </a>
        <?php $category = $row->category; ?>
        <?php if(!empty($category)): ?>
            <?php $t = $category->translate(); ?>
            <a href="<?php echo e($category->getDetailUrl(app()->getLocale())); ?>">
                <span class="font-weight-normal"><?php echo e($t->name ?? ''); ?></span>
            </a>
        <?php endif; ?>
    </div>
    <p class="mb-0 text-lh-lg">
        <?php echo $translation->content; ?>

    </p>
    <div class="space-between">
        <?php if(!empty($tags = $row->getTags()) and count($tags) > 0): ?>
            <div class="tags">
                <?php echo e(__("Tags:")); ?>

                <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $t = $tag->translate(); ?>
                    <a href="<?php echo e($tag->getDetailUrl(app()->getLocale())); ?>" class="tag-item"> <?php echo e($t->name ?? ''); ?> </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
        <div class="share"> <?php echo e(__("Share")); ?>

            <a class="facebook share-item" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e($row->getDetailUrl()); ?>&amp;title=<?php echo e($translation->title); ?>" target="_blank" original-title="<?php echo e(__("Facebook")); ?>"><i class="fa fa-facebook fa-lg"></i></a>
            <a class="twitter share-item" href="https://twitter.com/share?url=<?php echo e($row->getDetailUrl()); ?>&amp;title=<?php echo e($translation->title); ?>" target="_blank" original-title="<?php echo e(__("Twitter")); ?>"><i class="fa fa-twitter fa-lg"></i></a>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\themes/Mytravel/News/Views/frontend/layouts/details/news-detail.blade.php ENDPATH**/ ?>