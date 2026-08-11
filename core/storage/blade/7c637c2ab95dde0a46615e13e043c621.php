<div class="row form-row">
    <div class="row-col col-lg-12 col-12">
        <div class="row form-row">
            <?php if(!in_array($row['type'], ['custom_tv:multifields'])): ?>
                <div class="col-auto col-title-11">
                    <label for="<?php echo e($row['name']); ?>">
                        <?php echo e($row['caption']); ?>

                        <?php if(evo()->hasPermission('edit_template')): ?><br/><small class="text-muted">[*<?php echo e($row['name']); ?>*]</small><?php endif; ?>
                        <?php if(substr(($tvPBV??''), 0, 8) == '@INHERIT'): ?><br/><small class="comment inherited">(<?php echo e($_lang['tmplvars_inherited']); ?>)</small><?php endif; ?>
                    </label>
                    <?php if(!empty($row['description'])): ?><i class="<?php echo e($_style["icon_question_circle"]); ?>" data-tooltip="<?php echo e($row['description']); ?>"></i><?php endif; ?>
                </div>
            <?php endif; ?>
            <div class="col">
                <?php echo renderFormElement(
                    $row['type'],
                    $row['id'],
                    $row['default_text'],
                    $row['elements'],
                    $tvPBV,
                    '',
                    $row,
                    $tvsArray,
                    $content
                ); ?>

            </div>
        </div>
    </div>
</div><?php /**PATH /var/www/html/core/vendor/seiger/slang/views/partials/tvResource.blade.php ENDPATH**/ ?>