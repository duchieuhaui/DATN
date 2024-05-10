
<?php $__env->startSection('content'); ?>
    <div class="page-template-content">
        <div id="live-preview" v-cloak>
            <live-preview-item
                :items="items"
                id="ROOT"
                v-if="items.ROOT"
                :selected-block-id="selectedBlockId"
            ></live-preview-item>
            <div class="no-items-box" v-if="items.ROOT.nodes.length == 0">
                <div class="icon-wrap">
                    <i class="icon fa fa-magic fa-5x"></i>
                </div>
                <div>
                    <h3><?php echo e(__("There is no layer yet!")); ?></h3>
                    <p><?php echo e(__("Click button bellow to start adding layer")); ?></p>
                </div>
                <div>
                    <button class="btn btn-success " @click="showAddLayer"><?php echo e(__("Add layer")); ?></button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <link
        rel="stylesheet"
        href="<?php echo e(asset('dist/frontend/module/template/preview/css/live-preview.css?_v='.config('app.asset_version'))); ?>"
    />
<?php $__env->stopPush(); ?>
<?php $__env->startPush('js'); ?>
    <script>
        var current_template_items = <?php echo json_encode($translation->content_live_json); ?>;
        var template_id = <?php echo e($row->id ?? 0); ?>;
        var current_menu_lang = '<?php echo e(request()->query('lang',app()->getLocale())); ?>';
        var preview_routes = {
            preview: '<?php echo e(route('template.admin.live.preview')); ?>'
        }
    </script>
    <script
        src="<?php echo e(asset('dist/frontend/module/template/preview/js/preview.js?_v='.config('app.asset_version'))); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('Layout::app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\themes/Base/Template/Views/frontend/preview.blade.php ENDPATH**/ ?>