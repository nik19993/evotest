@extends('layout')

@section('content')
        <!-- Page Title -->
    <div class="page-title">
      <div class="breadcrumbs">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="@makeUrl(evo()->getConfig('site_start'))"><i class="bi bi-house"></i> @lang('Homepage')</a></li>
            <li class="breadcrumb-item active current">@lang('Blog')</li>
          </ol>
        </nav>
      </div>

      <div class="title-wrapper">
        <h1>@lang('Blog')</h1>
      </div>
    </div><!-- End Page Title -->
    <div class="container">
      <div class="row">

        <div class="col-lg-8">

          <!-- Latest Posts Section -->
          <section id="latest-posts" class="latest-posts section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">
              <div class="row gy-4">

                @forelse($articles as $article)
                  <div class="col-lg-6">
                    <article>

                      <div class="post-img">
                        <img src="{{ $article->image ?: 'assets/img/blog/blog-post-1.webp' }}" alt="" class="img-fluid">
                      </div>

                      <h2 class="title">
                        <a href="{{ $article->fullLink }}">{{ $article->pagetitle }}</a>
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

          <!-- Pagination 2 Section -->
          <section id="pagination-2" class="pagination-2 section">

            <div class="container">
              <div class="d-flex justify-content-center">
                <ul>
                  <li>
                    @if($previousPageUrl)
                      <a href="{{ $previousPageUrl }}"><i class="bi bi-chevron-left"></i></a>
                    @else
                      <span class="disabled"><i class="bi bi-chevron-left"></i></span>
                    @endif
                  </li>
                  <li>
                    @if($nextPageUrl)
                      <a href="{{ $nextPageUrl }}"><i class="bi bi-chevron-right"></i></a>
                    @else
                      <span class="disabled"><i class="bi bi-chevron-right"></i></span>
                    @endif
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

              <h3 class="widget-title">@lang('Popular Posts')</h3>

              @foreach(($populars ?? collect()) as $popular)
                <div class="post-item">
                  <img src="{{ $popular->image ?: 'assets/img/blog/blog-post-square-1.webp' }}" alt="" class="flex-shrink-0">
                  <div>
                    <h4><a href="{{ $popular->fullLink }}">{{ $popular->pagetitle }}</a></h4>
                    <time datetime="{{ $popular->created_at }}">{{ $popular->created_at?->format('M j, Y') }}</time>
                  </div>
                </div><!-- End recent post item-->
              @endforeach

            </div><!--/Recent Posts Widget -->

          </div>

        </div>

      </div>
    </div>

@endsection