<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e($page_title ?? 'Dashboard'); ?> - <?php echo e(setting_item('site_title') ?? 'Booking Core'); ?></title>

    <?php
        $favicon = setting_item('site_favicon');
    ?>
    <?php if($favicon): ?>
        <?php
            $file = (new \Modules\Media\Models\MediaFile())->findById($favicon);
        ?>
        <?php if(!empty($file)): ?>
            <link rel="icon" type="<?php echo e($file['file_type']); ?>" href="<?php echo e(asset('uploads/'.$file['file_path'])); ?>"/>
        <?php else: ?>
            <link rel="icon" type="image/png" href="<?php echo e(url('images/favicon.png')); ?>"/>
        <?php endif; ?>
    <?php endif; ?>

    <meta name="robots" content="noindex, nofollow"/>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="<?php echo e(asset('libs/select2/css/select2.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('libs/flags/css/flag-icon.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(url('libs/daterange/daterangepicker.css')); ?>"/>
    <link href="<?php echo e(asset('themes/admin/libs/bootstrap-4.6.2-dist/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('themes/admin/libs/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('dist/admin/css/app.css')); ?>" rel="stylesheet">
    <?php echo \App\Helpers\Assets::css(); ?>

    <?php echo \App\Helpers\Assets::js(); ?>

    <?php echo $__env->make('Layout::admin.parts.global-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="<?php echo e(asset('libs/tinymce/js/tinymce/tinymce.min.js')); ?>"></script>
    <?php echo $__env->yieldPushContent('css'); ?>

</head>
<body class="<?php echo e(($enable_multi_lang ?? '') ? 'enable_multi_lang' : ''); ?> <?php if(setting_item('site_enable_multi_lang')): ?> site_enable_multi_lang <?php endif; ?>">
<?php echo $__env->yieldContent('content'); ?>

<?php echo $__env->make('Media::browser', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Scripts -->
<?php echo \App\Helpers\Assets::css(true); ?>

<script src="<?php echo e(asset('libs/pusher.min.js')); ?>"></script>
<script src="<?php echo e(asset('libs/jquery-3.6.3.min.js?_ver='.config('app.asset_version'))); ?>"></script>
<script src="<?php echo e(asset('themes/admin/libs/bootstrap-4.6.2-dist/js/bootstrap.bundle.min.js?_ver='.config('app.asset_version'))); ?>"></script>
<script src="<?php echo e(asset('dist/admin/js/manifest.js?_ver='.config('app.asset_version'))); ?>"></script>
<script src="<?php echo e(asset('dist/admin/js/vendor.js?_ver='.config('app.asset_version'))); ?>"></script>
<script src="<?php echo e(asset('libs/filerobot-image-editor/filerobot-image-editor.min.js?_ver='.config('app.asset_version'))); ?>"></script>

<script src="<?php echo e(asset('dist/admin/js/app.js?_ver='.config('app.asset_version'))); ?>"></script>
<script src="<?php echo e(asset('libs/vue/vue'.(!env('APP_DEBUG') ? '.min':'').'.js')); ?>"></script>

<script src="<?php echo e(asset('libs/select2/js/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('libs/bootbox/bootbox.min.js')); ?>"></script>

<script src="<?php echo e(url('libs/daterange/moment.min.js')); ?>"></script>
<script src="<?php echo e(url('libs/daterange/daterangepicker.min.js?_ver='.config('app.asset_version'))); ?>"></script>

<?php echo \App\Helpers\Assets::js(true); ?>


<?php echo $__env->yieldPushContent('js'); ?>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\modules/Layout/admin/empty.blade.php ENDPATH**/ ?>