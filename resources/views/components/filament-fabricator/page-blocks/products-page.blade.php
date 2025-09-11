@aware(['page'])
@php
    $products = $products ?? collect();
    $categories = $categories ?? [];
    $showCategoryFilter = $show_category_filter ?? true;
    $showSortDropdown = $show_sort_dropdown ?? true;
    $sortOrder = $sort_order ?? 'desc';
    $title = $title ?? 'Our Products';
    $subtitle = $subtitle ?? 'Discover our high-quality products';
@endphp

<section class="career-header products-header position-relative text-white text-center">
    @if (!empty($headerImage))
        <img src="{{ asset('storage/' . $headerImage) }}" alt="Header Background" class="career-bg-img"
            data-aos="fade-down">
    @endif

    <div class="title">
        <h1 data-aos="fade-up">{!! $productHeaderTitle !!}</h1>
    </div>
</section>

<section class="products-page">
    <div class="container">
        <!-- Section Header -->
        <div class="text-center mb-5" data-aos="fade-up" data-aos-duration="700">
            <h2 class="section-title">{{ $title }}</h2>
             <!-- Category Filter -->
            @if($showCategoryFilter && count($categories) > 0)
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
        </div>

       

        <!-- Sort Dropdown -->
        @if($showSortDropdown)
            <div class="sort-filter mb-4 text-right" data-aos="fade-up" data-aos-duration="850"">
                <div class="sort-wrapper text-center" style="max-width: 300px; margin-left: auto;">
                    <!-- <label for="sort-select" class="sort-label">Sort by:</label> -->
                    <select id="sort-select" class="sort-select">
                        <option value="desc" {{ $sortOrder === 'desc' ? 'selected' : '' }}>Name (Z-A)</option>
                        <option value="asc" {{ $sortOrder === 'asc' ? 'selected' : '' }}>Name (A-Z)</option>
                    </select>
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
                                <div class="product-list-image">
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
                @if(isset($products->links))
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
</section>

<style>
.products-page {
    padding: 60px 0;
    background-color: #f8f9fa;
}

.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 1rem;
}

.section-subtitle {
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
    width: 100%;
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

.sort-filter {
    margin-bottom: 2rem;
}

.sort-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

.sort-label {
    font-weight: 600;
    color: #2c3e50;
    margin: 0;
    font-size: 1rem;
}

.sort-select {
    padding: 10px 15px;
    border: 2px solid #e9ecef;
    background: white;
    color: #2c3e50;
    border-radius: 25px;
    font-weight: 600;
    font-size: 0.9rem;
    cursor: pointer;
    transition: all 0.3s ease;
    min-width: 150px;
}

.sort-select:focus {
    outline: none;
    border-color: #ffc107;
    box-shadow: 0 0 0 3px rgba(255, 193, 7, 0.1);
}

.sort-select:hover {
    border-color: #ffc107;
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

.product-list-image {
    position: relative;
    width: 100%;
    height: 250px;
    /* overflow: hidden; */
    background: #f8f9fa;
}

.product-list-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.product-card:hover .product-list-image img {
    transform: scale(1.05);
}

.product-list-info {
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
    font-weight: 400;
    letter-spacing: 1px;
    margin-bottom: 8px;
    text-align: center;
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

/* Responsive Design */
@media (max-width: 768px) {
    .section-title {
        font-size: 2rem;
    }
    
    .filter-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .filter-btn {
        width: 200px;
    }
    
    .sort-wrapper {
        flex-direction: column;
        gap: 8px;
    }
    
    .sort-select {
        width: 200px;
    }
    
    .product-list-image {
        height: 150px;
    }
    
    .product-name {
        font-size: 1rem;
        min-height: 2.4rem;
    }
}

@media (max-width: 576px) {
    .products-page {
        padding: 40px 0;
    }
    
    .section-title {
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
    const sortSelect = document.getElementById('sort-select');

    // Category filtering functionality
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

    // Sorting functionality
    if (sortSelect) {
        sortSelect.addEventListener('change', function() {
            const sortOrder = this.value;
            const productsContainer = document.querySelector('.products-grid .row');
            const visibleProducts = Array.from(productItems).filter(item => !item.classList.contains('hidden'));
            
            // Sort visible products
            visibleProducts.sort((a, b) => {
                const nameA = a.querySelector('.product-name').textContent.trim().toLowerCase();
                const nameB = b.querySelector('.product-name').textContent.trim().toLowerCase();
                
                if (sortOrder === 'asc') {
                    return nameA.localeCompare(nameB);
                } else {
                    return nameB.localeCompare(nameA);
                }
            });
            
            // Re-append sorted products to maintain order
            visibleProducts.forEach(product => {
                productsContainer.appendChild(product);
            });
        });
    }
});
</script>
