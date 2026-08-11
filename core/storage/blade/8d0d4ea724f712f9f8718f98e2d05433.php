<?php $__env->startSection('content'); ?>
        <!-- Page Title -->
    <div class="page-title">
      <div class="breadcrumbs">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(app('UrlProcessor')->makeUrlWithString(evo()->getConfig('site_start'))); ?>"><i class="bi bi-house"></i> <?php echo app('translator')->get('Homepage'); ?></a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(app('UrlProcessor')->makeUrlWithString(2)); ?>"><?php echo app('translator')->get('Blog'); ?></a></li>
            <li class="breadcrumb-item active current"><?php echo e(!empty($documentObject['menutitle']) ? $documentObject['menutitle'] : $documentObject['pagetitle']); ?></li>
          </ol>
        </nav>
      </div>

      <div class="title-wrapper">
        <h1><?php echo e($documentObject['pagetitle'] ?? ''); ?></h1>
      </div>
    </div><!-- End Page Title -->

    <div class="container">
      <div class="row">

        <div class="col-lg-8">

          <!-- Blog Details Section -->
          <section id="blog-details" class="blog-details section">
            <div class="container" data-aos="fade-up">

              <article class="article">
             
                <div class="hero-img" data-aos="zoom-in">
                  <img src="<?php echo e($documentObject['Image']); ?>" alt="<?php echo e($documentObject['pagetitle']); ?>" class="img-fluid" loading="lazy">
                  <div class="meta-overlay">
                    <div class="meta-categories">
                      <a href="#" class="category">Web Development</a>
                      <span class="divider">•</span>
                      <span class="reading-time"><i class="bi bi-clock"></i> 6 min read</span>
                    </div>
                  </div>
                </div>

                <div class="article-content" data-aos="fade-up" data-aos-delay="100">
                  <div class="content-header">
                    <h1 class="title"><?php echo e($documentObject['pagetitle']); ?></h1>

                    <div class="author-info">
                      <div class="author-details">
                        <img src="<?php echo e($documentObject['tv_author_photo'] ?? ''); ?>" alt="Author" class="author-img">
                        <div class="info">
                          <h4><?php echo e($documentObject['tv_author'] ?? 'Unknown Author'); ?></h4>
                        </div>
                      </div>
                      <div class="post-meta">
                        <span class="date"><i class="bi bi-calendar3"></i> <?php echo e(!empty($documentObject['publishedon']) ? date('M j, Y', $documentObject['publishedon']) : ''); ?></span>

                      </div>
                    </div>
                  </div>

                  <div class="content">
                   <?php echo $documentObject['content']; ?>

                  </div>



                    <?php
                      $shareUrl = request()->url();
                      $shareTitle = $documentObject['pagetitle'] ?? '';
                    ?>
                    <div class="meta-bottom">
                      <div class="share-section">
                        <h4 ><?php echo app('translator')->get('Share Article'); ?></h4>
                        <div class="social-links">
                          <a href="https://twitter.com/intent/tweet?url=<?php echo e(urlencode($shareUrl)); ?>&text=<?php echo e(urlencode($shareTitle)); ?>" class="twitter share-popup" target="_blank" rel="noopener" title="Share on X"><i class="bi bi-twitter-x"></i></a>
                          <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(urlencode($shareUrl)); ?>" class="facebook share-popup" target="_blank" rel="noopener" title="Share on Facebook"><i class="bi bi-facebook"></i></a>
                          <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo e(urlencode($shareUrl)); ?>" class="linkedin share-popup" target="_blank" rel="noopener" title="Share on LinkedIn"><i class="bi bi-linkedin"></i></a>
                          <a href="#" class="copy-link" data-url="<?php echo e($shareUrl); ?>" title="Copy Link"><i class="bi bi-link-45deg"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
               

              </article>

            </div>
          </section><!-- /Blog Details Section -->

        </div>

        <div class="col-lg-4 sidebar">

          <div class="widgets-container" data-aos="fade-up" data-aos-delay="200">



            

 

            <!-- Recent Posts Widget -->
            <div class="recent-posts-widget widget-item">

              <h3 class="widget-title"><?php echo app('translator')->get('Popular Posts'); ?></h3>

              <?php $__currentLoopData = ($populars ?? collect()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $popular): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="post-item">
                  <img src="<?php echo e($popular->image ?: 'assets/img/blog/blog-post-square-1.webp'); ?>" alt="" class="flex-shrink-0">
                  <div>
                    <h4><a href="<?php echo e($popular->fullLink); ?>"><?php echo e($popular->pagetitle); ?></a></h4>
                    <time datetime="<?php echo e($popular->created_at); ?>"><?php echo e($popular->created_at?->format('M j, Y')); ?></time>
                  </div>
                </div><!-- End recent post item-->
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div><!--/Recent Posts Widget -->

           

          </div>

        </div>

      </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/views/blog.blade.php ENDPATH**/ ?>