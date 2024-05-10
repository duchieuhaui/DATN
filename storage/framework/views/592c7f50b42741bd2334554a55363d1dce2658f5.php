<div class="d-block d-md-flex flex-center-between align-items-start mb-3">
    <div class="mb-3">
        <div class="d-block d-md-flex flex-horizontal-center mb-2 mb-md-0">
            <h4 class="font-size-23 font-weight-bold mb-1 mr-3"><?php echo clean($translation->title); ?></h4>
            <?php if($row->getReviewEnable()): ?>
                <span class="font-size-14 text-primary mr-2"><?php echo e($review_score['score_total']); ?>/5 <?php echo e($review_score['score_text']); ?></span>
                <span class="font-size-14 text-gray-1 ml-1"><?php echo e(__(":number reviews",['number'=>$review_score['total_review']])); ?></span>
            <?php endif; ?>

        </div>
        <div class="d-block d-md-flex flex-horizontal-center font-size-14 text-gray-1">
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
        <?php if($row->square): ?>
            <li class="list-group-item text-lh-sm ">
                <i class="flaticon-plans text-primary font-size-50 mb-1 d-block"></i>
                <div class="text-gray-1"><?php echo size_unit_format($row->square); ?></div>
            </li>
        <?php endif; ?>
        <li class="list-group-item text-lh-sm ">
            <i class="flaticon-door text-primary font-size-50 mb-1 d-block"></i>
            <div class="text-gray-1"> <?php echo e($row->max_guests); ?> <?php echo e(__("People")); ?></div>
        </li>
        <?php if($row->bathroom): ?>
            <li class="list-group-item text-lh-sm ">
                <i class="flaticon-bathtub text-primary font-size-50 mb-1 d-block"></i>
                <div class="text-gray-1"> <?php echo e($row->bathroom); ?> <?php echo e(__("bathrooms")); ?></div>
            </li>
        <?php endif; ?>
        <?php if(!empty($row->bed)): ?>
            <li class="list-group-item text-lh-sm ">
                <i class="flaticon-bed-1 text-primary font-size-50 mb-1 d-block"></i>
                <div class="text-gray-1"><?php echo e($row->bed); ?> <?php echo e(__("beds")); ?></div>
            </li>
        <?php endif; ?>
    </ul>
</div>
<?php if($translation->content): ?>
    <div class="border-bottom position-relative">
        <h5 class="font-size-21 font-weight-bold text-dark">
            <?php echo e(__("Description")); ?>

        </h5>
        <div class="description">
            <?php echo $translation->content ?>
        </div>
    </div>
<?php endif; ?>
<?php echo $__env->make('Space::frontend.layouts.details.space-attributes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('Space::frontend.layouts.details.space-faqs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if ($__env->exists("Hotel::frontend.layouts.details.hotel-surrounding")) echo $__env->make("Hotel::frontend.layouts.details.hotel-surrounding", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if($row->map_lat && $row->map_lng): ?>
    <div class="border-bottom py-4">
        <h5 class="font-size-21 font-weight-bold text-dark mb-4">
            <?php echo e(__("Location")); ?>

        </h5>
        <div class="location-map">
            <div id="map_content"></div>
        </div>
    </div>
<?php endif; ?>
<?php echo $__env->make('Space::frontend.layouts.details.space-video', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\themes/Mytravel/Space/Views/frontend/layouts/details/space-detail.blade.php ENDPATH**/ ?>