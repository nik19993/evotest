<li class="image" data-sgallery="<?php echo e($gallery->id); ?>">
    <button type="button" title="<?php echo app('translator')->get('sGallery::manager.edit_text'); ?>" class="btn btn-xs btn-primary" data-image-edit-<?php echo e($sGalleryController->getBlockNameId($gallery->block)); ?>="<?php echo e($gallery->id); ?>"><i class="far fa-edit"></i></button>
    <button type="button" title="<?php echo app('translator')->get('sGallery::manager.image_delete'); ?>" class="btn btn-xs btn-danger" data-image-remove="<?php echo e($gallery->id); ?>"><i class="fas fa-trash-alt"></i></button>
    <img src="<?php echo e(sGallery::resize($gallery->src, ['w' => sGallery::defaultWidth(), 'h' => sGallery::defaultHeight()])); ?>" alt="<?php echo e($gallery->file); ?>" class="thumbnail" />
    <i class="type fa fa-file-image fa-2x"></i>
</li><?php /**PATH /var/www/html/core/vendor/seiger/sgallery/src/../views/partials/image.blade.php ENDPATH**/ ?>