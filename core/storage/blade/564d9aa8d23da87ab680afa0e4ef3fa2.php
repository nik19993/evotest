<?php $__env->startSection('content'); ?>
    <h1><?php echo e(ManagerTheme::getLexicon('refresh_title')); ?></h1>
    <div id="actions">
        <div class="btn-group">
            <a id="Button1" class="btn btn-success" href="index.php?a=26">
                <i class="<?php echo e($_style['icon_recycle']); ?>"></i><?php echo e(ManagerTheme::getLexicon('refresh_site')); ?>

            </a>
        </div>
    </div>

    <div class="tab-page">
        <div class="container container-body">
            <?php if($num_rows_pub): ?>
                <p><?php echo sprintf(ManagerTheme::getLexicon('refresh_published'), (int)$num_rows_pub); ?></p>
            <?php endif; ?>
            <?php if($num_rows_unpub): ?>
                <p><?php echo sprintf(ManagerTheme::getLexicon('refresh_unpublished'), (int)$num_rows_unpub); ?></p>
            <?php endif; ?>
            <?php echo $cache_log; ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('manager::template.page', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/manager//views//page/refresh_site.blade.php ENDPATH**/ ?>