@extends('layout')

@section('content')
        <!-- Page Title -->
    <div class="page-title">
      <div class="breadcrumbs">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="@makeUrl(evo()->getConfig('site_start'))"><i class="bi bi-house"></i> @lang('Homepage')</a></li>
            <li class="breadcrumb-item active current">@lang('About us')</li>
          </ol>
        </nav>
      </div>

      <div class="title-wrapper">
        <h1>@lang('About us')</h1>
      </div>
    </div><!-- End Page Title -->
    <div class="container">
      <div class="row">

        <div class="col-lg-8">

          <!-- Latest Posts Section -->
          <section id="latest-posts" class="latest-posts section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">
              <div class="row gy-4">
                {!! $documentObject['content'] !!}


              </div>
            </div>

            </section><!-- End Latest Posts Section -->
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