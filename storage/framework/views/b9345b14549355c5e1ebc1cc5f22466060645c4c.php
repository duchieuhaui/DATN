<?php if($row->getBookingEnquiryType() === "enquiry"): ?>
    <div class="bravo_single_book_wrap mb-4 <?php if(setting_item('hotel_enable_inbox')): ?> has-vendor-box <?php endif; ?>">
        <div class="bravo_single_book">
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

                    </span>
                </div>
            </div>
            <div class="form-head">
                <div class="price">
                    <span class="label">
                        <?php echo e(__("from")); ?>

                    </span>
                    <span class="value">
                        <span class="onsale"><?php echo e($row->display_sale_price); ?></span>
                        <span class="text-lg"><?php echo e($row->display_price); ?></span>
                    </span>
                </div>
            </div>
            <div class="form-send-enquiry" v-show="enquiry_type=='enquiry'">
                <button class="btn btn-primary" data-toggle="modal" data-target="#enquiry_form_modal">
                    <?php echo e(__("Contact Now")); ?>

                </button>
            </div>
        </div>
    </div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\themes/Mytravel/Hotel/Views/frontend/layouts/details/hotel-form-enquiry.blade.php ENDPATH**/ ?>