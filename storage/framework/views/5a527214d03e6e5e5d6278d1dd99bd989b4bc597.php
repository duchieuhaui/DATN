

<?php $__env->startPush('css'); ?>
    <style type="text/css">
        html, body {
            background: #f0f0f0;
        }
        .bravo_topbar, .bravo_header, .bravo_footer {
            display: none;
        }
        .invoice-amount {
            margin-top: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px 20px;
            display: inline-block;
            text-align: center;
        }
        .email_new_booking .b-table {
            width: 100%;
        }
        .email_new_booking .val {
            text-align: right;
        }
        .email_new_booking td,
        .email_new_booking th {
            padding: 5px;
        }
        .email_new_booking .val table {
            text-align: left;
        }
        .email_new_booking .b-panel-title,
        .email_new_booking .booking-number,
        .email_new_booking .booking-status,
        .email_new_booking .manage-booking-btn {
            display: none;
        }
        .email_new_booking .fsz21 {
            font-size: 21px;
        }
        .table-service-head {
            border: 1px solid #ddd;
            background-color: #f9f9f9;
        }
        .table-service-head th {
            padding: 5px 15px;
        }
        #invoice-print-zone {
            background: white;
            padding: 15px;
            margin: 90px auto 40px auto;
            max-width: 1025px;
        }
        .invoice-company-info{
            margin-top: 15px;
        }
        .invoice-company-info p{
            margin-bottom: 2px;
            font-weight: normal;
        }
    </style>
    <link href="<?php echo e(asset('module/user/css/user.css')); ?>" rel="stylesheet">
    <script>
        window.print();
    </script>
    <div id="invoice-print-zone">
        <table width="100%" cellspacing="0" cellpadding="0">
            <thead>
            <tr>
                <th width="50%">
                    <?php if( !empty($logo = setting_item('logo_invoice_id') ?? setting_item('logo_id') )): ?>
                        <img style="max-width: 200px;" src="<?php echo e(get_file_url( $logo ,"full")); ?>" alt="<?php echo e(setting_item("site_title")); ?>">
                    <?php endif; ?>
                    <div class="invoice-company-info">
                        <?php echo setting_item_with_lang("invoice_company_info"); ?>

                    </div>
                </th>
                <th width="50%" align="right" class="text-right">
                    <h2 class="invoice-text-title"><?php echo e(__("INVOICE")); ?></h2>
                    <?php echo e(__('Invoice #: :number',['number'=>$booking->id])); ?>

                    <br>
                    <?php echo e(__('Created: :date',['date'=>display_date($booking->created_at)])); ?>

                </th>
            </tr>
            <tr>
                <th width="50%">
                    <?php echo nl2br(setting_item('invoice_company')); ?>

                </th>
                <th width="50%" align="right" class="text-right">
                    <div class="invoice-amount">
                        <div class="label"><?php echo e(__("Amount due:")); ?></div>
                        <div class="amount" style="font-size: 24px;"><strong><?php echo e(format_money($booking->total - $booking->paid)); ?></strong>
                        </div>
                    </div>
                </th>
            </tr>
            </thead>
        </table>
        <hr>
        <div class="customer-info">
            <h5><strong><?php echo e(__('Billing to:')); ?></strong></h5>
            <span><?php echo e($booking->first_name.' '.$booking->last_name); ?></span>
            <br>
            <br>
            <span><?php echo e($booking->email); ?></span><br>
            <span><?php echo e($booking->phone); ?></span><br>
            <span><?php echo e($booking->address); ?></span><br>
            <span><?php echo e(implode(', ',[$booking->city,$booking->state,$booking->zip_code,get_country_name($booking->country)])); ?></span><br>
        </div>
        <hr>
        <?php if(!empty($service->email_new_booking_file)): ?>
            <div class="email_new_booking">
                <?php echo $__env->make($service->email_new_booking_file ?? '', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('js'); ?>
    <script type="text/javascript" src="<?php echo e(asset("module/user/js/user.js")); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('Layout::empty', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\themes/Base/User/Views/frontend/bookingInvoice.blade.php ENDPATH**/ ?>