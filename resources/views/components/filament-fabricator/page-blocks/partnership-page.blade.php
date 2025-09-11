@aware(['page'])

<!-- Hero -->
<section class="partner-hero">
    @if(!empty($heroBackground))
        <img src="{{ asset('storage/'.$heroBackground) }}" alt="hero" class="partner-hero-bg">
    @endif
</section>

<!-- Why Frozen -->
<section class="partner-why">
    <div class="container">
        <h2 class="quality-section-title">{{ $whyTitle }}</h2>
        <div class="text-center partner-why-subtitle mb-4" data-aos="fade-up" data-aos-duration="700">{!! $whySubtitle !!}</div>
        <div class="why-grid mt-70">
            @foreach(($whyItems ?? []) as $item)
                <div class="why-card" data-aos="fade-up" data-aos-duration="700" data-aos-delay="{{ 50 + ($loop->index * 100) }}">
                    @if(!empty($item['icon']))
                        <div class="why-icon-wrap">
                            <img src="{{ asset('storage/'.$item['icon']) }}" alt="icon" class="why-icon">
                        </div>
                    @endif
                    <div style="font-weight:800; line-height:1.3;">{{ $item['title'] }}</div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Production Process -->
<section class="partner-process">
    <div class="container">
        <h2 class="quality-section-title">{{ $processTitle }}</h2>
        <div class="text-center partner-process-subtitle mb-4">{!! $processSubtitle !!}</div>
        <div class="row g-3" style="max-width: 800px; margin: 0 auto;">
            @foreach(($processSteps ?? []) as $s)
                <div class="col-md-6" data-aos="fade-up" data-aos-duration="700">
                    <div class="partner-step d-flex align-items-center gap-3">
                        <div class="partner-step-badge">{{ $s['step'] }}</div>
                        <div class="partner-step-text">{{ $s['text'] }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Stats -->
<section class="partner-stats">
    <div class="container">
        <div class="row text-center g-4">
            @foreach(($stats ?? []) as $stat)
                <div class="col-6 col-md-3" data-aos="fade-up" data-aos-duration="700">
                    <div class="partner-stat-value">{{ $stat['value'] }}</div>
                    <div class="partner-stat-label">{{ $stat['label'] }}</div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Partnership Form -->
<section class="partner-form">
    <div class="container" style="max-width: 800px;">
        <h2 class="quality-section-title">{{ $formTitle }}</h2>
        <div class="partner-form-subtitle text-center mb-4">{!! $formSubtitle !!}</div>
        <form method="POST" action="{{ route('partnership.inquiries.store') }}" class="partner-form-grid">
            @csrf
            <input type="hidden" name="category" value="Partnership Inquiry">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="partner-form-label">Name*</label>
                    <input class="form-control" name="name" placeholder="Enter your name" required>
                </div>
                <div class="col-md-6">
                    <label class="partner-form-label">Email*</label>
                    <input class="form-control" name="email" type="email" placeholder="Enter your email" required>
                </div>
                <div class="col-md-6">
                    <label class="partner-form-label">Company (For Business Inquiries)</label>
                    <input class="form-control" name="company" placeholder="Company name">
                </div>
                <div class="col-md-6">
                    <label class="partner-form-label">Phone Number</label>
                    <input class="form-control" name="phone" placeholder="Phone number">
                </div>
                <div class="col-md-12">
                    <label class="partner-form-label">How can we help you?</label>
                    <input class="form-control" name="subject" placeholder="Type your subject">
                </div>
                <div class="col-md-12">
                    <label class="partner-form-label">Inquiries*</label>
                    <textarea class="form-control" name="message" rows="5" placeholder="Describe your inquiry" required></textarea>
                </div>
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="secondary-btn w-100">Submit</button>
            </div>
        </form>
    </div>
</section>

<style>
    .partner-hero{position:relative}
    .partner-hero-bg{width:100%;height:100vh;object-fit:cover}
    .partner-hero-tint{position:absolute;inset:0;background:linear-gradient(180deg, rgba(0,0,0,.4), rgba(0,0,0,.2))}
    .partner-hero-content{position:absolute;inset:0;display:flex;align-items:center;justify-content:flex-start}
    .partner-hero-title{color:#fff;font-weight:800;max-width:500px}
    .partner-hero-card{position:absolute;right:10%;top:10%;width:220px}

    .partner-why{background: #f5f5f5;padding:150px 0}
    .partner-why-card{display:none}

    .partner-process{padding-bottom:150px; background: #f5f5f5;}
    .partner-process-subtitle{max-width:800px;margin:0 auto;font-weight:600}
    .partner-step{background:#fff;border:1px solid #eee;border-radius:10px;padding:12px 16px}
    .partner-step-badge{color:#000;border-radius:8px;width:36px;height:36px;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:24px;}
    .partner-stat-value{font-weight:800;font-size:32px; color:#000;}
    .partner-stat-label{font-size:12px;font-weight:800; color:#000;}
    .partner-stats{background:#F2BF13;padding:50px 0}
    .partner-form{padding:100px 0 150px 0;background:#f5f5f5;}
    .form-control, .enter-email input[type="text"]{background-color:#fff !important; border-radius:5px !important;}
    .partner-form-label{font-weight:800;font-size:14px; color:#000;}
</style>


