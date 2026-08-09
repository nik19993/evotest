<?php $__env->startSection('content'); ?>
    <?php $__env->startPush('scripts.top'); ?>
        <script>
            var displayStyle = '<?php echo e($displayStyle); ?>';
            var lang_chg = '<?php echo e(ManagerTheme::getLexicon('confirm_setting_language_change')); ?>';
            var actions = {
                save: function() {
                    documentDirty = false;
                    document.settings.submit();
                },
                cancel: function() {
                    documentDirty = false;
                    document.location.href = 'index.php?a=2';
                }
            };
        </script>
        <script src="media/script/mutate_settings.js"></script>
    <?php $__env->stopPush(); ?>
    <form name="settings" method="post" action="index.php">
        <input type="hidden" name="a" value="30">
        <!-- this field is used to check site settings have been entered/ updated after install or upgrade -->
        <input type="hidden" name="site_id" value="<?php echo e(get_by_key(EvolutionCMS()->config, 'site_id')); ?>" />
        <input type="hidden" name="settings_version" value="<?php echo e(EvolutionCMS()->getVersionData('version')); ?>" />
        <h1><i class="<?php echo e($_style['icon_sliders']); ?>"></i><?php echo e(ManagerTheme::getLexicon('settings_title')); ?></h1>
        <?php echo $__env->make('manager::partials.actionButtons', $actionButtons, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php if(!get_by_key(EvolutionCMS()->config, 'settings_version') || get_by_key(EvolutionCMS()->config, 'settings_version') !== EvolutionCMS()->getVersionData('version')): ?>
            <div class="container">
                <p class="alert alert-warning"><?php echo ManagerTheme::getLexicon('settings_after_install'); ?></p>
            </div>
        <?php endif; ?>
        <div class="tab-pane" id="settingsPane">
            <script>
                tpSettings = new WebFXTabPane(document.getElementById('settingsPane'), <?php echo e(get_by_key(EvolutionCMS()->config, 'remember_last_tab') ? 1 : 0); ?>);
            </script>
            <?php echo $__env->make('manager::page.system_settings.general', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php echo $__env->make('manager::page.system_settings.friendly_urls', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php echo $__env->make('manager::page.system_settings.interface', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php echo $__env->make('manager::page.system_settings.security', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php echo $__env->make('manager::page.system_settings.file_manager', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php echo $__env->make('manager::page.system_settings.file_browser', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php echo $__env->make('manager::page.system_settings.mail_templates', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
    </form>
    <form id="mailTestForm" onsubmit="return false;"></form>
    <?php $__env->startPush('scripts.bot'); ?>
        <script>
            (function($) {
                $('input:radio').change(function() {
                    documentDirty = true;
                });
                $('#furlRowOn').change(function() {
                    $('.furlRow').fadeIn();
                });
                $('#furlRowOff').change(function() {
                    $('.furlRow').fadeOut();
                });
                $('#udPermsOn').change(function() {
                    $('.udPerms').slideDown();
                });
                $('#udPermsOff').change(function() {
                    $('.udPerms').slideUp();
                });
                $('#editorRowOn').change(function() {
                    $('.editorRow').slideDown();
                });
                $('#editorRowOff').change(function() {
                    $('.editorRow').slideUp();
                });
                $('#rbRowOn').change(function() {
                    $('.rbRow').fadeIn();
                });
                $('#rbRowOff').change(function() {
                    $('.rbRow').fadeOut();
                });
                $('#useSmtp').change(function() {
                    $('.smtpRow').fadeIn();
                });
                $('#useMail').change(function() {
                    $('.smtpRow').fadeOut();
                });
                $('#captchaOn').change(function() {
                    $('.captchaRow').fadeIn();
                });
                $('#captchaOff').change(function() {
                    $('.captchaRow').fadeOut();
                });
            })(jQuery);

            function setChangesChunkProcessor(item) {
                item = item || document.querySelector('[name="chunk_processor"]:checked');
                document.querySelectorAll('[name="enable_at_syntax"], [name="enable_filter"]').forEach(function(el) {
                    if (item.checked && item.value === 'DLTemplate') {
                        el.checked = !!el.value;
                        el.disabled = true;
                    } else {
                        el.disabled = false;
                    }
                });
            }

            setChangesChunkProcessor();

            document.querySelectorAll('[name="chunk_processor"]').forEach(function(item) {
                item.addEventListener('change', function() {
                    setChangesChunkProcessor(item);
                }, false);
            });
        </script>
        <?php if(is_numeric(get_by_key($_GET, 'tab'))): ?>
            <script>tpSettings.setSelectedIndex(<?php echo e($_GET['tab']); ?>);</script>
        <?php endif; ?>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('manager::template.page', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/manager//views//page/system_settings.blade.php ENDPATH**/ ?>