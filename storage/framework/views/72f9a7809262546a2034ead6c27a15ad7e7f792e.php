
<?php $__env->startSection('head'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="pricing-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sec-title text-center">
                        <h2><?php echo e(setting_item_with_lang('user_plans_page_title', app()->getLocale()) ?? __("Pricing Packages")); ?></h2>
                        <div class="my-3">
                            <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <p class="text-center">
                            <a class="btn btn btn-primary" href="<?php echo e(route('user.plan')); ?>"><?php echo e(__('My plan')); ?></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\themes/Base/User/Views/frontend/plan/thankyou.blade.php ENDPATH**/ ?>