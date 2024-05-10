<?php
    $translation = $row->translate();
?>
<li class="card mb-5 overflow-hidden <?php echo e($wrap_class ?? ''); ?>">
    <div class="product-item__outer w-100">
        <div class="row">
            <div class="col-md-5 col-xl-4">
                <div class="product-item__header">
                    <div class="position-relative">
                        <a <?php if(!empty($blank)): ?> target="_blank" <?php endif; ?> href="<?php echo e($row->getDetailUrl()); ?>" class="d-block">
                            <img class="min-height-230 bg-img-hero card-img-top" src="<?php echo e($row->image_url); ?>" alt="<?php echo e($translation->title); ?>">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-xl-5 col-wd-4gdot5 flex-horizontal-center">
                <div class="w-100 position-relative m-4 m-md-0 has-skeleton">
                    <div class="mb-1 pb-1">
                        <?php if($row->is_featured == "1"): ?>
                            <span class="badge badge-orange text-white rounded-xs font-size-13 py-1 p-xl-2 mr-2"><?php echo e(__('Featured')); ?></span>
                        <?php endif; ?>
                        <?php if($row->star_rate): ?>
                            <span class="green-lighter mr-2">
                                <?php for($star = 1 ;$star <= $row->star_rate ; $star++): ?>
                                    <small class="fa fa-star font-size-12"></small>
                                <?php endfor; ?>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="position-absolute top-0 right-0 pr-md-3 d-none d-md-block rtl-left-0 rtl-right-auto">
                        <button type="button" class="btn btn-sm btn-icon rounded-circle"  data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo e(__('Save for later')); ?>">
                            <span class="service-wishlist <?php echo e($row->isWishList()); ?>" data-id="<?php echo e($row->id); ?>" data-type="<?php echo e($row->type); ?>">
                                <span class="flaticon-heart-1 font-size-20"></span>
                            </span>
                        </button>
                    </div>
                    <a <?php if(!empty($blank)): ?> target="_blank" <?php endif; ?> href="<?php echo e($row->getDetailUrl()); ?>">
                        <span class="font-weight-medium font-size-17 text-dark d-flex mb-1"><?php echo e($translation->title); ?> </span>
                    </a>
                    <div class="card-body p-0">
                        <div class="d-flex flex-wrap flex-xl-nowrap align-items-center font-size-14 text-gray-1">
                            <?php if(!empty($row->location->name)): ?>
                                <?php $location =  $row->location->translate() ?>
                                <i class="icon flaticon-placeholder mr-2 font-size-20"></i><?php echo e($location->name ?? ''); ?>

                                <?php if($row->map_lat && $row->map_lng): ?>
                                    <small class="px-1 font-size-15"> - </small>
                                    <a target="_blank" href="https://www.google.com/maps/place/<?php echo e($row->map_lat); ?>,<?php echo e($row->map_lng); ?>/@<?php echo $row->map_lat ?>,<?php echo e($row->map_lng); ?>,<?php echo e(!empty($row->map_zoom) ? $row->map_zoom : 12); ?>z">
                                        <span class="text-primary font-size-14"><?php echo e(__('View on map')); ?></span>
                                    </a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <?php if(!empty($attribute = $row->getAttributeInListingPage())): ?>
                            <?php
                                $translate_attribute =  $attribute->translate();
                                $termsByAttribute = $row->termsByAttributeInListingPage
                            ?>
                            <span class="attr-title mb-1 d-block"><i class="icofont-medal"></i> <?php echo e($translate_attribute->name ?? ""); ?>: </span>
                            <ul class="list-unstyled mb-2 d-flex flex-lg-wrap flex-xl-wrap">
                                <?php $__currentLoopData = $termsByAttribute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($key < 3): ?>
                                    <?php $translate_term = $term->translate() ?>
                                        <li class="item <?php echo e($term->slug); ?> term-<?php echo e($term->id); ?> border border-dark rounded-xs d-flex align-items-center text-lh-1 py-1 px-2 mr-2 mb-2 mb-md-0 mb-lg-2 mb-xl-2">
                                            <span class="font-weight-normal font-size-14"><?php echo e($translate_term->name); ?></span>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                        <?php if(!empty($translation->badge_tags)): ?>
                            <ul class="list-unstyled d-flex pb-2 flex-wrap">
                                <?php $__currentLoopData = $translation->badge_tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="border border-<?php echo e($item['color']); ?> bg-<?php echo e($item['color']); ?> rounded-xs d-flex align-items-center text-lh-1 py-1 px-3 mb-2 mr-2">
                                        <span class="font-weight-normal font-size-14 text-white">
                                            <?php echo e($item['title']); ?>

                                        </span>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col col-xl-3 col-wd-3gdot5 align-self-center py-4 py-xl-0 border-top border-xl-top-0">
                <div class="border-xl-left ml-4 ml-xl-0 pr-xl-3 pr-wd-5 text-xl-right justify-content-xl-end rtl-pr-0 rtl-pl-wd-5 rtl-border-xl-left-0 rtl-border-xl-right">
                    <?php if(setting_item('hotel_enable_review')): ?>
                        <?php  $reviewData = $row->getScoreReview(); ?>
                    <div class="mb-xl-5 mb-wd-7">
                        <div class="mb-0">
                            <div class="my-xl-1">
                                <div class="d-flex align-items-center justify-content-xl-end mb-2">
                                    <span class="badge badge-primary rounded-xs font-size-14 p-2 mr-2 mb-0"><?php echo e($reviewData['score_total']); ?> /5 </span>
                                    <span class="font-size-17 font-weight-bold text-primary"><?php echo e($reviewData['review_text']); ?></span>
                                </div>
                            </div>
                            <span class="font-size-14 text-gray-1">
                                <?php if(!empty($reviewData['total_review'])): ?>
                                    (<?php echo e(__(":number reviews",['number'=>$reviewData['total_review']])); ?>)
                                <?php endif; ?>
                            </span>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="mb-0">
                        <span class="mr-1 font-size-14 text-gray-1"><?php echo e(__("from")); ?></span>
                        <span class="font-weight-bold"><?php echo e($row->display_price); ?></span>
                        <span class="font-size-14 text-gray-1"> / <?php echo e(__('night')); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>
<?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\themes/Mytravel/Hotel/Views/frontend/layouts/search/loop-list.blade.php ENDPATH**/ ?>