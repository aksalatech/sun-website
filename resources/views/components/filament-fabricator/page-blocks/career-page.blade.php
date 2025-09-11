@aware(['page'])

<!-- Header Section -->
<section class="career-header position-relative text-white text-center">
    @if (!empty($headerImage))
        <img src="{{ asset('storage/' . $headerImage) }}" alt="Header Background" class="career-bg-img"
            data-aos="fade-down">
    @endif

    <div class="title">
        <h1 data-aos="fade-up">{{ $careerHeaderTitle }}</h1>
    </div>
</section>

<!-- Career List Section -->
<section class="career-list">
    <div class="career-content">
        <!-- Intro -->

        <!-- Job Listings -->
        @foreach ($vacancies as $vacancy)
            <div class="job-item border-top py-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 job-info">
                        <h3 class="fw-semibold mb-2" data-aos="fade-right" data-aos-duration="800">{{ $vacancy['jobTitle'] }}</h3>
                        <div data-aos="fade-right" data-aos-duration="800" class="paragraph-career">{!! $vacancy['jobDescription'] !!}</div>
                        <div class="job-tags d-flex gap-2 flex-wrap mt-2" data-aos="fade-up-right" data-aos-duration="850">
                            <span class="tag">  
                                @if ($vacancy['is_remote'])
                                    <i class="fas fa-map-marker-alt"></i>
                                    Remote
                                @else
                                    <i class="fas fa-map-marker-alt"></i>
                                    Full-WFO
                                @endif
                            </span>
                            <span class="tag">
                                <!-- Ikon Full-time/Part-time -->
                                @if ($vacancy['is_fulltime'])
                                    <i class="far fa-clock"></i>
                                    Full-time
                                @else
                                    <i class="far fa-clock"></i>
                                    Part-time
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 text-md-end text-right apply" data-aos="fade-right" data-aos-duration="850">
                        <a href="{{ $vacancy['apply_url'] }}" 
                        class="apply-button fw-semibold text-decoration-none align-self-start mt-md-0 mt-3" 
                        target="_blank">
                        Apply
                        <svg class="arrow-icon" width="85" height="85" viewBox="0 0 85 85" xmlns="http://www.w3.org/2000/svg">
                            <path d="M63.75 21.25L63.75 55.7812C63.75 56.4857 64.0299 57.1614 64.528 57.6595C65.0261 58.1576 65.7018 58.4375 66.4062 58.4375C67.1107 58.4375 67.7864 58.1576 68.2845 57.6595C68.7826 57.1614 69.0625 56.4857 69.0625 55.7812L69.0625 18.5938C69.0625 17.8893 68.7826 17.2136 68.2845 16.7155C67.7864 16.2174 67.1107 15.9375 66.4062 15.9375L29.2188 15.9375C28.5143 15.9375 27.8386 16.2174 27.3405 16.7155C26.8424 17.2136 26.5625 17.8893 26.5625 18.5937C26.5625 19.2982 26.8424 19.9739 27.3405 20.472C27.8386 20.9701 28.5143 21.25 29.2187 21.25L63.75 21.25Z" fill="black"/>
                            <path d="M68.2874 20.4748C68.7862 19.976 69.0664 19.2995 69.0664 18.5942C69.0664 17.8888 68.7862 17.2123 68.2874 16.7135C67.7887 16.2148 67.1122 15.9346 66.4068 15.9346C65.7014 15.9346 65.0249 16.2148 64.5262 16.7135L19.3699 61.8698C18.8712 62.3686 18.5909 63.045 18.5909 63.7504C18.5909 64.4558 18.8712 65.1323 19.3699 65.631C19.8687 66.1298 20.5452 66.41 21.2506 66.41C21.9559 66.41 22.6324 66.1298 23.1312 65.631L68.2874 20.4748Z" fill="black"/>
                        </svg>
                        </a>
                    </div>
                </div>
            </div> 
        @endforeach
    </diV>
</section>
