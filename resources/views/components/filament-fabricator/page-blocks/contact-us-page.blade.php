@aware(['page'])
<section class="about-us-banner-section" style="background-image: url('{{ asset('storage/' . $banner) }}');" data-aos="fade-up">
    <div class="container" data-aos="fade-up" data-aos-duration="750">
    </div>
</section>

{{-- CONTACT - Detail Section --}}
<section class="contact-section">
    <div class="container">
      <!-- Baris 1: Title/Description + Gallery -->
      <div class="row contact-main-row">
        <!-- Kolom Kiri - Title & Description -->
        @if(!empty($title))
        <div class="col-lg-6 col-12 contact-col-left" data-aos="fade-right" data-aos-duration="1000">
          <div class="contact-header">
            <h2 class="contact-title">{{ $title }}</h2>
            <p class="contact-description">{{ $description }}</p>
          </div>
        </div>
        @endif
      </div>

      <!-- Baris 2: Informasi Kontak -->
      <div class="row contact-info-row align-items-center">
        <div class="col-lg-6 col-12 contact-col-right" data-aos="fade-left" data-aos-duration="1000">
          @php
            $mapsEmbed = $googleMapsEmbed ?? null;
          @endphp
          
          @if(!empty($mapsEmbed))
            <div class="maps-wrapper" data-aos="fade-up" data-aos-duration="1000">
                {!! $mapsEmbed !!}
            </div>
          @else
            <div class="maps-placeholder" data-aos="fade-up" data-aos-duration="1000">
                <p>Google Maps embed will appear here when configured.</p>
            </div>
          @endif
        </div>
        <div class="col-lg-6 col-12 contact-col-left" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
          <div class="contact-info-grid">
            @foreach ($information as $info)
              <div class="contact-info-item">
                @if (!empty($info['icon']))
                  <img src="{{ asset('storage/' . $info['icon']) }}" alt="Icon" class="contact-icon">
                @endif
                <p class="contact-text">{{ $info['text'] }}</p>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>


