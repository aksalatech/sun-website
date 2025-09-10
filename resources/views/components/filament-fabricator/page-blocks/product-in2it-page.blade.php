@aware(['page'])
@php
    $mainProductBenefits = array_column($productBenefits, 'item');
    $total = count($mainProductBenefits);
    $half = ceil($total / 2); // round up to make left longer if odd count
    $mainProductLeft = array_slice($mainProductBenefits, 0, $half);
    $mainProductRight = array_slice($mainProductBenefits, $half);
    $minPadding = 150;
    $maxPadding = 250;
@endphp

<div class="product-in2it">
    <div class="product-in2it-banner" data-aos="fade-up" data-aos-duration="700">
        <img src="{{ asset('storage/' . $banner) }}" alt="In2it Banner" srcset="">
    </div>
    <div class="product-in2it-primer">
        <div class="container hidden-xs">
            <div class="product-in2it-primer-list" data-aos="fade-up" data-aos-duration="800"
                style="background-image: url({{ asset('storage/' . $productBackground) }})">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6 text-group" data-aos="fade-right" data-aos-duration="800">
                        @foreach ($mainProductLeft as $index => $item)
                            @php
                                $padRight =
                                    $index === 0 || $index === count($mainProductLeft) - 1 ? $minPadding : $maxPadding;
                            @endphp
                            <div class="text"
                                style="margin-left: -{{ $padRight }}px; padding-left: {{ $maxPadding }}px;">
                                {{ $item }}</div>
                        @endforeach
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 text-group" data-aos="fade-left" data-aos-duration="800">
                        @foreach ($mainProductRight as $index => $item)
                            @php
                                $padLeft =
                                    $index === 0 || $index === count($mainProductRight) - 1 ? $minPadding : $maxPadding;
                            @endphp
                            <div class="text"
                                style="margin-left: {{ $padLeft }}px; padding-right: {{ $maxPadding }}px;">
                                {{ $item }}</div>
                        @endforeach
                    </div>
                </div>
            </div>
            <h2 class="product-in2it-primer-title" data-aos="fade-right" data-aos-duration="800">
                {{ $productTitle }}
            </h2>
        </div>
        <div class="container visible-xs"
            style="background-image: url({{ asset('storage/' . $productBackground) }})">
                <div class="row">
                    <div class="col-12">
                        <h2 class="product-in2it-primer-title mb-50" data-aos="fade-right" data-aos-duration="800">
                            {{ $productTitle }}
                        </h2>
                    </div>
                    <div class="col-xs-6">
                    </div>
                    <div class="col-xs-6">
                        @foreach ($mainProductBenefits as $item)
                            <div class="mb-20 text-center fs-10px">{{ $item }}</div>
                        @endforeach
                    </div>
                </div>
        </div>
    </div>
    @foreach ($productList as $item)
        @if ($item['isBanner'] == 'yes')
            <div class="product-in2it-banner" data-aos="fade-right" data-aos-duration="1000">
                <img src="{{ asset('storage/' . $item['banner']) }}" alt="{{ $item['description'] }}" srcset="">
            </div>
        @else
            <div class="product-in2it-lip" data-aos="fade-up" data-aos-duration="1000">
                <div class="container">
                    <div class="row align-items-center {{ $item['rowReverse'] ? 'row-reverse' : '' }}">
                        <div class="col-md-6">
                            <div class="title" data-aos="fade-right">{!! $item['title'] !!}</div>
                            <div class="description" data-aos="fade-right" data-aos-duration="1500">
                                {{ $item['description'] }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset('storage/' . $item['image']) }}" alt="In2it Lip" srcset="">
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div>
