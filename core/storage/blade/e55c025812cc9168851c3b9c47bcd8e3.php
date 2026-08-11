  <?php
    // Home page requests can double the language segment in generated links (e.g. /uk/uk/blog/).
    // Collapse any accidental repeat of a 2-letter locale segment here instead of touching core.
    $dedupeLangSegment = fn (?string $url): string => preg_replace('#/([a-z]{2})/\1(/|$)#', '/$1$2', (string) $url);
  ?>
  <header id="header" class="header position-relative">
    <div class="container-fluid container-xl position-relative">

      <div class="top-row d-flex align-items-center justify-content-between">
        <a href="<?php echo e($dedupeLangSegment(evo()->makeUrl((int) evo()->getConfig('site_start')))); ?>" class="logo d-flex align-items-end">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <!-- <img src="assets/img/logo.webp" alt=""> -->
          <h1 class="sitename"><?php echo e(evo()->getConfig('site_name', 'Blogy')); ?></h1><span>.</span>
        </a>

        <div class="d-flex align-items-center">
          <div class="social-links">
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          </div>

          <form class="search-form ms-4">
            <input type="text" placeholder="Search..." class="form-control">
            <button type="submit" class="btn"><i class="bi bi-search"></i></button>
          </form>

          <?php if(evo()->getConfig('s_lang_enable') && class_exists(\Seiger\sLang\sLang::class)): ?>
            <?php
              $currentLang = evo()->getConfig('lang', app('sLang')->langDefault());
              $langSwitcher = app('sLang')->langSwitcher();
              $currentLangItem = $langSwitcher[$currentLang] ?? reset($langSwitcher);
            ?>
            <?php if(!empty($langSwitcher)): ?>
              <div class="dropdown lang-switcher ms-4">
                <a class="dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <?php echo e($currentLangItem['short'] ?? strtoupper($currentLang)); ?>

                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <?php $__currentLoopData = $langSwitcher; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                      <a class="dropdown-item<?php echo e($code === $currentLang ? ' active' : ''); ?>" href="<?php echo e($item['link']); ?>">
                        <?php echo e($item['name'] ?? strtoupper($code)); ?>

                      </a>
                    </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
              </div>
            <?php endif; ?>
          <?php endif; ?>
        </div>
      </div>

    </div>

    <div class="nav-wrap">
      <div class="container d-flex justify-content-center position-relative">
        <?php
          $currentId = (int) ($documentObject['id'] ?? 0);
          $currentParent = (int) ($documentObject['parent'] ?? 0);
          $siteStart = (int) evo()->getConfig('site_start');
        ?>
        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="<?php echo e($dedupeLangSegment(evo()->makeUrl((int) evo()->getConfig('site_start')))); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active' => $currentId === $siteStart]); ?>"><?php echo app('translator')->get('Homepage'); ?></a></li>
            <li><a href="<?php echo e($dedupeLangSegment(evo()->makeUrl(2))); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active' => $currentId === 2 || $currentParent === 2]); ?>"><?php echo app('translator')->get('Blog'); ?></a></li>
            <li><a href="<?php echo e($dedupeLangSegment(evo()->makeUrl(12))); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active' => $currentId === 12]); ?>"><?php echo app('translator')->get('About Us'); ?></a></li>

          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
      </div>
    </div>

  </header><?php /**PATH /var/www/html/views/partials/header.blade.php ENDPATH**/ ?>