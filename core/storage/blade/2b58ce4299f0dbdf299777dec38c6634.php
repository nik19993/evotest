<?php
    // Home page can double the language segment in generated links (e.g. /uk/uk/blog/post/).
    // Collapse any accidental repeat of a 2-letter locale segment here instead of touching core.
    $dedupeLangSegment = fn (?string $url): string => preg_replace('#/([a-z]{2})/\1(/|$)#', '/$1$2', (string) $url);
?>

<?php $__env->startSection('content'); ?>
    <!-- Blog Hero Section -->
    <section id="blog-hero" class="blog-hero section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="blog-grid">

          <?php ($generalList = collect($articles->items() ?? [])->values()); ?>
          <?php if($generalList->isNotEmpty()): ?>
            <!-- Featured Post (Large) -->
            <?php ($featured = $generalList->first()); ?>
            <article class="blog-item featured" data-aos="fade-up">
              <img src="<?php echo e($featured->image ?: 'assets/img/blog/blog-post-3.webp'); ?>" alt="Blog Image" class="img-fluid">
              <div class="blog-content">
                <div class="post-meta">
                  <span class="date"><?php echo e($featured->created_at?->format('M j, Y')); ?></span>
                </div>
                <h2 class="post-title">
                  <a href="<?php echo e($dedupeLangSegment($featured->fullLink)); ?>" title="<?php echo e($featured->pagetitle); ?>"><?php echo e($featured->pagetitle); ?></a>
                </h2>
              </div>
            </article><!-- End Featured Post -->

            <!-- Regular Posts -->
            <?php $__currentLoopData = $generalList->skip(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <article class="blog-item" data-aos="fade-up" data-aos-delay="<?php echo e($loop->iteration * 100); ?>">
                <img src="<?php echo e($article->image ?: 'assets/img/blog/blog-post-portrait-1.webp'); ?>" alt="Blog Image" class="img-fluid">
                <div class="blog-content">
                  <div class="post-meta">
                    <span class="date"><?php echo e($article->created_at?->format('M j, Y')); ?></span>
                  </div>
                  <h3 class="post-title">
                    <a href="<?php echo e($dedupeLangSegment($article->fullLink)); ?>" title="<?php echo e($article->pagetitle); ?>"><?php echo e($article->pagetitle); ?></a>
                  </h3>
                </div>
              </article><!-- End Blog Item -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php else: ?>
            <p class="text-center">No posts yet.</p>
          <?php endif; ?>

        </div>

        <!-- Pagination -->
        <?php if($generalList->isNotEmpty() && ($previousPageUrl || $nextPageUrl)): ?>
        <div class="pagination-2 d-flex justify-content-center mt-4">
          <ul>
            <li>
              <?php if($previousPageUrl): ?>
                <a href="<?php echo e($previousPageUrl); ?>" aria-label="Previous"><i class="bi bi-chevron-left"></i></a>
              <?php else: ?>
                <span class="disabled" aria-label="Previous"><i class="bi bi-chevron-left"></i></span>
              <?php endif; ?>
            </li>
            <li>
              <?php if($nextPageUrl): ?>
                <a href="<?php echo e($nextPageUrl); ?>" aria-label="Next"><i class="bi bi-chevron-right"></i></a>
              <?php else: ?>
                <span class="disabled" aria-label="Next"><i class="bi bi-chevron-right"></i></span>
              <?php endif; ?>
            </li>
          </ul>
        </div>
        <?php endif; ?>

      </div>

    </section><!-- /Blog Hero Section -->

    <!-- Featured Posts Section -->
    <section id="featured-posts" class="featured-posts section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2><?php echo app('translator')->get('feature_posts'); ?></h2>
        <div><?php echo app('translator')->get('check_our_feature_posts'); ?></div>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="blog-posts-slider swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 800,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": 3,
              "spaceBetween": 30,
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 20
                },
                "768": {
                  "slidesPerView": 2,
                  "spaceBetween": 20
                },
                "1200": {
                  "slidesPerView": 3,
                  "spaceBetween": 30
                }
              }
            }
          </script>

          <div class="swiper-wrapper">
            <?php $__currentLoopData = app('sGallery')->block('1'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="swiper-slide">
                <div class="blog-post-item">
                  <img src="<?php echo e($item->src); ?>" alt="<?php echo e($item->alt); ?>">
                  <div class="blog-post-content">
                    <h2><a href="<?php echo e($item->link ?: '#'); ?>"><?php echo e($item->title); ?></a></h2>
                    <p><?php echo e($item->description); ?></p>
                  </div>
                </div>
              </div><!-- End slide item -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>

        </div>

      </div>

    </section><!-- /Featured Posts Section -->

    <!-- Latest Posts Section -->
    <section id="latest-posts" class="latest-posts section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
       
        <h2><?php echo app('translator')->get('Latest Posts'); ?></h2>
        <div><?php echo app('translator')->get('сheck_our_last_posts'); ?></div>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">

          <?php $__empty_1 = true; $__currentLoopData = $populars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-lg-4">
              <article>

                <div class="post-img">
                  <img src="<?php echo e($article->image ?: 'assets/img/blog/blog-post-1.webp'); ?>" alt="" class="img-fluid">
                </div>

                <h2 class="title">
                  <a href="<?php echo e($dedupeLangSegment($article->fullLink)); ?>"><?php echo e($article->pagetitle); ?></a>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/views/home.blade.php ENDPATH**/ ?>