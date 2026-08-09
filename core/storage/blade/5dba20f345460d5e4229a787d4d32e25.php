<div class="row form-row form-element-radio">
    <label for="<?php echo e($for ?? $name); ?>" class="control-label col-5 col-md-3 col-lg-2">
        <?php echo $label ?? ''; ?>

        <?php if(!empty($required)): ?>
            <span class="form-element-required">*</span>
        <?php endif; ?>
        <?php if(!empty($small)): ?>
            <small class="form-text text-muted"><?php echo $small; ?></small>
        <?php endif; ?>
    </label>
    <div class="col-7 col-md-9 col-lg-10">
        <?php if(!empty($options)): ?>
            <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="radio">
                    <label>
                        <?php if(is_string($option)): ?>
                            <input type="radio" name="<?php echo e($name); ?>" value="<?php echo e($key ?? ''); ?>"
                                   <?php if(isset($value) && $value == $key): ?> checked="checked" <?php endif; ?>
                                   <?php if(!empty($disabled)): ?> disabled <?php endif; ?>
                            />
                            <?php echo $option ?? ''; ?>

                        <?php else: ?>
                            <input type="radio" name="<?php echo e($name); ?>" value="<?php echo e($option['value'] ?? $key); ?>"
                                   <?php echo $option['attributes'] ?? ''; ?>

                                   <?php if(isset($value) && ((isset($option['value']) && $value == $option['value']) || ($value == $key))): ?> checked="checked" <?php endif; ?>
                                   <?php if(!empty($disabled) || !empty($option['disabled'])): ?> disabled <?php endif; ?>
                            />
                            <?php echo $option['text'] ?? ''; ?>

                        <?php endif; ?>
                    </label>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <?php if(!empty($comment)): ?>
            <small class="form-text text-muted"><?php echo $comment; ?></small>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /var/www/html/manager//views//form/radio.blade.php ENDPATH**/ ?>