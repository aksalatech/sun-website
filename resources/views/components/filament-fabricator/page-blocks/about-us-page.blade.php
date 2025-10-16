@aware(['page'])
<section class="about-us-banner-section" style="background-image: url('{{ asset('storage/' . $banner) }}');" data-aos="fade-up">
    <div class="container" data-aos="fade-up" data-aos-duration="750">
        <h1>{{ $title }}</h1>
        <p>
            {{ $description }}
        </p>
    </div>
</section>
<section class="about-us-content-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="about-us-content-section__title" data-aos="fade-down" data-aos-duration="800">
                    About Us
                </div>
                <div class="about-us-content-section__text" data-aos="fade-down" data-aos-duration="800">
                    {!! $content !!}
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about-us-vision-mission-section">
    <div class="container-fluid">
        <div class="row d-flex">
            <div class="col-md-6 vision-column" data-aos="fade-up" data-aos-duration="800">
                <div class="vision-mission-card vision-card">
                    <h3 class="vision-mission-title">OUR VISION</h3>
                    <div class="vision-mission-content">
                        {!! $vision !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6 mission-column" data-aos="fade-up" data-aos-duration="800">
                <div class="vision-mission-card mission-card">
                    <h3 class="vision-mission-title">OUR MISSION</h3>
                    <div class="vision-mission-content">
                        {!! $mission !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about-us-achievement text-center">
    <div class="container">
        <div class="row mt-5" data-aos="fade-up" data-aos-duration="700">
            @foreach ($achievementStats as $stat)
                <div class="col-md-3 mb-4">
                    <div class="about-us-achievement-stat">
                        <div class="about-us-achievement-stat-value"><span class="counter">{{ $stat['value'] }}</span>{{ $stat['prefix'] }}</div>
                        <div class="about-us-achievement-stat-title">{{ $stat['title'] }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="about-us-content-section">
    <div class="container-fluid">
        <h2 class="about-us-clients-title">Our Clients</h2>
        <div class="about-us-content-section__logos brand-slider">
            @php
                $brands = \App\Models\Brand::query()
                ->where('is_active', true)
                ->orderBy('created_at', 'desc')
                ->get();
            @endphp

            @foreach ($brands as $brand)
                <img src="{{ asset('storage/' . $brand->logo) }}" alt="{{ $brand->title }} Logo" class="about-us-content-section__logo" data-aos="fade-right" data-aos-duration="800"/>
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
@else
<!-- Coming Soon Video Section -->
<section class="coming-soon-video-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="coming-soon-container" data-aos="fade-up" data-aos-duration="800">
                    <div class="coming-soon-content">
                        <div class="coming-soon-icon">
                            <svg width="80" height="80" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 5v14l11-7z" fill="currentColor"/>
                            </svg>
                        </div>
                        <h3 class="coming-soon-title">Video Coming Soon</h3>
                        <p class="coming-soon-description">
                            We're working on something amazing! Stay tuned for our upcoming video content that will showcase our story and commitment to quality.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
