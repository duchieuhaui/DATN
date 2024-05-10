<?php if(!empty($breadcrumbs)): ?>
    <div class="container">
        <nav class="py-3" aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-no-gutter mb-0 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble" itemscope itemtype="https://schema.org/BreadcrumbList">
                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="<?php echo e(url('/')); ?>" itemprop="item"><span itemprop="name"><?php echo e(__('Home')); ?></span></a>
                    <meta itemprop="position" content="1" /></li>
                <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 <?php echo e($breadcrumb['class'] ?? ''); ?>" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <?php if(!empty($breadcrumb['url'])): ?>
                            <a href="<?php echo e(url($breadcrumb['url'])); ?>" itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="<?php echo e(url($breadcrumb['url'])); ?>"><span itemprop="name"><?php echo e($breadcrumb['name']); ?></span></a>
                        <?php else: ?>
                            <span itemprop="name"><?php echo e($breadcrumb['name']); ?></span>
                        <?php endif; ?>
                        <meta itemprop="position" content="<?php echo e($k + 2); ?>" />
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ol>
        </nav>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\themes/Mytravel/Layout/parts/bc.blade.php ENDPATH**/ ?>