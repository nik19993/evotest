<?php if($templateVariablesTab): ?>
    <!-- Template Variables -->
    <?php if(!empty($templateVariablesTab['default'])): ?>
        <div class="tab-page" id="templateDefaultVariables">
            <h2 class="tab"><?php echo app('translator')->get('global.settings_templvars'); ?></h2>
            <script>tpSettings.addTabPage(document.getElementById("templateDefaultVariables"));</script>

            <div class="row form-row">
                <div class="row-col col-lg-12 col-12">
                    <?php echo $templateVariablesTab['default']; ?>

                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php $__currentLoopData = sLang::langConfig(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(!empty($templateVariablesTab[$lang])): ?>
            <div class="tab-page" id="templateVariables_<?php echo e($lang); ?>">
                <h2 class="tab"><?php echo app('translator')->get('global.settings_templvars'); ?> <span class="badge bg-seigerit"><?php echo e($lang); ?></span></h2>
                <script>tpSettings.addTabPage(document.getElementById("templateVariables_<?php echo e($lang); ?>"));</script>

                <div class="row form-row">
                    <div class="row-col col-lg-12 col-12">
                        <?php echo $templateVariablesTab[$lang]; ?>

                    </div>
                </div>
            </div>
            <?php if(!empty($templateVariablesDefaultValue)): ?>
                <?php $__currentLoopData = $templateVariablesDefaultValue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tvID => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <input name="tv<?php echo e($tvID); ?>" type="hidden" value="<?php echo e($value); ?>">
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?><?php /**PATH /var/www/html/core/vendor/seiger/slang/views/resourceTemplateVariablesTab.blade.php ENDPATH**/ ?>