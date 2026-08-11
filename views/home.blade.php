@extends('layout')

@php
    // Home page can double the language segment in generated links (e.g. /uk/uk/blog/post/).
    // Collapse any accidental repeat of a 2-letter locale segment here instead of touching core.
    $dedupeLangSegment = fn (?string $url): string => preg_replace('#/([a-z]{2})/\1(/|$)#', '/$1$2', (string) $url);
@endphp

@section('content')
    <!-- Blog Hero Section -->
    <section id="blog-hero" class="blog-hero section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="blog-grid">

          @php($generalList = collect($articles->items() ?? [])->values())
          @if($generalList->isNotEmpty())
            <!-- Featured Post (Large) -->
            @php($featured = $generalList->first())
            <article class="blog-item featured" data-aos="fade-up">
              <img src="{{ $featured->image ?: 'assets/img/blog/blog-post-3.webp' }}" alt="Blog Image" class="img-fluid">
              <div class="blog-content">
                <div class="post-meta">
                  <span class="date">{{ $featured->created_at?->format('M j, Y') }}</span>
                </div>
                <h2 class="post-title">
                  <a href="{{ $dedupeLangSegment($featured->fullLink) }}" title="{{ $featured->pagetitle }}">{{ $featured->pagetitle }}</a>
                </h2>
              </div>
            </article><!-- End Featured Post -->

            <!-- Regular Posts -->
            @foreach($generalList->skip(1) as $article)
              <article class="blog-item" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                <img src="{{ $article->image ?: 'assets/img/blog/blog-post-portrait-1.webp' }}" alt="Blog Image" class="img-fluid">
                <div class="blog-content">
                  <div class="post-meta">
                    <span class="date">{{ $article->created_at?->format('M j, Y') }}</span>
                  </div>
                  <h3 class="post-title">
                    <a href="{{ $dedupeLangSegment($article->fullLink) }}" title="{{ $article->pagetitle }}">{{ $article->pagetitle }}</a>
                  </h3>
                </div>
              </article><!-- End Blog Item -->
            @endforeach
          @else
            <p class="text-center">No posts yet.</p>
          @endif

        </div>

        <!-- Pagination -->
        @if($generalList->isNotEmpty() && ($previousPageUrl || $nextPageUrl))
        <div class="pagination-2 d-flex justify-content-center mt-4">
          <ul>
            <li>
              @if($previousPageUrl)
                <a href="{{ $previousPageUrl }}" aria-label="Previous"><i class="bi bi-chevron-left"></i></a>
              @else
                <span class="disabled" aria-label="Previous"><i class="bi bi-chevron-left"></i></span>
              @endif
            </li>
            <li>
              @if($nextPageUrl)
                <a href="{{ $nextPageUrl }}" aria-label="Next"><i class="bi bi-chevron-right"></i></a>
              @else
                <span class="disabled" aria-label="Next"><i class="bi bi-chevron-right"></i></span>
              @endif
            </li>
          </ul>
        </div>
        @endif

      </div>

    </section><!-- /Blog Hero Section -->

    <!-- Featured Posts Section -->
    <section id="featured-posts" class="featured-posts section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>@lang('feature_posts')</h2>
        <div>@lang('check_our_feature_posts')</div>
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
            @foreach(app('sGallery')->block('1') as $item)
              <div class="swiper-slide">
                <div class="blog-post-item">
                  <img src="{{ $item->src }}" alt="{{ $item->alt }}">
                  <div class="blog-post-content">
                    <h2><a href="{{ $item->link ?: '#' }}">{{ $item->title }}</a></h2>
                    <p>{{ $item->description }}</p>
                  </div>
                </div>
              </div><!-- End slide item -->
            @endforeach
          </div>

        </div>

      </div>

    </section><!-- /Featured Posts Section -->

    <!-- Latest Posts Section -->
    <section id="latest-posts" class="latest-posts section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
       
        <h2>@lang('Latest Posts')</h2>
        <div>@lang('сheck_our_last_posts')</div>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">

          @forelse($populars as $article)
            <div class="col-lg-4">
              <article>

                <div class="post-img">
                  <img src="{{ $article->image ?: 'assets/img/blog/blog-post-1.webp' }}" alt="" class="img-fluid">
                </div>

                <h2 class="title">
                  <a href="{{ $dedupeLangSegment($article->fullLink) }}">{{ $article->pagetitle }}</a>
                </h2>

                <p>{{ \Illuminate\Support\Str::limit(strip_tags($article->introtext), 120) }}</p>

                <div class="post-meta">
                  <p class="post-date">
                    <time datetime="{{ $article->created_at }}">{{ $article->created_at?->format('M j, Y') }}</time>
                  </p>
                  <p class="post-views">{{ $article->tv_views ?? 0 }} views</p>
                </div>

              </article>
            </div><!-- End post list item -->
          @empty
            <div class="col-12">
              <p class="text-center">No posts yet.</p>
            </div>
          @endforelse

        </div>
      </div>

    </section><!-- /Latest Posts Section -->
@endsection