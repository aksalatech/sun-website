{{-- @aware(['page'])

<!-- Header Section -->
<section class="career-header position-relative text-white text-center">
    @if (!empty($headerImage))
    <img src="{{ asset('storage/' . $headerImage) }}" alt="Header Background" class="career-bg-img w-100" style="height: 80vh; object-fit: cover; filter: brightness(0.6);">
    @endif

    <div class="title position-absolute top-50 start-50 translate-middle">
        <h1 class="fw-bold display-4">{{ $headerTitle }}</h1>
    </div>
</section>

<!-- Career List Section -->
<section class="career-list py-5">
    <div class="container">
      <!-- Intro -->
      <div class="career-intro mb-5 text-center">
        <h2 class="fw-bold">{{ $jobseekTitle }}</h2>
        <p class="text-muted">{{ $jobseekDescription }}</p>
      </div>
  
      <!-- Job Listings -->
      @foreach ($vacancies as $vacancy)
      <div class="row justify-content-center">
        <div class="col-lg-10"> <!-- ini bikin card job ada di tengah -->
          <div class="job-item border-top py-4">
            <div class="row align-items-center">
              <div class="col-md-9 job-info">
                <h3 class="fw-semibold mb-2">{{ $vacancy['jobTitle'] }}</h3>
                <p class="text-muted">{{ $vacancy['jobDescription'] }}</p>
                <div class="job-tags d-flex gap-2 flex-wrap mt-2">
                  <span class="tag">
                    {{ $vacancy['is_remote'] ? 'Remote' : 'WFO' }}
                  </span>
                  <span class="tag">
                    {{ $vacancy['is_fulltime'] ? 'Full-time' : 'Part-time' }}
                  </span>
                </div>
              </div>
              <div class="col-md-3 job-action mt-3 mt-md-0 text-md-end">
                <a href="{{ $vacancy['apply_url'] }}" class="apply-button fw-semibold text-decoration-none" target="_blank">
                  Apply <span class="icon ms-1">↗</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </section>
  
 --}}
