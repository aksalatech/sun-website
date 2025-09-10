@php
    $contactPhone = \App\Models\GlobalSetting::getContentBySlug('contact-phone');

    $menuItems = \App\Models\Menu::query()
        ->where('is_active', true)
        ->orderBy('order')
        ->get();

    $brandItems = \App\Models\Brand::query()
        ->where('is_active', true)
        ->orderBy('created_at', 'desc')
        ->get();
@endphp
<header id="header" class="header-2 sticky-header">
  <div id="cd-search" class="cd-search" style="display: none;">
    <form class="form-search" id="searchForm" action="{{ url('/blogs') }}" method="get">
       <input class="form-control" value="" name="keyword" id="keyword" placeholder="Search..." type="text" fdprocessedid="t9tlmk">
    </form>
  </div>
  <div class="navigation-outer">
    <div class="fluid-container">
      <div class="navigation-row row align-items-center justify-content-center">
        <div class="col-lg-2">
          <div class="logo light-logo">
            <img src="{{ asset('storage/logo/logo-biru.png') }}" alt="" />
          </div>
          <div class="logo dark-logo">
            <img src="{{ asset('storage/logo/logo.png') }}" alt="" />
          </div>
        </div>

        <!--Navigation Start -->
        <div class="col-lg-8">
          <nav class="navigation">
            <ul>
              @foreach($menuItems as $item)
                <li class="active">
                  <a href="{{ $item->path }}"> {{ $item->title }}</a>
                    @if($item->title == "Brands")
                      <ul class="children">
                        @foreach($brandItems as $sub)
                          <li><a href="{{ $sub->url }}">{{ $sub->title }}</a></li>
                        @endforeach
                      </ul>
                    @endif
                </li>
              @endforeach
            </ul>
          </nav>
        </div>
        <!--Navigation End -->
        <div class="col-lg-2">
          <a href="{{ url('/contact-us') }}" class="btn-contact-us">Contact Us</a>
        </div>
      </div>

      <!--DL Menu Start-->

      <div id="responsive-navigation" class="dl-menuwrapper">
        <a href="{{ url('/') }}">
          <div class="logo light-logo">
            <img src="{{ asset('storage/logo/logo-biru.png') }}" alt="" />
          </div>
          <div class="logo dark-logo">
            <img src="{{ asset('storage/logo/logo.png') }}" alt="" />
          </div>
        </a>
       
        <button class="dl-trigger">
          <span class="close-icon">
            <span></span>

            <span></span>

            <span></span>
          </span>
        </button>

        <ul class="dl-menu dl-menu-toggle">
          @foreach($menuItems as $item)
            <li class="">
              <a href="{{ $item->path }}" @if($item->title == "Brands") class="have-children" @endif> {{ $item->title }}</a>
              @if($item->title == "Brands")
                <ul class="children">
                  @foreach($brandItems as $sub)
                    <li><a href="{{ $sub->url }}">{{ $sub->title }}</a></li>
                  @endforeach
                </ul>
              @endif
            </li>
          @endforeach
          <li>
            <a href="{{ url('/contact-us') }}">Contact Us</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</header>