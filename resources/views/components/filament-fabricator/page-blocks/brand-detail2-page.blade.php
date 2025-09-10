@aware(['page'])
<section class="brandPage">
    <div class="fluid-container">
        @foreach ($productSection as $product)
            @php
                $gradientColors = collect($product['backgroundColors'] ?? [])->pluck('bgColor')->join(', ');
            @endphp
            <div class="row d-flex align-items-center justify-content-center section-detail-brand-2 curve" style="background: linear-gradient(to right, {{ $gradientColors }});">
                <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1000">
                    <div class="text-center col-brand-desain-2">
                        <h1 class="brand-detail-title2" style="color: {{ $product['titleColor'] }};">{{ $product['productTitle'] }}</h1>
                        <h2 class="brand-detail-subtitle2" style="color: {{ $product['subtitleColor'] }};">{{ $product['productSubtitle'] }}</h2>
                            {!! $product['productDesc'] !!}
                    </div>
                </div>
                <div class="col-lg-6 text-center" data-aos="fade-down" data-aos-duration="1000">
                    <img src="{{ asset('storage/'.$product['productImage']) }}" alt="{{ $product['productTitle'] }}">
                </div>
                @if (!empty($product['bottomText']))
                    <div class="teks-on-bottom-brand">
                        <marquee>
                            <h2>
                                {{ $product['bottomText'] }}
                            </h2>
                        </marquee>
                    </div>
                @endif
                
            </div>
        @endforeach
    </div>
</section>
