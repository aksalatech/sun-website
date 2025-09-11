@aware(['page'])
<!-- HOME - Hero Banner Section -->
<div class="main-banner">
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
            </div>
            @endforeach
        </div>
    </div>




<!-- QUALITY CHECKS SECTION -->
@php
    $qualityItemsModel = \App\Models\QualityCheck::query()
        ->where('is_active', true)
        ->orderBy('order')
        ->get();
@endphp
<section class="quality-section">
    <div class="container quality-container">
        <div class="row">
            @if($qualityItemsModel->count())
                @foreach($qualityItemsModel as $item)
                    <div class="quality-item col-md-3" data-aos="fade-up" data-aos-duration="700" data-aos-delay="{{ 50 + ($loop->index * 100) }}">
                        <div class="quality-item-inner">
                            @if(!empty($item->icon))
                                <img src="{{ asset('storage/'.$item->icon) }}" alt="icon" class="quality-icon">
                            @endif
                            <div class="quality-text">{!! $item->text !!}</div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>


<!-- WHY FROZEN SECTION -->
<!-- ABOUT OVERLAY SECTION (Inserted under Quality) -->
<section class="about-overlay-section">
    <div class="about-overlay-wrapper ">
        @if(!empty($aboutOverlayBackground))
        <img src="{{ asset('storage/'.$aboutOverlayBackground) }}" alt="about" class="about-bg">
        <div class="about-bg-tint"></div>
        @endif
        <div class="container about-overlay-container">
            <div class="about-content">
                <h3 data-aos="fade-up" data-aos-duration="700" class="about-title">{{ $aboutOverlayTitle }}</h3>
                <div data-aos="fade-up" data-aos-duration="700" data-aos-delay="100" class="about-text">{!! $aboutOverlayText !!}</div>
                @if(!empty($aboutOverlayButtonText))
                    <a href="{{ url($aboutOverlayButtonLink ?? '#') }}" class="secondary-btn px-5" data-aos="fade-up" data-aos-duration="700" data-aos-delay="200">{{ $aboutOverlayButtonText }}</a>
                @endif
            </div>
            @if(!empty($aboutOverlayBadges))
                <div class="ml-auto d-none d-md-block about-badges" data-aos="fade-up" data-aos-duration="700" data-aos-delay="300">
                    @foreach ($aboutOverlayBadges as $badge)
                        <img src="{{ asset('storage/'.$badge['image']) }}" alt="badge" class="about-badge-img">
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</section>


<section class="why-frozen-section">
    <div class="container">
        <div class="text-center" style="max-width:980px; margin:0 auto 30px;">
            <h2 data-aos="fade-up" data-aos-duration="700" class="text-dark why-title">{{ $whyFrozenTitle }}</h2>
            @if(!empty($whyFrozenSubtitle))
            <p data-aos="fade-up" data-aos-duration="700" data-aos-delay="100" style="margin-top:10px; font-weight:600;">{{ $whyFrozenSubtitle }}</p>
            @endif
        </div>

        <div class="why-grid mt-70">
            @foreach(($whyFrozenReasons ?? []) as $reason)
                <div class="why-card" data-aos="fade-up" data-aos-duration="700" data-aos-delay="{{ 50 + ($loop->index * 100) }}">
                    @if(!empty($reason['icon']))
                        <div class="why-icon-wrap">
                            <img src="{{ asset('storage/'.$reason['icon']) }}" alt="icon" class="why-icon">
                        </div>
                    @endif
                    <div style="font-weight:800; line-height:1.3;">{{ $reason['title'] }}</div>
                </div>
            @endforeach
        </div>
    </div>
</section>


@if(isset($aboutEnableVideo) && $aboutEnableVideo)
<section class="about-us-video-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="about-us-video-container" data-aos="fade-up" data-aos-duration="800">
                    @if(isset($aboutVideoType) && $aboutVideoType === 'upload' && isset($aboutVideoFile) && !empty($aboutVideoFile))
                        <video controls class="about-us-video-player">
                            <source src="{{ asset('storage/' . $aboutVideoFile) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    @elseif(isset($aboutVideoType) && $aboutVideoType === 'youtube' && isset($aboutYoutubeUrl) && $aboutYoutubeUrl)
                        <div class="about-us-video-embed">
                            <iframe
                                width="100%"
                                height="600"
                                src="{{ $aboutYoutubeUrl }}"
                                frameborder="0"
                                allowfullscreen>
                            </iframe>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endif
