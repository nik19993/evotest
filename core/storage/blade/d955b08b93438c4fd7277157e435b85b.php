<div class="tab-page galleryTab" id="templateTab">
    <h2 class="tab"><span><i class="fas fa-photo-video"></i> <?php echo app('translator')->get('sGallery::manager.gallery'); ?> <?php if($sGalleryController->getBlockName() != 1): ?><?php echo e($sGalleryController->getBlockName()); ?><?php endif; ?></span></h2>

    <div class="btn-group btn-group-sm" style="margin-left:1rem;">
        <input type="file" id="filesToUpload<?php echo e($sGalleryController->getBlockNameId()); ?>" name="files[]" multiple hidden/>
        <label for="filesToUpload<?php echo e($sGalleryController->getBlockNameId()); ?>" class="btn btn-secondary" style="margin-bottom:0;">
            <i class="fas fa-file-upload"></i> <span><?php echo app('translator')->get('sGallery::manager.file_upload'); ?></span>
        </label>

        <button id="addYoutube<?php echo e($sGalleryController->getBlockNameId()); ?>" class="btn btn-secondary">
            <i class="fab fa-youtube"></i> <span><?php echo app('translator')->get('sGallery::manager.add_youtube'); ?></span>
        </button>
    </div>

    <ul id="uploadBase<?php echo e($sGalleryController->getBlockNameId()); ?>">
        <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('sGallery::partials.'.$gallery->type, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

    <div class="modal fade" id="translate<?php echo e($sGalleryController->getBlockNameId()); ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><?php echo app('translator')->get('sGallery::manager.texts_for_file'); ?> <span class="filemane"></span></div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <span class="btn btn-success" onclick="sendForm<?php echo e($sGalleryController->getBlockNameId()); ?>('#translate<?php echo e($sGalleryController->getBlockNameId()); ?>');"><?php echo app('translator')->get('sGallery::manager.save'); ?></span>
                    <span class="btn btn-default" onclick="$('#translate<?php echo e($sGalleryController->getBlockNameId()); ?>').hide();"><?php echo app('translator')->get('sGallery::manager.cancel'); ?></span>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts.bot'); ?>
    <script>
        /* Upload Images */
        document.querySelector('#filesToUpload<?php echo e($sGalleryController->getBlockNameId()); ?>').addEventListener('change', event => {
            window.parent.document.getElementById('mainloader').classList.add('show');
            doUploadFile<?php echo e($sGalleryController->getBlockNameId()); ?>(event);
        });

        async function doUploadFile<?php echo e($sGalleryController->getBlockNameId()); ?>(e) {
            e.preventDefault();

            const files = e.target.files;
            let totalFilesToUpload = files.length;

            //nothing was selected
            if (totalFilesToUpload === 0) {
                return;
            }

            let uploads = [];
            for (let i = 0; i < totalFilesToUpload; i++) {
                uploads.push(uploadFile<?php echo e($sGalleryController->getBlockNameId()); ?>(files[i]));
            }

            await Promise.all(uploads);
        }

        async function uploadFile<?php echo e($sGalleryController->getBlockNameId()); ?>(f) {
            console.log(`Starting with ${f.name}`);
            let form = new FormData();
            form.append('file', f);
            let resp = await fetch('<?php echo route('sGallery.upload-file', [
                'cat' => request()->get($sGalleryController->getIdType()),
                'resourceType' => $sGalleryController->getResourceType(),
                'block' => $sGalleryController->getBlockName()
            ]); ?>', {
                method: 'POST',
                body: form
            });
            if (resp.ok == false) {
                if (resp.status == 413) {
                    alertify.alert('<?php echo app('translator')->get('sGallery::manager.file_upload_error'); ?>', '<?php echo app('translator')->get('sGallery::manager.error_code_413'); ?>');
                }
                console.log(resp);
            } else {
                let data = await resp.json();
                console.log(`Done with ${f.name}`);
                if (data.success == 0) {
                    alertify.alert('<?php echo app('translator')->get('sGallery::manager.file_upload_error'); ?>', data.error);
                } else {
                    document.getElementById('uploadBase<?php echo e($sGalleryController->getBlockNameId()); ?>').insertAdjacentHTML('beforeend', data.preview);
                }
            }
            window.parent.document.getElementById('mainloader').classList.remove('show');
            doResorting<?php echo e($sGalleryController->getBlockNameId()); ?>();
            return data;
        }
    </script>
    <?php echo $__env->make('sGallery::partials.scripts', ['blockId' => $sGalleryController->getBlockNameId()], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopPush(); ?><?php /**PATH /var/www/html/core/vendor/seiger/sgallery/src/../views/tab.blade.php ENDPATH**/ ?>