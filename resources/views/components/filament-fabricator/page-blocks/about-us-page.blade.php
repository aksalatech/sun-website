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
@if(isset($enableVideo) && $enableVideo)
<section class="about-us-video-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="about-us-video-container" data-aos="fade-up" data-aos-duration="800">
                    @if(isset($videoType) && $videoType === 'upload' && isset($videoFile) && !empty($videoFile))
                        <video controls class="about-us-video-player">
                            <source src="{{ asset('storage/' . $videoFile) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    @elseif(isset($videoType) && $videoType === 'youtube' && isset($youtubeUrl) && $youtubeUrl)
                        <div class="about-us-video-embed">
                            <iframe 
                                width="100%" 
                                height="600" 
                                src="{{ $youtubeUrl }}" 
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


@push('custom-scripts')
<script>
    // add class header-dark to header
    document.querySelector('#header').classList.add('header-dark');
</script>
@endpush
