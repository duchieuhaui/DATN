
<?php $__env->startPush('css'); ?>
    <link href="<?php echo e(asset('themes/mytravel/dist/frontend/module/hotel/css/hotel.css?_ver='.config('app.asset_version'))); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("libs/fotorama/fotorama.css")); ?>"/>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="bravo_detail_hotel">
        <div class="border-bottom mb-3">
            <?php echo $__env->make('Layout::parts.bc', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="bravo_content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-9">
                        <?php $review_score = $row->review_data ?>
                        <?php echo $__env->make('Hotel::frontend.layouts.details.hotel-detail', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php echo $__env->make('Hotel::frontend.layouts.details.hotel-rooms', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php echo $__env->make('Hotel::frontend.layouts.details.hotel-attributes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php echo $__env->make('Hotel::frontend.layouts.details.hotel-rules-policy', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php if ($__env->exists("Hotel::frontend.layouts.details.hotel-surrounding")) echo $__env->make("Hotel::frontend.layouts.details.hotel-surrounding", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php if($row->map_lat && $row->map_lng): ?>
                            <div class="border-bottom py-4 pb-6">
                                <h5 class="font-size-21 font-weight-bold text-dark mb-4">
                                    <?php echo e(__("Location")); ?>

                                </h5>
                                <div class="location-map">
                                    <div id="map_content"></div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php echo $__env->make('Hotel::frontend.layouts.details.hotel-review', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-md-12 col-lg-3">
                        <div class="mb-4">
                            <div class="flex-horizontal-center">
                                <ul class="ml-n1 list-group list-group-borderless list-group-horizontal custom-social-share">
                                    <li class="list-group-item px-1 py-0">
                                        <div class="service-wishlist <?php echo e($row->isWishList()); ?>" data-id="<?php echo e($row->id); ?>" data-type="<?php echo e($row->type); ?>">
                                            <span class="height-45 width-45 border rounded border-width-2 flex-content-center cursor-pointer">
                                                <i class="flaticon-like font-size-18"></i>
                                            </span>
                                        </div>
                                    </li>
                                    <li class="list-group-item px-1 py-0">
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
                                <?php if($row->getReviewEnable()): ?>
                                    <?php if($review_score): ?>
                                        <div class="flex-horizontal-center ml-2">
                                            <div class="badge-primary rounded-xs px-1">
                                                <span class="badge font-size-18 px-2 py-2 mb-0 text-lh-inherit"><?php echo e($review_score['score_total']); ?>/5 </span>
                                            </div>
                                            <div class="ml-2 text-lh-1">
                                                <div class="ml-1">
                                                    <h4 class="text-primary font-size-14 font-weight-bold mb-0"><?php echo e($review_score['score_text']); ?></h4>
                                                    <span class="text-gray-1 font-size-12">(<?php echo e($review_score['total_review']); ?> <?php echo e($review_score['total_review'] > 1 ? __('Reviews') : __('Review')); ?>)</span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php echo $__env->make('Hotel::frontend.layouts.details.hotel-form-enquiry', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="mb-4">
                            <div class="border border-color-7 rounded mb-5">
                                <div class="border-bottom">
                                    <?php if($row->discount_percent): ?>
                                        <div class="sale-box">
                                            <div class="ribbon ribbon--red"><?php echo e(__("SAVE :text",['text'=>$row->discount_percent])); ?></div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="p-4">
                                        <span class="font-size-14"><?php echo e(__("From")); ?></span>
                                        <span class="font-size-24 text-gray-6 font-weight-bold ml-1">
                                            <small class="font-size-16 text-decoration-line-through text-danger">
                                               <?php echo e($row->display_sale_price); ?>

                                            </small>
                                            <?php echo e($row->display_price); ?>

                                            <span class="font-size-14"> / <?php echo e(__('night')); ?></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="p-3">
                                    <div class="px-2 pt-2">
                                        <?php if($row->map_lat && $row->map_lng): ?>
                                            <a target="_blank" href="https://www.google.com/maps/place/<?php echo e($row->map_lat); ?>,<?php echo e($row->map_lng); ?>/<?php echo e('@'.$row->map_lat); ?>,<?php echo e($row->map_lng); ?>,<?php echo e(!empty($row->map_zoom) ? $row->map_zoom : 12); ?>z" class="d-block border rounded mb-4">
                                                <img class="img-fluid" src="<?php echo e(url("themes/mytravel/images/map.jpg")); ?>" alt="<?php echo e(__('Address-Description')); ?>">
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo $__env->make('Tour::frontend.layouts.details.vendor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('Booking::frontend/booking/booking-why-book-us', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
                <div class="row end_tour_sticky">
                    <div class="col-md-12">
                        <?php echo $__env->make('Hotel::frontend.layouts.details.hotel-related', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <?php echo App\Helpers\MapEngine::scripts(); ?>

    <script>
        jQuery(function ($) {
            "use strict"
            <?php if($row->map_lat && $row->map_lng): ?>
            new BravoMapEngine('map_content', {
                disableScripts: true,
                fitBounds: true,
                center: [<?php echo e($row->map_lat); ?>, <?php echo e($row->map_lng); ?>],
                zoom:<?php echo e($row->map_zoom ?? "8"); ?>,
                ready: function (engineMap) {
                    engineMap.addMarker([<?php echo e($row->map_lat); ?>, <?php echo e($row->map_lng); ?>], {
                        icon_options: {}
                    });
                }
            });
            <?php endif; ?>
        });

        //Review
        $('.sfeedbacks_form .sspd_review .far').each(function () {
            var list = $(this).parent(),
                listItems = list.children(),
                itemIndex = $(this).index(),
                parentItem = list.parent();
            $(this).on('hover',function() {
                for (var i = 0; i < listItems.length; i++) {
                    if (i <= itemIndex) {
                        $(listItems[i]).addClass('hovered');
                    } else {
                        break;
                    }
                }
                $(this).on('click',function() {
                    for (var i = 0; i < listItems.length; i++) {
                        if (i <= itemIndex) {
                            $(listItems[i]).addClass('selected');
                        } else {
                            $(listItems[i]).removeClass('selected');
                        }
                    }
                    parentItem.children('.review_stats').val(itemIndex + 1);
                });
            }, function () {
                listItems.removeClass('hovered');
            });
        });


    </script>
    <script>
        var bravo_booking_data = <?php echo json_encode($booking_data); ?>

            var bravo_booking_i18n = {
            no_date_select:'<?php echo e(__('Please select Start and End date')); ?>',
            no_guest_select:'<?php echo e(__('Please select at least one guest')); ?>',
            load_dates_url:'<?php echo e(route('space.vendor.availability.loadDates')); ?>',
            name_required:'<?php echo e(__("Name is Required")); ?>',
            email_required:'<?php echo e(__("Email is Required")); ?>',
        };
    </script>
    <script type="text/javascript" src="<?php echo e(asset("libs/fotorama/fotorama.js")); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset("libs/sticky/jquery.sticky.js")); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('themes/mytravel/module/hotel/js/single-hotel.js?_ver='.config('app.asset_version'))); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\themes/Mytravel/Hotel/Views/frontend/detail.blade.php ENDPATH**/ ?>