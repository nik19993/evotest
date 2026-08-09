<input class="form-control <?php echo e($class ?? ''); ?>" type="<?php echo e($type ?? 'text'); ?>"
    <?php if(!empty($id)): ?> id="<?php echo e($id); ?>" <?php elseif(!empty($name)): ?> id="<?php echo e($name); ?>" <?php endif; ?>
<?php if(!empty($name)): ?> name="<?php echo e($name); ?>" <?php endif; ?>
<?php if(isset($value)): ?> value="<?php echo e($value); ?>" <?php endif; ?>
<?php if(isset($placeholder)): ?> placeholder="<?php echo e($placeholder); ?>" <?php endif; ?>
<?php if(!empty($checked)): ?> checked <?php endif; ?>
<?php if(!empty($readonly)): ?> readonly <?php endif; ?>
<?php if(!empty($disabled)): ?> disabled <?php endif; ?>
    <?php echo $attributes ?? ''; ?>

/>
<?php /**PATH /var/www/html/manager//views//form/inputElement.blade.php ENDPATH**/ ?>