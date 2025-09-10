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
  <div class="about-us-content-section__text" data-aos="fade-down" data-aos-duration="800">
    {!! $content !!}
  </div>

  <div class="about-us-content-section__logos">
    @php
        $brands = \App\Models\Brand::query()
        ->where('is_active', true)
        ->orderBy('created_at', 'desc')
        ->get();
    @endphp
    @foreach ($brands as $brand)
        <img src="{{ asset('storage/' . $brand->logo_dark) }}" alt="{{ $brand->title }} Logo" class="about-us-content-section__logo" data-aos="fade-right" data-aos-duration="800"/>
    @endforeach
  </div>
</section>
<section class="about-us-moto-section">
  <div class="container">
    <p class="about-us-moto-section__text gradient-text" data-aos="fade-up" data-aos-duration="800">
      {{ $quote }}
    </p>
  </div>
</section>
<section class="about-us-vision-mission-section">
    <div class="container">
        <div class="row align-items-center justify-content-center d-flex">
            <div class="col-md-6" data-aos="fade-up" data-aos-duration="800">
                {!! $visionMission !!}
            </div>
            <div class="col-md-6" data-aos="fade-left" data-aos-duration="800">
                <div class="about-us-vision-mission-section__image-wrapper">
                    <img src="{{ asset('storage/' . $visionMissionImage) }}" alt="Vision" class="about-us-vision-mission-section__image">
                </div>
            </div>
        </div>
    </div>
</section>

@php
   $homePage = Z3d0X\FilamentFabricator\Models\Page::where('slug', 'homepage')->firstOrFail();
   $homeData = $homePage->blocks[0]['data'];
@endphp

<section class="about-us-achievement text-center">
    <div class="container">
        <div class="about-us-achievement-title" data-aos="fade-down" data-aos-duration="700">
            {{ $homeData['achievementTitle'] }}
        </div>

        <div class="row mt-5" data-aos="fade-up" data-aos-duration="700">
            @foreach ($homeData['achievementStats'] as $stat)
                <div class="col-md-3 mb-4">
                    <div class="about-us-achievement-stat">
                        <div class="about-us-achievement-stat-title">{{ $stat['title'] }}</div>
                        <div class="about-us-achievement-stat-value gradient-text counter">{{ $stat['value'] }}</div>
                        <div class="about-us-achievement-stat-label">{{ $stat['caption'] }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@push('custom-scripts')
<script>
    // add class header-dark to header
    document.querySelector('#header').classList.add('header-dark');
</script>
@endpush
