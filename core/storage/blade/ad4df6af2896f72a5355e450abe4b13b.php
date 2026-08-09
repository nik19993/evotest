<?php $__env->startSection('head'); ?>
    <?php echo $__env->make('manager::partials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->yieldSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->yieldSection(); ?>

<?php $__env->startSection('footer'); ?>
    <?php echo $__env->make('manager::partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->yieldSection(); ?>
<?php /**PATH /var/www/html/manager//views//template/page.blade.php ENDPATH**/ ?>