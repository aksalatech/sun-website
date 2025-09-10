@aware(['page'])
@php
    $blogs = \App\Models\Blog::where('is_active', 1)
    ->when(request()->filled('category'), function ($query) {
        $query->where('category', request('category'));
    })->when(request()->filled('search'), function ($query) {
        $query->where('title', 'like', '%' . request('search') . '%');
    })->paginate($limit);

    $latestBlogs = \App\Models\Blog::query()
    ->where('is_active', 1)
    ->latest()
    ->limit($latestLimit)
    ->get();
@endphp
<!-- Hero Section -->
<div class="blog-wrapper">
<section class="blog-hero pb-5">
    @if (!empty($headerImage))
    <img src="{{ asset('storage/' . $headerImage) }}" alt="Header Background" class="blog-background">
    @endif
    <div class="blog-title" data-aos="fade-up" data-aos-duration="800">
      <h1>{{ $headerTitle }}</h1>
      <p>{{ $subTitle }}</p>
    </div>
</section>

  <!-- Main Blog Content Section -->
  <section class="blog-main py-5">
    <div class="container">
      <div class="row">

        <!-- Sidebar Kiri: Kategori -->
        <aside class="col-md-2" data-aos="fade-right" data-aos-duration="850">
          <h5 class="mb-3 pb-10">Categories</h5>
            <ul class="list-unstyled category-list">
                <li><a href="{{ request()->fullUrlWithQuery(['category' => 'makeup', 'page' => 1]) }}" class="{{ request('category') === 'makeup' ? 'active' : '' }}">Make Up</a></li>
                <li><a href="{{ request()->fullUrlWithQuery(['category' => 'skincare', 'page' => 1]) }}" class="{{ request('category') === 'skincare' ? 'active' : '' }}">Skincare</a></li>
                <li><a href="{{ request()->fullUrlWithQuery(['category' => 'health', 'page' => 1]) }}" class="{{ request('category') === 'health' ? 'active' : '' }}">Health</a></li>
                <li><a href="{{ request()->fullUrlWithQuery(['category' => 'beauty', 'page' => 1]) }}" class="{{ request('category') === 'beauty' ? 'active' : '' }}">Beauty</a></li>
                <li><a href="{{ request()->fullUrlWithQuery(['category' => 'other', 'page' => 1]) }}" class="{{ request('category') === 'other' ? 'active' : '' }}">Other</a></li>
            </ul>
        </aside>

        <!-- Konten Tengah: Daftar Blog -->
        <div class="col-md-7" data-aos="fade-down" data-aos-duration="850">
          @foreach ($blogs as $blog)
		<a href="{{ route('pages.blog.detail', ['slug' => $blog->slug]) }}">
            <div class="d-flex flex-wrap flex-md-nowrap align-items-start h-auto card-post">
              <div class="col-12 col-md-6 mb-3 mb-md-0 h-100 col-sm-12 col-xs-12">
                <img src="{{ asset('storage/' . $blog['thumbnail']) }}" class="img-fluid post-thumb" alt="Blog Thumbnail">
              </div>
              <div class="col-12 col-md-6 col-sm-12 col-xs-12">
                <div class="blog-content">
                  <h3 class="mt-0 mb-20">{{ $blog['title'] }}</h3>
                  <p class="text-muted mb-10">{{ $blog['desc'] }}</p>
                  <button class="blog-readmore-custom">Read more <span><i class="fa fa-caret-right"></i></span></button>
                </div>
              </div>
            </div>
          </a>
          @endforeach
            <div class="d-flex justify-content-center mt-4">
                {{ $blogs->withQueryString()->links('components.pagination.custom') }}
            </div>
        </div>


        <!-- Sidebar Kanan: Search + Latest Blog -->
        <aside class="col-md-3" data-aos="fade-left" data-aos-duration="850">
            <form method="GET" action="{{ url()->current() }}">
                <div class=" mb-4">
                    <input type="text" class="form-control search-input" name="search"
                        value="{{ request('search') }}" placeholder="Search">
                    <i class="fas fa-search search-icon"></i>
                </div>
            </form>
            <h5 class="mb-3 pb-10">Latest Blog</h5>
            <ul class="list-unstyled latest-blog-list">
              @foreach ($latestBlogs as $latest)
                <li class="d-flex align-items-start gap-2 mb-3">
                    <img src="{{ asset('storage/' . $latest->thumbnail) }}" class="latest-thumb" alt="Thumb">
                    <a
                        href="{{ route('pages.blog.detail', ['slug' => $latest->slug]) }}"
                        class="latest-title text-decoration-none" >
                        {{ $latest->title }}
                    </a>
                </li>
              @endforeach
            </ul>
          </aside>
      </div>
    </div>
  </section>
</div>

@push('custom-scripts')
  <script>
      document.querySelector('#header').classList.add('header-dark');
  </script>
@endpush
