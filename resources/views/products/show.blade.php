@extends('layouts.start')

@section('content')
<section class="product-detail-page">
    <div class="container">
        <div class="row">
            <!-- Product Images -->
             <div class="col-lg-9 mb-4" data-aos="fade-left">
                <div class="row">
                    <div class="col-lg-5 mb-4" data-aos="fade-right">
                        <div class="product-images">
                            @if($product->images->count() > 0)
                                <!-- Main Image -->
                                <div class="main-image mb-3">
                                    @php
                                        $primaryImage = $product->images->where('is_primary', true)->first();
                                        $firstImage = $primaryImage ?? $product->images->first();
                                    @endphp
                                    <img src="{{ asset('storage/' . $firstImage->image_path) }}" 
                                        alt="{{ $firstImage->alt_text ?? $product->name }}"
                                        class="img-fluid rounded" id="mainImage">
                                </div>

                                <!-- Thumbnail Images -->
                                @if($product->images->count() > 1)
                                    <div class="thumbnail-images">
                                        <div class="row">
                                            @foreach($product->images as $image)
                                                <div class="col-3 mb-2">
                                                    <img src="{{ asset('storage/' . $image->image_path) }}" 
                                                        alt="{{ $image->alt_text ?? $product->name }}"
                                                        class="img-fluid rounded thumbnail-img {{ $image->id === $firstImage->id ? 'active' : '' }}"
                                                        onclick="changeMainImage('{{ asset('storage/' . $image->image_path) }}', this)">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            @else
                                <div class="main-image mb-3">
                                    <img src="{{ asset('images/placeholder-product.jpg') }}" 
                                        alt="{{ $product->name }}"
                                        class="img-fluid rounded">
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Product Info -->
                    <div class="col-lg-7 mb-4" data-aos="fade-left">
                        <div class="product-info">
                            <!-- Category -->
                            <div class="product-category mb-3">
                                {{ strtoupper($product->category ?? 'OTHER') }}
                            </div>

                            <!-- Product Name -->
                            <h1 class="product-title mb-4">
                                {{ $product->name }}
                            </h1>

                            <!-- Short Description -->
                            @if($product->short_description)
                                <div class="product-description mb-4">
                                    <p>{{ $product->short_description }}</p>
                                </div>
                            @endif

                            <a href="#" class="btn btn-detail send-inquiry">
                                SEND INQUIRY
                            </a>

                            
                        </div>
                    </div>

                     <div class="col-lg-12 mb-4" data-aos="fade-up">
                         <!-- Product Detail Table -->
                         <div class="product-detail-table-container">
                             <div class="product-detail-header">
                                 <h2>Product Detail</h2>
                             </div>
                             <div class="specification-title">
                                 <h3>Specification</h3>
                             </div>
                             <div class="product-detail-table">
                                 <table class="specification-table">
                                     <tbody>
                                         @if($product->detail_name)
                                         <tr>
                                             <td class="spec-label">Name</td>
                                             <td class="spec-value">{{ $product->detail_name }}</td>
                                         </tr>
                                         @endif

                                         @if($product->detail_desc)
                                         <tr>
                                             <td class="spec-label">Description</td>
                                             <td class="spec-value">{!! $product->detail_desc !!}</td>
                                         </tr>
                                         @endif

                                         @if($product->detail_size && is_array($product->detail_size) && count($product->detail_size) > 0)
                                         <tr>
                                             <td class="spec-label">Cut form and Size</td>
                                             <td class="spec-value">
                                                 @foreach($product->detail_size as $size)
                                                     @if(is_array($size) && isset($size['label']) && isset($size['value']))
                                                         <strong>{{ $size['label'] }}:</strong> {{ $size['value'] }}@if(!$loop->last)<br>@endif
                                                     @else
                                                         {{ is_string($size) ? $size : '' }}@if(!$loop->last)<br>@endif
                                                     @endif
                                                 @endforeach
                                             </td>
                                         </tr>
                                         @endif

                                         @if($product->detail_packing && is_array($product->detail_packing) && count($product->detail_packing) > 0)
                                         <tr>
                                             <td class="spec-label">Packing</td>
                                             <td class="spec-value">
                                                 @foreach($product->detail_packing as $packing)
                                                     @if(is_array($packing) && isset($packing['label']) && isset($packing['value']))
                                                         <strong>{{ $packing['label'] }}:</strong> {{ $packing['value'] }}@if(!$loop->last)<br>@endif
                                                     @else
                                                         {{ is_string($packing) ? $packing : '' }}@if(!$loop->last)<br>@endif
                                                     @endif
                                                 @endforeach
                                             </td>
                                         </tr>
                                         @endif

                                         @if($product->detail_certificate && is_array($product->detail_certificate) && count($product->detail_certificate) > 0)
                                         <tr>
                                             <td class="spec-label">Certificates</td>
                                             <td class="spec-value">
                                                 @foreach($product->detail_certificate as $certificate)
                                                     @if(is_array($certificate) && isset($certificate['label']) && isset($certificate['value']))
                                                         <strong>{{ $certificate['label'] }}:</strong> {{ $certificate['value'] }}@if(!$loop->last)<br>@endif
                                                     @else
                                                         {{ is_string($certificate) ? $certificate : '' }}@if(!$loop->last)<br>@endif
                                                     @endif
                                                 @endforeach
                                             </td>
                                         </tr>
                                         @endif
                                     </tbody>
                                 </table>
                             </div>
                         </div>
                     </div>
                </div>
             </div>

            <div class="col-lg-3 mb-4" data-aos="fade-right">
                <!-- Random Products List -->
                <div class="random-products-sidebar">
                    <h4 class="product-detail-header sidebar-title">Other Products</h4>
                    <div class="random-products-list">
                        @php
                            $randomProducts = \App\Models\Product::with('images')
                                ->where('id', '!=', $product->id)
                                ->inRandomOrder()
                                ->limit(4)
                                ->get();
                        @endphp
                        
                        @foreach($randomProducts as $randomProduct)
                            <div class="random-product-item">
                                <a href="{{ route('products.show', $randomProduct) }}" class="product-link">
                                    <div class="product-image">
                                        @if($randomProduct->images->count() > 0)
                                            @php
                                                $primaryImage = $randomProduct->images->where('is_primary', true)->first();
                                                $firstImage = $primaryImage ?? $randomProduct->images->first();
                                            @endphp
                                            <img src="{{ asset('storage/' . $firstImage->image_path) }}" 
                                                 alt="{{ $firstImage->alt_text ?? $randomProduct->name }}"
                                                 class="img-fluid">
                                        @else
                                            <img src="{{ asset('images/placeholder-product.jpg') }}" 
                                                 alt="{{ $randomProduct->name }}"
                                                 class="img-fluid">
                                        @endif
                                    </div>
                                    <div class="product-info">
                                        <h5 class="product-name">{{ $randomProduct->name }}</h5>
                                        <p class="product-category">{{ strtoupper($randomProduct->category ?? 'OTHER') }}</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>

<script>
function changeMainImage(imageSrc, element) {
    // Update main image
    document.getElementById('mainImage').src = imageSrc;
    
    // Update active thumbnail
    document.querySelectorAll('.thumbnail-img').forEach(img => {
        img.classList.remove('active');
    });
    element.classList.add('active');
}
</script>
@endsection