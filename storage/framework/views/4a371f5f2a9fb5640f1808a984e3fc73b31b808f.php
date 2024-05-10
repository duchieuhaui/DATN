
<?php $__env->startSection('content'); ?>
    <div id="live-editor" class=" flex-column overflow-auto" v-cloak="">
        <div class="live-topbar flex-shrink-0 d-flex justify-content-between py-3 px-3 ">
            <div class="d-flex align-items-center">
                <?php if($refLink): ?>
                    <a href="<?php echo e($refLink); ?>" class="px-3 lh-26 text-26 text-black border-right-1 border-right-solid border-right-gray mr-3">
                        <i
                            class="ion ion-ios-close-circle-outline"
                        ></i>
                    </a>
                <?php endif; ?>
                <h5 class="mb-0"><?php echo e($translation->title); ?></h5>
                <?php if($refPreviewLink): ?>
                    <a href="<?php echo e($refPreviewLink); ?>" target="_blank" class="ml-3 btn btn-sm btn-default">
                        <i
                            class="ion ion-ios-play-circle"
                        ></i>
                        <?php echo e(__("Preview")); ?>

                    </a>
                <?php endif; ?>
            </div>
            <div>
            </div>
            <div>
                <span
                    class="alert-text mr-3"
                    v-show="message.content"
                    :class="message.type ? 'success' : 'danger'"
                >{{message.content}}</span>
                <?php if(empty($row->id) and app()->getLocale() != setting_item('site_locale')): ?>
                    <?php echo e(__('You need to create the template at the Main-language tab first!')); ?>

                <?php else: ?>
                <?php endif; ?>
                <span class="last_saved font-italic" v-if="lastSaved"> <?php echo e(__("Last saved:")); ?> {{ lastSaved }}</span>
            </div>
        </div>
        <div class="d-flex flex-grow-1 position-relative overflow-auto">
            <div class="live-left-zone">
                <?php echo $__env->make('Template::admin.live.parts.layers', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('Template::admin.live.parts.add-block', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="live-content-zone">
                <iframe
                    id="frame-preview" src="<?php echo e(route('template.preview',['template'=>$row,'preview'=>1])); ?>" width="100%" height="100%"
                    frameborder="0"
                ></iframe>
            </div>
            <div class="live-right-zone overflow-auto" v-if="selectedBlockId">
                <block-form
                    @save="saveBlock" @cancel="cancelEdit" :id="selectedBlockId" :current-model="currentModel" :on-saving="onSaving"
                    :current-block-setting="currentBlockSetting"
                />
            </div>
        </div>
    </div>
    <script>
        var current_template_items = <?php echo json_encode($translation->content_json); ?>;
        var current_template_title = '<?php echo e($translation->title ?? ''); ?>';
        var current_last_saved = '<?php echo e(display_datetime($row->updated_at)); ?>';
        var template_id = <?php echo e($row->id ?? 0); ?>;
        var current_menu_lang = '<?php echo e(request()->query('lang',app()->getLocale())); ?>';
        var template_i18n = {
            cancel: '<?php echo e(__('Cancel')); ?>',
            save_changes: '<?php echo e(__('Save changes')); ?>',
            delete_confirm: '<?php echo e(__('Are you want to delete?')); ?>',
            add_new: '<?php echo e(__('Add New')); ?>',
            save_block: '<?php echo e(__('Save Block')); ?>',
        };
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <link
        rel="stylesheet"
        href="<?php echo e(asset('dist/admin/module/template/admin/live/live.css?_v='.config('app.asset_version'))); ?>"
    />
    <link
        rel="stylesheet"
        href="https://unpkg.com/vue-select@3.0.0/dist/vue-select.css"
    >
<?php $__env->stopPush(); ?>
<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('Layout::admin.empty', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mytravel.2.4.0\modules/Template/Views/admin/live/index.blade.php ENDPATH**/ ?>