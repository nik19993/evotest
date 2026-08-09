<!DOCTYPE html>
<html lang="<?php echo e(ManagerTheme::getLang()); ?>" dir="<?php echo e(ManagerTheme::getTextDir()); ?>">
<head>
    <title>Evolution CMS</title>
    <base href="<?php echo e(EVO_MANAGER_URL); ?>">
    <meta http-equiv="Content-Type" content="text/html; charset=<?php echo e(ManagerTheme::getCharset()); ?>"/>
    <meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1,width=device-width"/>
    <meta name="theme-color" content="<?php echo e(ManagerTheme::getThemeColor()); ?>"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <?php if(class_exists(Tracy\Debugger::class) && evo()->get('config')->get('tracy.active')): ?>
        <?php echo Tracy\Debugger::renderLoader(); ?>

    <?php endif; ?>
    <script>
        (function () {
            try {
                var platform = (navigator.userAgentData && navigator.userAgentData.platform) || navigator.platform || navigator.userAgent || '';
                if (/win/i.test(platform)) {
                    document.documentElement.classList.add('evo-custom-scrollbars');
                }
            } catch (error) {
            }
        })();
    </script>
    <link rel="stylesheet" type="text/css" href="<?php echo e(ManagerTheme::css()); ?>"/>
    <script type="text/javascript" src="media/script/tabpane.js"></script>
    <script type="text/javascript" src="<?php echo e(evo()->getConfig('mgr_jquery_path')); ?>"></script>
    <?php if(evo()->getConfig('show_picker') === true): ?>
        <script src="<?php echo e(ManagerTheme::getThemeUrl()); ?>/js/color.switcher.js" type="text/javascript"></script>
    <?php endif; ?>
    <?php echo ManagerTheme::getMainFrameHeaderHTMLBlock(); ?>

    <script type="text/javascript">
        if (!evo) {
            var evo = {};
        }
        if (!evo.config) {
            evo.config = {};
        }
        var actions,
            actionStay = [],
            dontShowWorker = false,
            documentDirty = false,
            timerForUnload,
            managerPath = '';

        evo.lang = <?php echo json_encode(Illuminate\Support\Arr::only(
            ManagerTheme::getLexicon(),
            ['saving', 'error_internet_connection', 'warning_not_saved']
        )); ?>;
        evo.style = <?php echo json_encode(Illuminate\Support\Arr::only(
            ManagerTheme::getStyle(),
            ['icon_file', 'icon_pencil', 'icon_reply', 'icon_plus']
        )); ?>;
        evo.EVO_MANAGER_URL = '<?php echo e(EVO_MANAGER_URL); ?>';
        evo.config.which_browser = '<?php echo e(evo()->getConfig('which_browser')); ?>';
        // ============================================
        // @deprecated
        // @since 3.5.2
        // Use evo.EVO_MANAGER_URL instead.
        // @todo [remove@3.7] Remove in Evolution CMS 3.7
        evo.MODX_MANAGER_URL = '<?php echo e(EVO_MANAGER_URL); ?>';
        if (!modx) { var modx = evo; }
        // ============================================
    </script>
    <script src="media/script/tooltip-helper.js"></script>
    <script src="media/script/main.js"></script>
    <?php if(get_by_key($_REQUEST, 'r', '', 'is_numeric')): ?>
        <script>doRefresh(<?php echo e($_REQUEST['r']); ?>);</script>
    <?php endif; ?>
    <?php echo $__env->yieldPushContent('scripts.top'); ?>
    <?php echo evo()->getRegisteredClientStartupScripts(); ?>

</head>
<body class="<?php echo e(ManagerTheme::getTextDir()); ?> <?php echo e(ManagerTheme::getThemeStyle()); ?>" data-evocp="color">
<?php /**PATH /var/www/html/manager//views//partials/header.blade.php ENDPATH**/ ?>