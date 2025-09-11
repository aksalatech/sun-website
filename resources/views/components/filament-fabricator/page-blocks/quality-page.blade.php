@aware(['page'])

<!-- Quality Hero -->
<section class="quality-hero">
    @if(!empty($heroBackground))
        <img src="{{ asset('storage/'.$heroBackground) }}" alt="quality hero" class="quality-hero-bg">
        <div class="quality-hero-tint"></div>
    @endif
    <div class="container quality-hero-content" data-aos="fade-up" data-aos-duration="800">
        <div class="quality-hero-small">{{ $heroSmallTitle }}</div>
        <h2 class="quality-hero-title">{!! $heroTitle !!}</h2>
    </div>
    <style>
        .quality-hero{position:relative}
        .quality-hero-bg{width:100%;height:100vh;object-fit:cover}
        .quality-hero-tint{position:absolute;inset:0;background:rgba(0,0,0,.35)}
        .quality-hero-content{position:absolute;inset:0;display:flex;align-items:center;justify-content:center;flex-direction:column;color:#fff;text-align:center}
        .quality-hero-small{font-style:italic;margin-bottom:8px}
        .quality-hero-title{max-width:900px;font-weight:800}
    </style>
</section>

<!-- Product Guarantee -->
<section class="quality-guarantee py-5">
    <div class="container">
        <h2 class="quality-section-title mt-70 mb-50" data-aos="fade-up" data-aos-duration="700">{{ $guaranteeTitle }}</h2>
        <div class="row align-items-start">
            <div class="col-md-6 mb-4 mb-md-0" data-aos="fade-right" data-aos-duration="700">
                @if(!empty($guaranteeImageLeft))
                    <img src="{{ asset('storage/'.$guaranteeImageLeft) }}" alt="guarantee image" class="img-fluid">
                @endif
            </div>
            <div class="col-md-6" data-aos="fade-left" data-aos-duration="700">
                @php
                    $qcItems = \App\Models\QualityCheck::query()
                        ->where('is_active', true)
                        ->orderBy('order')
                        ->get();
                @endphp
                <div class="quality-guarantee-rows">
                    @if($qcItems->count())
                        @foreach($qcItems as $qc)
                            <div class="guarantee-row">
                                @if(!empty($qc->icon))
                                    <img class="guarantee-row-icon" src="{{ asset('storage/'.$qc->icon) }}" alt="icon">
                                @endif
                                <div class="guarantee-row-text">{!! $qc->text !!}</div>
                            </div>
                        @endforeach
                    @else
                        @foreach(($guaranteeItems ?? []) as $item)
                            <div class="guarantee-row">
                                @if(!empty($item['icon']))
                                    <img class="guarantee-row-icon" src="{{ asset('storage/'.$item['icon']) }}" alt="icon">
                                @endif
                                <div class="guarantee-row-text">{!! $item['text'] ?? '' !!}</div>
                            </div>
                        @endforeach
                    @endif
                </div>
                @if(!empty($guaranteeBadges))
                    <div class="guarantee-badges d-flex align-items-center gap-4 mt-4">
                        @foreach($guaranteeBadges as $badge)
                            <img src="{{ asset('storage/'.$badge['image']) }}" alt="badge" style="width:100%;object-fit:contain;">
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
    <style>
        .quality-guarantee .guarantee-text{font-weight:600}
    </style>
</section>
<!-- Quality Certification Section -->
<section class="quality-cta py-20">
    <div class="container text-center" data-aos="fade-up" data-aos-duration="700">

        @if(!empty($certTitle) || !empty($certificates) || !empty($certBadges))
        <div class="quality-cert mt-70 mb-50">
            @if(!empty($certTitle))
                <h2 class="quality-section-title">{{ strtoupper($certTitle) }}</h2>
            @endif
            @if(!empty($certificates))
                <div class="quality-cert-row d-flex justify-content-center gap-4 flex-wrap mb-4">
                    @foreach($certificates as $cert)
                        <img src="{{ asset('storage/'.$cert['image']) }}" alt="certificate" class="quality-cert-img">
                    @endforeach
                </div>
            @endif
            @if(!empty($certBadges))
                <div class="quality-cert-badges d-flex justify-content-center align-items-center gap-5 mt-40 flex-wrap">
                    @foreach($certBadges as $badge)
                        <img src="{{ asset('storage/'.$badge['image']) }}" alt="badge" class="quality-cert-badge">
                    @endforeach
                </div>
            @endif
        </div>
        @endif
    </div>
    <style>.quality-cta{background:#F6F6F6}</style>
</section>

<!-- Quality Steps Section -->
<section class="quality-steps py-5">
    <div class="container mb-70">
        <div class="d-flex justify-content-center" style="max-width: 800px; margin: 0 auto;">
            <h2 class="quality-section-title" data-aos="fade-up" data-aos-duration="700">{{ $stepsTitle }}</h2>
        </div>
        @if(!empty($stepsSubtitle))
            <div class="quality-steps-subtitle text-center mb-70" data-aos="fade-up" data-aos-duration="700" data-aos-delay="100">{!! $stepsSubtitle !!}</div>
        @endif

        @if(!empty($stepsImages))
            <div class="row g-4 mb-4">
                @foreach($stepsImages as $img)
                    <div class="col-md-4" data-aos="fade-up" data-aos-duration="700" data-aos-delay="{{ 50 + ($loop->index * 100) }}">
                        <div class="quality-step-image-wrap">
                            <img src="{{ asset('storage/'.$img['image']) }}" alt="step image" class="quality-step-image">
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    <style>
        .quality-steps{background:#F6F6F6;border:1px solid #eee;border-radius:10px}
        .quality-step-desc{font-weight:600,}
        .quality-step-image{width:100%;height:320px;object-fit:cover;border-radius:12px}
        .quality-steps-subtitle{max-width:900px;margin:0 auto;font-weight:600}
    </style>
</section>



