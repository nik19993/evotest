<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="https://www.youtube.com/iframe_api"></script>
<script>
    /* Sorting */
    let uploadBase<?php echo e($blockId); ?> = document.getElementById('uploadBase<?php echo e($blockId); ?>');
    let sortable<?php echo e($blockId); ?> = new Sortable.create(uploadBase<?php echo e($blockId); ?>, {
        animation: 150,
        onSort: function (evt) {
            doResorting<?php echo e($blockId); ?>(evt);
        }
    });

    /* Save new positions */
    async function doResorting<?php echo e($blockId); ?>(e) {
        let list = new FormData();
        document.querySelectorAll('#uploadBase<?php echo e($blockId); ?> > li').forEach(item => list.append('item[]', item.getAttribute('data-sgallery')));
        await fetch('<?php echo route('sGallery.sort', [
            'cat' => request()->get($sGalleryController->getIdType()),
            'resourceType' => $sGalleryController->getResourceType(),
            'block' => $sGalleryController->getBlockName()
        ]); ?>', {method: 'POST', body: list});
    }

    $(document).on("click", "i.play_button", function() {
        let video = $(this).parent().find('video').get(0);

        if (video.paused) {
            $(this).removeClass('fa-play-circle-o');
            $(this).addClass('fa-pause-circle-o');
            video.play();
        } else {
            $(this).removeClass('fa-pause-circle-o');
            $(this).addClass('fa-play-circle-o');
            video.pause();
        }
        return false;
    });

    $(document).on("click", "#addYoutube<?php echo e($blockId); ?>", function() {
        let youtubeLink = prompt("<?php echo app('translator')->get('sGallery::manager.youtube_link'); ?>");
        $.ajax({
            url:'<?php echo route('sGallery.addyoutube', [
                'cat' => request()->get($sGalleryController->getIdType()),
                'resourceType' => $sGalleryController->getResourceType(),
                'block' => $sGalleryController->getBlockName()
                ]); ?>',
            type:"POST",
            data:'youtubeLink='+youtubeLink,
            cache:false,
            success:function(data) {
                if (data.success == 0) {
                    alertify.alert('<?php echo app('translator')->get('sGallery::manager.file_upload_error'); ?>', data.error);
                } else {
                    document.getElementById('uploadBase<?php echo e($blockId); ?>').insertAdjacentHTML('beforeend', data.preview);
                    doResorting<?php echo e($blockId); ?>();
                }
            }
        });
        return false;
    });

    let player<?php echo e($blockId); ?> = [];

    $(document).on("click", "i.youtube_button", function() {
        let video = $(this).parent().find('iframe').get(0).id;

        if (player<?php echo e($blockId); ?>[video].getPlayerState() !== 1 ) {
            $(this).removeClass('play');
            $(this).addClass('fa fa-pause-circle-o fa-5x');
            player<?php echo e($blockId); ?>[video].playVideo();
        } else {
            $(this).removeClass('fa fa-pause-circle-o fa-5x');
            $(this).addClass('play');
            player<?php echo e($blockId); ?>[video].pauseVideo();
        }
        return false;
    });

    window.onYouTubeIframeAPIReady = function() {
        $.each($('iframe.thumbnail'), function(index, element) {
            player<?php echo e($blockId); ?>[element.id] = new YT.Player(element.id);
        });
    }

    /* Delete item */
    $(document).on("click", "[data-image-remove]", function() {
        let _this = $(this);
        alertify
            .confirm(
                "<?php echo app('translator')->get('sGallery::manager.are_you_sure'); ?>",
                "<?php echo app('translator')->get('sGallery::manager.deleted_irretrievably'); ?>",
                function() {
                    alertify.success("<?php echo app('translator')->get('sGallery::manager.deleted'); ?>");
                    $.ajax({
                        url:'<?php echo e(route('sGallery.delete')); ?>',
                        type:"POST",
                        data:'item='+_this.attr("data-image-remove"),
                        cache:false,
                        success:function(data) {
                            _this.parents(".image").fadeOut(1000, function() {$(this).remove()});
                        }
                    });
                },
                function() {
                    alertify.error("<?php echo app('translator')->get('sGallery::manager.cancel'); ?>");
                })
            .set('labels', {
                ok:"<?php echo app('translator')->get('sGallery::manager.delete'); ?>",
                cancel:"<?php echo app('translator')->get('sGallery::manager.cancel'); ?>"
            })
            .set({transition:'zoom'});
        return false;
    });

    $(document).on("click", "[data-image-edit-<?php echo e($blockId); ?>]", function() {
        let _this = $(this);
        $.ajax({
            url:'<?php echo e(route('sGallery.gettranslate')); ?>',
            data:'item='+_this.attr("data-image-edit-<?php echo e($blockId); ?>"),
            dataType:"json",
            cache:false,
            success:function(ajax) {
                console.log(ajax);
                $("#translate<?php echo e($blockId); ?> .modal-body").html(ajax.tabs);
                $("#translate<?php echo e($blockId); ?> .nav-link:first-child").addClass('active');
                $("#translate<?php echo e($blockId); ?> .tab-pane:first-child").addClass('active').addClass('show');
                $('#translate<?php echo e($blockId); ?>').show();
            }
        });
        return false;
    });

    $(document).on("click", "#translate<?php echo e($blockId); ?> [data-bs-target]", function() {
        let tabButton = $(this);

        $("#translate<?php echo e($blockId); ?> .nav-link").each(function () {
            $(this).removeClass('active');
        });
        $("#translate<?php echo e($blockId); ?> .tab-pane").each(function () {
            $(this).removeClass('active').removeClass('show');
        });

        tabButton.addClass('active');
        $(tabButton.attr('data-bs-target')).addClass('active').addClass('show');
    });

    function sendForm<?php echo e($blockId); ?>(selector) {
        $.ajax({
            url:'<?php echo e(route('sGallery.settranslate')); ?>',
            type:"POST",
            data:$(document).find(selector).find('input, textarea').serialize(),
            dataType:"json",
            cache:false,
            success:function(ajax) {
                if (ajax.success == 1) {
                    $(selector).hide();
                    alertify.success("<?php echo app('translator')->get('sGallery::manager.saved_successfully'); ?>");
                }
            }
        });
        return false;
    }
</script>
<style>
    #uploadBase<?php echo e($blockId); ?> {margin-top:15px;}
    #uploadBase<?php echo e($blockId); ?> .image{position:relative;width:240px;height:120px;margin:0 5px 5px 0;list-style:none;display:inline-block;}
    #uploadBase<?php echo e($blockId); ?> .image > .btn-danger{position:absolute;top:5px;right:5px;display:none;}
    #uploadBase<?php echo e($blockId); ?> .image:hover > .btn-danger, #uploadBase<?php echo e($blockId); ?> .image:hover > .btn-primary{display:inline;z-index:100;}
    #uploadBase<?php echo e($blockId); ?> .image > .btn-primary{position:absolute;top:5px;left:5px;display:none;}
    #uploadBase<?php echo e($blockId); ?> .image > .form-control, #uploadBase<?php echo e($blockId); ?> .image > div > .form-control{margin:0 0px -17px 0;}
    #uploadBase<?php echo e($blockId); ?> .image > i.type{position:absolute;top:auto;bottom:5px;right:10px;display:block;margin:0;color:#ffffff;text-shadow:0 0 3px rgba(0,0,0,1);}
    #uploadBase<?php echo e($blockId); ?> .image > i.play_button{position:absolute;top:calc(50% - 35px);right:calc(50% - 35px);display:block;margin:0;color:#ffffff;opacity:0.5;text-shadow:0 0 5px rgba(0,0,0,1);cursor:pointer;-webkit-transform:rotate(0deg);-ms-transform:rotate(0deg);transform:rotate(0deg);-webkit-transform-origin:center;-ms-transform-origin:center;transform-origin:center;-webkit-transition:all 0.5s;-o-transition:all 0.5s;transition:all 0.5s;}
    #uploadBase<?php echo e($blockId); ?> .image > i.play_button.fa-pause-circle-o{opacity:0.1;}
    #uploadBase<?php echo e($blockId); ?> .image:hover > i.play_button.fa-play-circle-o{-webkit-transform:rotate(120deg);-ms-transform:rotate(120deg);transform:rotate(120deg);opacity:1;}
    #uploadBase<?php echo e($blockId); ?> .image:hover > i.play_button.fa-pause-circle-o{opacity:1;}
    #uploadBase<?php echo e($blockId); ?> .image > i.youtube_button.play{background:url('<?php echo e(\Seiger\sGallery\Models\sGalleryModel::UPLOADED); ?>youtube-logo.png') no-repeat;background-size:contain;position:absolute;top:calc(50% - 35px);right:calc(50% - 35px);width:70px;height:70px;cursor:pointer;transition:scale 0.5s;}
    #uploadBase<?php echo e($blockId); ?> .image:hover > i.youtube_button.play{transform:scale(1.1);}
    #uploadBase<?php echo e($blockId); ?> .image > i.youtube_button.fa-pause-circle-o{position:absolute;top:calc(50% - 35px);right:calc(50% - 35px);transition:opacity 0.5s;opacity:0.2;}
    #uploadBase<?php echo e($blockId); ?> .image:hover > i.youtube_button.fa-pause-circle-o{opacity:1;color:white;cursor:pointer;}
    #uploadBase<?php echo e($blockId); ?> .image img{margin-bottom:34px;}
    #uploadBase<?php echo e($blockId); ?> .image video, #uploadBase<?php echo e($blockId); ?> .image iframe{margin-bottom:-40px;object-fit:cover;}
    #uploadBase<?php echo e($blockId); ?> .image > span.title{position:absolute;top:calc(50%);right:calc(50%);display:block;margin:0;text-shadow:0 0 1px rgba(0,0,0,1);}
    iframe.thumbnail{pointer-events:none;}
    .modal{top:50px;font-weight:bold;}
    .fade:not(.show){opacity:initial;}
    .modal-backdrop {background-color:rgba(0, 0, 0, 0.5);}
    .modal-header{margin-top:1rem;}
    .badge.bg-seigerit-gallery{background-color:#0057b8 !important;color:#ffd700;font-size:85%;}
    .alertify .ajs-footer .ajs-buttons .ajs-button.ajs-ok {color:#fff;background-color:#d9534f;border-color:#d9534f;}
</style><?php /**PATH /var/www/html/core/vendor/seiger/sgallery/src/../views/partials/scripts.blade.php ENDPATH**/ ?>