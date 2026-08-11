<?php $__env->startSection('content'); ?>
        <!-- Page Title -->
    <div class="page-title">
      <div class="breadcrumbs">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(app('UrlProcessor')->makeUrlWithString(evo()->getConfig('site_start'))); ?>"><i class="bi bi-house"></i> <?php echo app('translator')->get('Homepage'); ?></a></li>
            <li class="breadcrumb-item active current"><?php echo app('translator')->get('Blog'); ?></li>
          </ol>
        </nav>
      </div>

      <div class="title-wrapper">
        <h1><?php echo app('translator')->get('Blog'); ?></h1>
      </div>
    </div><!-- End Page Title -->
    <div class="container">
      <div class="row">

        <div class="col-lg-8">

          <!-- Latest Posts Section -->
          <section id="latest-posts" class="latest-posts section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">
              <div class="row gy-4">

                <?php $__empty_1 = true; $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                  <div class="col-lg-6">
                    <article>

                      <div class="post-img">
                        <img src="<?php echo e($article->image ?: 'assets/img/blog/blog-post-1.webp'); ?>" alt="" class="img-fluid">
                      </div>

                      <h2 class="title">
                        <a href="<?php echo e($article->fullLink); ?>"><?php echo e($article->pagetitle); ?></a>
                      </h2>

                      <p><?php echo e(\Illuminate\Support\Str::limit(strip_tags($article->introtext), 120)); ?></p>

                      <div class="post-meta">
                        <p class="post-date">
                          <time datetime="<?php echo e($article->created_at); ?>"><?php echo e($article->created_at?->format('M j, Y')); ?></time>
                        </p>
                        <p class="post-views"><?php echo e($article->tv_views ?? 0); ?> views</p>
                      </div>

                    </article>
                  </div><!-- End post list item -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                  <div class="col-12">
                    <p class="text-center">No posts yet.</p>
                  </div>
                <?php endif; ?>

              </div>
            </div>

          </section><!-- /Latest Posts Section -->

          <!-- Pagination 2 Section -->
          <section id="pagination-2" class="pagination-2 section">

            <div class="container">
              <div class="d-flex justify-content-center">
                <ul>
                  <li>
                    <?php if($previousPageUrl): ?>
                      <a href="<?php echo e($previousPageUrl); ?>"><i class="bi bi-chevron-left"></i></a>
                    <?php else: ?>
                      <span class="disabled"><i class="bi bi-chevron-left"></i></span>
                    <?php endif; ?>
                  </li>
                  <li>
                    <?php if($nextPageUrl): ?>
                      <a href="<?php echo e($nextPageUrl); ?>"><i class="bi bi-chevron-right"></i></a>
                    <?php else: ?>
                      <span class="disabled"><i class="bi bi-chevron-right"></i></span>
                    <?php endif; ?>
                  </li>
                </ul>
              </div>
            </div>

          </section><!-- /Pagination 2 Section -->

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
<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/views/blog-list.blade.php ENDPATH**/ ?>