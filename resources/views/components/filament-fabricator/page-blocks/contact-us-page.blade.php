@aware(['page'])

{{-- CONTACT - Detail Section --}}
<section class="contact-section">
    <div class="container">
      <!-- Baris 1: Title/Description + Gallery -->
      <div class="row contact-main-row">
        <!-- Kolom Kiri - Title & Description -->
        <div class="col-lg-6 col-12 contact-col-left" data-aos="fade-right" data-aos-duration="1000">
          <div class="contact-header">
            <h2 class="contact-title">{{ $title }}</h2>
            <p class="contact-description">{{ $description }}</p>
          </div>
        </div>
        
        <!-- Kolom Kanan - Gallery Slider -->
        <div class="col-lg-6 col-12 contact-col-right" data-aos="fade-left" data-aos-duration="1000">
          <div class="gallery-slider-wrapper">
            <div class="gallery-slider">
              @foreach ($brandLogos as $brand)
                @if (!empty($brand['logo']))
                  <div class="slider-item">
                    <img src="{{ asset('storage/' . $brand['logo']) }}" alt="Brand Logo" class="brand-logo-img-contact">
                  </div>
                @endif
              @endforeach
            </div>
          </div>
        </div>
      </div>
  
      <!-- Baris 2: Informasi Kontak -->
      <div class="row contact-info-row">
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

{{-- CONTACT - Form Section --}}
<section class="form-section">
    <div class="container">
        <div class="row align-items-center justify-content-center d-flex">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="form-info" data-aos="fade-right" data-aos-duration="1000">
                    <h2 class="form-title">{{ $formTitle }}</h2>
                    <p class="form-subtitle">{{ $sub }}</p>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="form-fields" data-aos="fade-left" data-aos-duration="1000">
                    @if ($errors->any())
                        <div class="alert alert-danger mt-2">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    @if (session('success'))
                        <div class="alert alert-success mt-2">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('contact.send-email') }}">
                      @csrf
                        <div class="form-grid">
                            <!-- Kiri -->
                            <div class="grid-left">
                                <input type="text" name="name" placeholder="Name" class="input" />
                                <input type="text" name="phone" placeholder="+62" class="input" />
                                <input type="email" name="email" placeholder="Email Address" class="input" />
                            </div>
                    
                            <!-- Kanan -->
                            <div class="grid-right">
                                <select name="category" class="input">
                                    <option value="">Select Category</option>
                                    <option value="saran">Suggestion</option>
                                    <option value="komplain">Complaint</option>
                                    <option value="pemesanan">Order</option>
                                </select>
                                <textarea name="message" placeholder="Text" class="input textarea"></textarea>
                                <!-- Turnstile Widget -->
                                <div class="cf-turnstile" data-sitekey="{{ env('TURNSTILE_SITE_KEY') }}"></div>
                               
                            </div>
                        </div>

                      
                    
                        <!-- Tombol -->
                        <div class="form-row">
                            <button type="submit" class="submit-btn">Send</button>
                        </div>
                    </form>                     
                </div>  
            </div>
        </div>
    </div>
</section>

@push('custom-scripts')
<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
<script>
    // add class header-dark to header
    document.querySelector('#header').classList.add('header-dark');
    document.querySelector('#header').classList.add('solid');
</script>
@endpush