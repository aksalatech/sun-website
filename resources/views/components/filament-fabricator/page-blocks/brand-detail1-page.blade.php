@aware(['page'])
<section class="brandPage">
    <div class="fluid-container">
        @foreach ($productSection as $product)
            @php
                $gradientColors = collect($product['backgroundColors'] ?? [])->pluck('bgColor')->join(', ');
            @endphp
            <div class="row d-flex align-items-center justify-content-center section-detail-brand-1 curve" style="background: linear-gradient(to right, {{ $gradientColors }});">
                <div class="col-lg-5 col-sm-12 col-xs-12 first-col-detail-brand-1" data-aos="zoom-in-down" data-aos-duration="800">
                    <div>
                        <h1 class="brand-detail-title" style="color: {{ $product['textColor'] }};">{{ $product['productTitle'] }}</h1>
                        <div class="brand-detail-paragraph" style="color: {{ $product['textColor'] }}; !important">
                            {!! $product['productDesc'] !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-duration="800">
                    <img src="{{ asset('storage/'.$product['productImage']) }}" alt="{{ $product['productTitle'] }}">
                </div>
            </div>
        @endforeach
    </div>
</section>
