@extends('layout')

@section('content')
        <!-- Page Title -->
    <div class="page-title">
      <div class="breadcrumbs">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="@makeUrl(evo()->getConfig('site_start'))"><i class="bi bi-house"></i> @lang('Homepage')</a></li>
            <li class="breadcrumb-item"><a href="@makeUrl(2)">@lang('Blog')</a></li>
            <li class="breadcrumb-item active current">{{ !empty($documentObject['menutitle']) ? $documentObject['menutitle'] : $documentObject['pagetitle'] }}</li>
          </ol>
        </nav>
      </div>

      <div class="title-wrapper">
        <h1>{{ $documentObject['pagetitle'] ?? '' }}</h1>
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
                  <img src="{{ $documentObject['Image'] }}" alt="{{ $documentObject['pagetitle'] }}" class="img-fluid" loading="lazy">
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
                    <h1 class="title">{{ $documentObject['pagetitle'] }}</h1>

                    <div class="author-info">
                      <div class="author-details">
                        <img src="{{ $documentObject['tv_author_photo'] ?? '' }}" alt="Author" class="author-img">
                        <div class="info">
                          <h4>{{$documentObject['tv_author'] ?? 'Unknown Author'}}</h4>
                        </div>
                      </div>
                      <div class="post-meta">
                        <span class="date"><i class="bi bi-calendar3"></i> {{ !empty($documentObject['publishedon']) ? date('M j, Y', $documentObject['publishedon']) : '' }}</span>

                      </div>
                    </div>
                  </div>

                  <div class="content">
                   {!! $documentObject['content'] !!}
                  </div>



                    @php
                      $shareUrl = request()->url();
                      $shareTitle = $documentObject['pagetitle'] ?? '';
                    @endphp
                    <div class="meta-bottom">
                      <div class="share-section">
                        <h4 >@lang('Share Article')</h4>
                        <div class="social-links">
                          <a href="https://twitter.com/intent/tweet?url={{ urlencode($shareUrl) }}&text={{ urlencode($shareTitle) }}" class="twitter share-popup" target="_blank" rel="noopener" title="Share on X"><i class="bi bi-twitter-x"></i></a>
                          <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($shareUrl) }}" class="facebook share-popup" target="_blank" rel="noopener" title="Share on Facebook"><i class="bi bi-facebook"></i></a>
                          <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode($shareUrl) }}" class="linkedin share-popup" target="_blank" rel="noopener" title="Share on LinkedIn"><i class="bi bi-linkedin"></i></a>
                          <a href="#" class="copy-link" data-url="{{ $shareUrl }}" title="Copy Link"><i class="bi bi-link-45deg"></i></a>
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



            {{-- <!-- Categories Widget -->
            <div class="categories-widget widget-item">

              <h3 class="widget-title">Categories</h3>
              <ul class="mt-3">
                <li><a href="#">General <span>(25)</span></a></li>
                <li><a href="#">Lifestyle <span>(12)</span></a></li>
                <li><a href="#">Travel <span>(5)</span></a></li>
                <li><a href="#">Design <span>(22)</span></a></li>
                <li><a href="#">Creative <span>(8)</span></a></li>
                <li><a href="#">Educaion <span>(14)</span></a></li>
              </ul>

            </div><!--/Categories Widget --> --}}

 

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