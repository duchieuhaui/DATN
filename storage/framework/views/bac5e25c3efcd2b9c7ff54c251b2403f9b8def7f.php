<?php
if(!auth()->check()) return;
[$notifications,$countUnread] = getNotify();

?>
<div class="dropdown-notifications position-relative px-3 u-header__login-form dropdown-connector-xl u-header__topbar-divider">
                <span class="d-inline-block font-size-14 mr-1 dropdown-nav-link" data-toggle="dropdown">
                    <i class="flaticon-bell mr-2 ml-1 font-size-18"></i>
                    <span class="d-inline-block badge badge-danger notification-icon"><?php echo e($countUnread); ?></span>
                </span>
    <ul class="dropdown-menu text-left dropdown overflow-auto notify-items dropdown-large">
        <div class="dropdown-toolbar">
            <h3 class="dropdown-toolbar-title"><?php echo e(__('Notifications')); ?> (<span class="notif-count"><?php echo e($countUnread); ?></span>)</h3>
            <div class="dropdown-toolbar-actions">
                <a href="#" class="markAllAsRead"><?php echo e(__('Mark all as read')); ?></a>
            </div>
        </div>
        <ul class="dropdown-list-items p-0">
            <?php if(count($notifications)> 0): ?>
                <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oneNotification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $active = $class = '';
                        $data = json_decode($oneNotification['data']);

                        $idNotification = @$data->id;
                        $forAdmin = @$data->for_admin;
                        $usingData = @$data->notification;

                        $services = @$usingData->type;
                        $idServices = @$usingData->id;
                        $title = @$usingData->message;
                        $name = @$usingData->name;
                        $avatar = @$usingData->avatar;
                        $link = @$usingData->link;

                        if(empty($oneNotification->read_at)){
                            $class = 'markAsRead';
                            $active = 'active';
                        }
                    ?>
                    <li class="notification <?php echo e($active); ?>">
                        <div class="media">
                            <div class="media-left">
                                <div class="media-object">
                                    <?php if($avatar): ?>
                                        <img class="image-responsive" src="<?php echo e($avatar); ?>" alt="<?php echo e($name); ?>">
                                    <?php else: ?>
                                        <span class="avatar-text"><?php echo e(ucfirst($name[0])); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="media-body">
                                <a class="<?php echo e($class); ?> p-0" data-id="<?php echo e($idNotification); ?>" href="<?php echo e($link); ?>"><?php echo $title; ?></a>
                                <div class="notification-meta">
                                    <small class="timestamp"><?php echo e(format_interval($oneNotification->created_at)); ?></small>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </ul>
        <div class="dropdown-footer text-right">
            <a href="<?php echo e(route('core.notification.loadNotify')); ?>"><?php echo e(__('View More')); ?></a>
        </div>
    </ul>
</div>
<?php /**PATH C:\laragon\www\mytravel.2.4.0\themes/Mytravel/Layout/parts/notification.blade.php ENDPATH**/ ?>