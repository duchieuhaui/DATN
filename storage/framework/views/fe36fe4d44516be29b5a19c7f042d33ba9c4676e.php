<div class="sidebar-widget widget_search">
    <form class="input-group input-group-borderless mb-5" action="<?php echo e(url(app_get_locale(false,false,'/').config('news.news_route_prefix'))); ?>">
        <!-- Input -->
        <div class="js-focus-state w-100">
            <div class="input-group border border-color-8 border-width-2 rounded d-flex align-items-center">
                <input type="text" name="s" value="<?php echo e(Request::query("s")); ?>" class="form-control font-size-14 placeholder-1 ml-1" placeholder="<?php echo e(__("Search ...")); ?>" aria-label="<?php echo e(__("Company or title")); ?>">
                <button class="input-group-append bg-white" type="submit">
                    <span class="input-group-text">
                        <i class="flaticon-magnifying-glass-1 font-size-20 text-gray-8 mr-1"></i>
                     </span>
                </button>
            </div>
        </div>
    </form>
</div>
<?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\themes/Mytravel/News/Views/frontend/layouts/sidebars/search_form.blade.php ENDPATH**/ ?>