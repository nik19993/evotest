<?php
global $SystemAlertMsgQueque;
// display system alert window if messages are available
if (count($SystemAlertMsgQueque ?? []) > 0) {
    include EVO_MANAGER_PATH . 'includes/sysalert.display.inc.php';
}
?>
<?php echo $__env->yieldPushContent('scripts.bot'); ?>
<script>
  document.body.addEventListener('keydown', function(e) {
    if ((e.which === 115 || e.which === 83) && (e.ctrlKey || e.metaKey) && !e.altKey) {
      var Button1 = document.querySelector('a#Button1') || document.querySelector('#Button1 > a');
      if (Button1) Button1.click();
      e.preventDefault();
    }
  });
</script>
<?php if(ManagerTheme::isLoadDatePicker()): ?>
    <?php echo EvolutionCMS()->getManagerApi()->loadDatePicker(EvolutionCMS()->getConfig('mgr_date_picker_path')); ?>

<?php endif; ?>

<?php echo $__env->make('manager::partials.debug', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo EvolutionCMS()->getRegisteredClientScripts(); ?>

</body>
</html>
<?php /**PATH /var/www/html/manager//views//partials/footer.blade.php ENDPATH**/ ?>