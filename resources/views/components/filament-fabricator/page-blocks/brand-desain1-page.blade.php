@aware(['page'])
<section class="brandPage">
    <div class="fluid-container">
        @foreach ($brandSection as $brand)
            @php
                $gradientColors = collect($brand['backgroundColors'] ?? [])->pluck('bgColor')->join(', ');
            @endphp
            <div class="row d-flex align-items-center justify-content-center" style="background: linear-gradient(to right, {{ $gradientColors }}); {{ ($brand['reverseRow'] ?? true) ? 'flex-direction: row-reverse;' : '' }}">
                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 col-brand-img text-center" data-aos="zoom-in-up" data-aos-duration="800">
                    <div>
                        <h1 class="brandTitle" style="color: {{ $brand['titleColor'] }};">{{ $brand['brandTitle'] }}</h1>
                        <h1 class="brandSubtitle" style="color: {{ $brand['subtitleColor'] }};">{{ $brand['brandSubtitle'] }}</h1>
                    </div>
                    <a href="{{ url(request()->path() . $brand['url']) }}">
                        <img src="{{ asset('storage/'.$brand['brandImage']) }}" alt="Brand Product">
                    </a>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12" data-aos="fade-left" data-aos-duration="800">
                    <img src="{{ asset('storage/'.$brand['brandBackground']) }}" alt="Brand Product">
                </div>
            </div>
        @endforeach
    </div>
</section>
