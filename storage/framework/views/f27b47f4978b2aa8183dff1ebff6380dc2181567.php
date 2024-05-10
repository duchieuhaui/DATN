<?php if(!empty($row->video)): ?>
    <div class="border-bottom py-4">
        <h5 class="font-size-21 font-weight-bold text-dark mb-4">
            <?php echo e(__("Video")); ?>

        </h5>
        <!-- Video Block -->
        <div id="youTubeVideoPlayer" class="u-video-player rounded-sm">
            <!-- Cover Image -->
            <img class="img-fluid u-video-player__preview rounded-sm" src="<?php echo e($row->getBannerImageUrlAttribute('full')); ?> " alt="Image">
            <!-- End Cover Image -->
            <!-- Play Button -->
            <a class="travel-inline-video-player u-video-player__btn u-video-player__centered" href="javascript:;"
               data-video-id="<?php echo e(handleVideoUrl($row->video,true)); ?>"
               data-parent="youTubeVideoPlayer"
               data-is-autoplay="true"
               data-target="youTubeVideoIframe"
               data-classes="u-video-player__played">
                <span class="u-video-player__icon u-video-player__icon--lg text-primary bg-transparent">
                    <span class="flaticon-multimedia text-white ml-0 font-size-60 u-video-player__icon-inner"></span>
                </span>
            </a>
            <!-- End Play Button -->

            <!-- Video Iframe -->
            <div class="embed-responsive embed-responsive-16by9 rounded-sm">
                <div id="youTubeVideoIframe"></div>
            </div>
            <!-- End Video Iframe -->
        </div>
        <!-- End Video Block -->
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\themes/Mytravel/Space/Views/frontend/layouts/details/space-video.blade.php ENDPATH**/ ?>