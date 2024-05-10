<div class="bravo_topbar u-header__hide-content u-header__topbar u-header__topbar-lg border-bottom <?php if(!empty($is_home)|| !empty($header_transparent)): ?>border-color-white <?php else: ?>  border-color-8 <?php endif; ?>">
   <div class="<?php echo e($container_class ?? 'container'); ?>">
       <div class="d-flex align-items-center">
           <div class="list-inline u-header__topbar-nav-divider mb-0 topbar_left_text font-size-14 <?php if(!empty($is_home)|| !empty($header_transparent)): ?> <?php else: ?>  list-inline-dark <?php endif; ?>">
               <?php echo setting_item_with_lang("topbar_left_text"); ?>

           </div>
           <div class="ml-auto d-flex align-items-center">
               <?php if(!empty($phone_contact = setting_item("phone_contact"))): ?>
                   <div class="d-flex align-items-center text-white px-3">
                       <i class="flaticon-phone-call mr-2 ml-1 font-size-18"></i>
                       <span class="d-inline-block font-size-14 mr-1"><?php echo e($phone_contact); ?></span>
                   </div>
               <?php endif; ?>
               <?php echo $__env->make('Core::frontend.currency-switcher', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
               <?php echo $__env->make('Language::frontend.switcher', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
               <?php echo $__env->make('Layout::parts.notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
               <div class="position-relative px-3 u-header__login-form dropdown-connector-xl u-header__topbar-divider">
                   <?php if(!Auth::id()): ?>
                       <a href="javascript:;" class="d-flex align-items-center text-white py-3"
                          data-toggle="modal" data-target="#login">
                           <i class="flaticon-user mr-2 ml-1 font-size-18"></i>
                           <span class="d-inline-block font-size-14 mr-1"><?php echo e(__("Sign in or Register")); ?></span>
                       </a>
                   <?php else: ?>
                       <div class="d-flex align-items-center text-white py-3 dropdown">
                           <i class="flaticon-user mr-2 ml-1 font-size-18"></i>
                           <span class="d-inline-block font-size-14 mr-1 dropdown-nav-link" data-toggle="dropdown">
                            <?php echo e(__("Hi, :name",['name'=>Auth::user()->getDisplayName()])); ?>

                        </span>

                           <ul class="dropdown-menu dropdown-menu-user text-left dropdown">
                               <?php if(empty( setting_item('wallet_module_disable') )): ?>
                                   <li class="credit_amount">
                                       <a href="<?php echo e(route('user.wallet')); ?>"><i class="fa fa-money"></i> <?php echo e(__("Credit: :amount",['amount'=>auth()->user()->balance])); ?></a>
                                   </li>
                               <?php endif; ?>
                               <?php if(is_vendor()): ?>
                                   <li class=""><a href="<?php echo e(route('vendor.dashboard')); ?>" class=""><i class="icon ion-md-analytics"></i> <?php echo e(__("Vendor Dashboard")); ?></a></li>
                               <?php endif; ?>
                               <li class="<?php if(is_vendor()): ?>  <?php endif; ?>">
                                   <a href="<?php echo e(route('user.profile.index')); ?>"><i class="icon ion-md-construct"></i> <?php echo e(__("My profile")); ?></a>
                               </li>
                               <?php if(setting_item('inbox_enable')): ?>
                                   <li class=""><a href="<?php echo e(route('user.chat')); ?>"><i class="fa fa-comments"></i> <?php echo e(__("Messages")); ?></a></li>
                               <?php endif; ?>
                               <li class=""><a href="<?php echo e(route('user.booking_history')); ?>"><i class="fa fa-clock-o"></i> <?php echo e(__("Booking History")); ?></a></li>
                               <li class=""><a href="<?php echo e(route('user.change_password')); ?>"><i class="fa fa-lock"></i> <?php echo e(__("Change password")); ?></a></li>
                               <?php if(is_admin()): ?>
                                   <li class=""><a href="<?php echo e(url('/admin')); ?>"><i class="icon ion-ios-ribbon"></i> <?php echo e(__("Admin Dashboard")); ?></a></li>
                               <?php endif; ?>
                               <li class="">
                                   <a  href="#" onclick="event.preventDefault(); document.getElementById('logout-form-topbar').submit();"><i class="fa fa-sign-out"></i> <?php echo e(__('Logout')); ?></a>
                               </li>
                           </ul>
                           <form id="logout-form-topbar" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                               <?php echo e(csrf_field()); ?>

                           </form>
                       </div>
                   <?php endif; ?>
               </div>

           </div>
       </div>
   </div>
</div>
<?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\themes/Mytravel/Layout/parts/topbar.blade.php ENDPATH**/ ?>