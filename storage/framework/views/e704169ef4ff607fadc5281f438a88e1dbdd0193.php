<div class="sidebar-widget widget_bloglist">
    <div class="sidebar-title">
        <h2><?php echo e($item->title); ?></h2>
    </div>
    <ul class="thumb-list">
        <?php $list_blog = $model_news->with(['category','translation'])->orderBy('id','desc')->paginate(5) ?>
        <?php if($list_blog): ?>
            <?php $__currentLoopData = $list_blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $translation = $blog->translate() ?>
                <li>
                    <?php if($image_url = get_file_url($blog->image_id, 'thumb')): ?>
                        <div class="thumb">
                            <a href="<?php echo e($blog->getDetailUrl(app()->getLocale())); ?>">
                                <?php echo get_image_tag($blog->image_id,'thumb',['class'=>'','alt'=>$blog->title]); ?>

                            </a>
                        </div>
                    <?php endif; ?>
                    <div class="content">
                        <?php if(!empty($blog->category->name)): ?>
                            <div class="cate">
                                <a href="<?php echo e($blog->category->getDetailUrl()); ?>">
                                    <?php $translation_cat = $blog->category->translate(); ?>
                                    <?php echo e($translation_cat->name ?? ''); ?>

                                </a>
                            </div>
                        <?php endif; ?>
                        <h3 class="thumb-list-item-title">
                            <a href="<?php echo e($blog->getDetailUrl(app()->getLocale())); ?>"><?php echo clean($translation->title); ?></a>
                        </h3>
                    </div>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </ul>
</div>
<?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\themes/Mytravel/News/Views/frontend/layouts/sidebars/recent_news.blade.php ENDPATH**/ ?>