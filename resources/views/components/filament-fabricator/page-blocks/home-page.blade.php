@aware(['page'])
@php
    $brandProducts = \App\Models\Brand::query()
        ->where('is_active', true)
        ->orderBy('created_at', 'desc')
        ->get();
@endphp
<!-- HOME - Hero Banner Section -->
<div class="main-banner">
        {{-- <button type="button" class="custom-prev">
            <img src="{{ asset('assets/front/images/prev-arrow.png') }}" alt="Next" />
        </button>

        <button type="button" class="custom-next">
            <img src="{{ asset('assets/front/images/next-arrow.png')}}" alt="Next" />
        </button> --}}
        <div class="slider arrow-2">
            @foreach ($heroSlides as $item)
            <div>
                <div class="main-banner-background">
                    @if(Str::endsWith($item['image'], ['.mp4', '.mov', '.avi']))
                        <video width="100%" height="100%" autoplay muted loop class="video-hero">
                            <source src="{{ Storage::url($item['image']) }}" type="video/mp4">
                            Browser tidak mendukung video.
                        </video>
                    @else
                        <img class="image-hero" src="{{ Storage::url($item['image']) }}" alt="oscarthemes" />
                    @endif
                </div>

                <div class="banner-caption-wrapper">
                    <div class="container">
                        <div class="banner-caption caption-style-1">
                            <div class="clear"></div>
                                <h4
                                    data-aos="fade-up"
                                    class="hero-title">
                                    {{ $item['heroTitle'] }}
                                </h4>
                                <h5
                                    data-aos="fade-up"
                                    data-aos-delay="100"
                                    class="hero-subtitle">
                                    {{ $item['heroSubtitle'] }}
                                </h5>
                                <div
                                    data-aos="fade-up"
                                    data-aos-delay="300"
                                    class="hero-description">
                                    {!! $item['heroDescription'] !!}
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
<!-- HOME - Brand Section -->
<section class="brand-section">
    <div class="brand-header">
        <h2 data-aos="fade-left">{{ $brandTitle }}</h2>
    </div>
    <div class="brand-slider-wrap">
        <button type="button" class="custom-prev">
            <img src="{{ asset('assets/front/images/prev-arrow.png') }}" alt="Next" />
        </button>

        <button type="button" class="custom-next">
            <img src="{{ asset('assets/front/images/next-arrow.png')}}" alt="Next" />
        </button>
        <div class="brand-slider">
            @foreach ($brandProducts as $product)
                <a href="{{ $product['url'] ?? '#' }}" target="_blank" class="">
                    <div class="brand-slide" style="background-image: url('{{ asset('storage/'.$product['background']) }}');">
                        <div class="brand-content">
                            <img src="{{ asset('storage/'.$product['logo']) }}" alt="" class="brand-logo" data-aos="fade-up" data-aos-delay="{{ 50 + ($loop->index * 100) }}" data-aos-duration="700">
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>

<!-- HOME - Why us Section -->
<section class="why-us-section">
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <small data-aos="fade-up" data-aos-duration="700">{{ $whySubtitle }}</small>
                <h2 data-aos="fade-up" data-aos-duration="700">{{ $whyTitle }}</h2>
                <p data-aos="fade-up" data-aos-duration="1000">
                    {!! $whyDescription !!}
                </p>
                <a href="{{ url('/contact-us') }}" data-aos="fade-up" data-aos-duration="700">CONTACT US</a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <img src="{{ asset('storage/'.$whyImage) }}" alt="{{ $whyTitle }}" data-aos="fade-up" data-aos-duration="700">
            </div>
        </div>
    </div>
</section>

<!-- HOME - Service Section -->
<section class="service-section">
    <div class="container">
        <div class="section-service-title text-center" data-aos="fade-up" data-aos-duration="700">
            {{ $serviceSectionTitle }}
        </div>
        <div class="row d-flex">
            @foreach ($serviceList as $service)
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-duration="700" data-aos-delay="{{ 50 + ($loop->index * 100) }}">
                    <div class="box-service">
                        <img src="{{ asset('storage/'.$service['serviceImage']) }}" alt="">
                        <div class="text-service">
                            <h4>{{ $service['serviceTitle'] }}</h4>
                            <p>{!! $service['serviceDescription'] !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- HOME - Achievement Section -->
<section class="section-achievement text-center " style="background-image: url('/images/achievement/map.png');">
    <div class="container">
        <div class="section-achievement-title gradient-text" data-aos="fade-up" data-aos-duration="700">
            {{ $achievementTitle }}
        </div>
        <div class="section-achievement-subtitle" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
            {!! $achievementDescription !!}
        </div>

        <div class="row mt-5">
            @foreach ($achievementStats as $stat)
                <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-duration="700" data-aos-delay="{{ 50 + ($loop->index * 100) }}">
                    <div class="section-achievement-stat">
                        <div class="section-achievement-stat-title">{{ $stat['title'] }}</div>
                        <div class="section-achievement-stat-value gradient-text counter">{{ $stat['value'] }}</div>
                        <div class="section-achievement-stat-label gradient-text">{{ $stat['caption'] }}</div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row" style="max-width: 800px; justify-self: center;">
            <div class="col-md-6 mb-50">
                <div class="section-achievement-logos d-flex flex-wrap justify-content-center mt-4" data-aos="fade-up" data-aos-duration="1100">
                    @foreach ($achievementLogos1 as $logo)
                        <img src="{{ asset('storage/' . $logo['logo']) }}" data-aos="fade-up" data-aos-duration="700" data-aos-delay="{{ 50 + ($loop->index * 100) }}"/>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6">
                <div class="section-achievement-logos d-flex flex-wrap justify-content-center mt-4" data-aos="fade-up" data-aos-duration="1100">
                    @foreach ($achievementLogos2 as $logo)
                        <img src="{{ asset('storage/' . $logo['logo']) }}" data-aos="fade-up" data-aos-duration="700" data-aos-delay="{{ 50 + ($loop->index * 100) }}"/>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- HOME - Market Penetration Section -->
<section class="market-penetration-wrapper">
        <div class="market-penetration-section">
            {{-- <div class="market-penetration-section" style="background-image: url('{{ asset('storage/' . ($marketBackground ?? 'default-bg.jpg')) }}');"> --}}
            <div class="title-on-market-penetration">
                <div class="market-header" data-aos="fade-up" data-aos-duration="1000">
                    @if (!empty($marketIcon))
                        <img src="{{ asset('storage/' . $marketIcon) }}" alt="Market Penetration Logo" class="market-logo">
                    @endif
                </div>

                <div class="market-content" data-aos="fade-in" data-aos-duration="700">
                    <p>
                        {{ $marketText ?? 'No description available' }}
                    </p>
                </div>
            </div>

            <div class="market-image">
                    @if(Str::endsWith($marketCountryImage, ['.mp4', '.mov', '.avi']))
                        <video width="100%" height="100%" autoplay muted loop class="video-hero">
                            <source src="{{ asset('storage/' . $marketCountryImage) }}" type="video/mp4">
                            Browser tidak mendukung video.
                        </video>
                    @else
                        <img src="{{ asset('storage/' . $marketCountryImage) }}" alt="Country Representation" class="market-country">
                    @endif
            </div>

        </div>
</section>
