
<?php $__env->startPush('css'); ?>
    <link href="<?php echo e(asset('module/booking/css/checkout.css?_ver='.config('app.asset_version'))); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <?php
        $translate = $plan->translate();
        if(request()->query('annual')!=1){
            $price = $plan->price;
            $duration_text = $plan->duration_type_text;
        }else{
            $price = $plan->annual_price;
            $duration_text = __('Year');
        }
            $term_conditions = setting_item('booking_term_conditions');

    ?>
    <section class="pricing-section bravo-booking-page">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="sec-title text-center mb-5">
                        <h2><?php echo e(setting_item_with_lang('user_plans_page_title', app()->getLocale()) ?? __("Pricing Packages")); ?></h2>
                    </div>
                    <div class="pricing-tabs tabs-box">
                        <form method="post" action="<?php echo e(route('user.plan.buyProcess',['id'=>$plan->id])); ?>" class="row">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="annual" value="<?php echo e(request()->query('annual')); ?>">
                            <div class="pricing-table col-12">
                                <div class="inner-box">
                                    <div class="title"><?php echo e($translate->title); ?></div>
                                    <div class="price"><?php echo e(format_money($price)); ?>

                                        <?php if($price): ?>
                                            <span class="duration">/ <?php echo e($duration_text); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="table-content">
                                        <?php echo clean($translate->content); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="form-section col-12">
                                <?php echo $__env->make('Booking::frontend.booking.checkout-payment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div class="form-actions col-12">
                                <div class="form-group">
                                    <label class="term-conditions-checkbox">
                                        <input type="checkbox" name="term_conditions"> <?php echo e(__('I have read and accept the')); ?> <a target="_blank" href="<?php echo e(get_page_url($term_conditions)); ?>"><?php echo e(__('terms and conditions')); ?></a>
                                    </label>
                                </div>
                                <?php if(setting_item("booking_enable_recaptcha")): ?>
                                    <div class="form-group">
                                        <?php echo e(recaptcha_field('booking')); ?>

                                    </div>
                                <?php endif; ?>
                                <button type="submit" class="btn btn-danger"><?php echo e(__('Submit')); ?> </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\themes/Base/User/Views/frontend/plan/checkout.blade.php ENDPATH**/ ?>