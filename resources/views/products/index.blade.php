@extends('layouts.start')

@section('content')
<div class="products-index-page">
    <div class="container">
        <!-- Page Header -->
        <div class="text-center mb-5" data-aos="fade-up" data-aos-duration="700">
            <h1 class="page-title">Our Products</h1>
            <p class="page-subtitle">Discover our high-quality products</p>
        </div>

        <!-- Category Filter -->
        @if($categories->count() > 0)
            <div class="category-filter mb-4" data-aos="fade-up" data-aos-duration="800">
                <div class="filter-buttons text-center">
                    <button class="filter-btn active" data-category="all">
                        All Products
                    </button>
                    @foreach($categories as $category)
                        <button class="filter-btn" data-category="{{ $category }}">
                            {{ ucfirst($category) }}
                        </button>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Products Grid -->
        <div class="products-grid" data-aos="fade-up" data-aos-duration="900">
            @if($products->count() > 0)
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4 product-item" 
                             data-category="{{ $product->category }}">
                            <div class="product-card">
                                <!-- Product Image -->
                                <div class="product-image">
                                    @if($product->images->count() > 0)
                                        @php
                                            $primaryImage = $product->images->where('is_primary', true)->first();
                                            $firstImage = $primaryImage ?? $product->images->first();
                                        @endphp
                                        <img src="{{ asset('storage/' . $firstImage->image_path) }}" 
                                             alt="{{ $firstImage->alt_text ?? $product->name }}"
                                             class="img-fluid">
                                    @else
                                        <img src="{{ asset('images/placeholder-product.jpg') }}" 
                                             alt="{{ $product->name }}"
                                             class="img-fluid">
                                    @endif
                                </div>

                                <!-- Product Info -->
                                <div class="product-info">
                                    <!-- Category -->
                                    <div class="product-category">
                                        {{ strtoupper($product->category ?? 'OTHER') }}
                                    </div>

                                    <!-- Product Name -->
                                    <h3 class="product-name">
                                        {{ strtoupper($product->name) }}
                                    </h3>

                                    <!-- Detail Button -->
                                    <a href="{{ route('products.show', $product->slug) }}" 
                                       class="btn btn-detail">
                                        DETAIL
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                @if(method_exists($products, 'links'))
                    <div class="pagination-wrapper mt-5" data-aos="fade-up" data-aos-duration="1000">
                        {{ $products->links() }}
                    </div>
                @endif
            @else
                <div class="text-center py-5">
                    <p class="text-muted">No products found.</p>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
.products-index-page {
    padding: 60px 0;
    background-color: #f8f9fa;
}

.page-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 1rem;
}

.page-subtitle {
    font-size: 1.1rem;
    color: #6c757d;
    margin-bottom: 0;
}

.category-filter {
    margin-bottom: 2rem;
}

.filter-buttons {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 10px;
}

.filter-btn {
    padding: 10px 20px;
    border: 2px solid #e9ecef;
    background: white;
    color: #6c757d;
    border-radius: 25px;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    cursor: pointer;
}

.filter-btn:hover,
.filter-btn.active {
    background: #ffc107;
    border-color: #ffc107;
    color: #000;
}

.products-grid .row {
    margin: 0 -15px;
}

.product-item {
    padding: 0 15px;
    margin-bottom: 30px;
}

.product-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.product-image {
    position: relative;
    width: 100%;
    height: 200px;
    overflow: hidden;
    background: #f8f9fa;
}

.product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.product-card:hover .product-image img {
    transform: scale(1.05);
}

.product-info {
    padding: 20px;
    text-align: center;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.product-category {
    font-size: 0.8rem;
    color: #adb5bd;
    font-weight: 600;
    letter-spacing: 1px;
    margin-bottom: 8px;
}

.product-name {
    font-size: 1.1rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 15px;
    line-height: 1.3;
    min-height: 2.6rem;
    display: flex;
    align-items: center;
    justify-content: center;
}

.btn-detail {
    background: #ffc107;
    color: #000;
    padding: 10px 25px;
    border-radius: 25px;
    font-weight: 700;
    text-transform: uppercase;
    font-size: 0.9rem;
    text-decoration: none;
    display: inline-block;
    transition: all 0.3s ease;
    border: 2px solid #ffc107;
}

.btn-detail:hover {
    background: transparent;
    color: #ffc107;
    text-decoration: none;
}

/* Responsive Design */
@media (max-width: 768px) {
    .page-title {
        font-size: 2rem;
    }
    
    .filter-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .filter-btn {
        width: 200px;
    }
    
    .product-image {
        height: 150px;
    }
    
    .product-name {
        font-size: 1rem;
        min-height: 2.4rem;
    }
}

@media (max-width: 576px) {
    .products-index-page {
        padding: 40px 0;
    }
    
    .page-title {
        font-size: 1.8rem;
    }
    
    .product-info {
        padding: 15px;
    }
    
    .btn-detail {
        padding: 8px 20px;
        font-size: 0.8rem;
    }
}

/* Animation for filtering */
.product-item {
    transition: all 0.3s ease;
}

.product-item.hidden {
    opacity: 0;
    transform: scale(0.8);
    pointer-events: none;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const productItems = document.querySelectorAll('.product-item');

    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const category = this.getAttribute('data-category');
            
            // Update active button
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Filter products
            productItems.forEach(item => {
                const itemCategory = item.getAttribute('data-category');
                
                if (category === 'all' || itemCategory === category) {
                    item.classList.remove('hidden');
                } else {
                    item.classList.add('hidden');
                }
            });
        });
    });
});
</script>
@endsection
