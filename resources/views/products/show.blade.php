@extends('layouts.start')

@section('content')
@php
    // Get contact information directly from database without loading page blocks
    $contactPage = Z3d0X\FilamentFabricator\Models\Page::where('slug', 'contact-us')->first();
    $contactBlocks = $contactPage ? ($contactPage->blocks[0] ?? null) : null;
    $information = $contactBlocks['data']['information'] ?? [];
    
    // Find phone number from contact information (look for phone/WhatsApp)
    $whatsappNumber = null;
    foreach ($information as $contact) {
        if (isset($contact['text'])) {
            $text = $contact['text'];
            // Look for phone number patterns (+62, 08, etc.)
            if (preg_match('/\+62[0-9\s\-]+/', $text, $matches) || 
                preg_match('/08[0-9\s\-]+/', $text, $matches)) {
                $whatsappNumber = $matches[0];
                break;
            }
        }
    }
    
    // Clean up the number - remove spaces and dashes, keep only digits and +
    if ($whatsappNumber) {
        $whatsappNumber = preg_replace('/[^0-9+]/', '', $whatsappNumber);
        // Ensure it starts with +62
        if (strpos($whatsappNumber, '+62') !== 0) {
            if (strpos($whatsappNumber, '62') === 0) {
                $whatsappNumber = '+' . $whatsappNumber;
            } elseif (strpos($whatsappNumber, '08') === 0) {
                $whatsappNumber = '+62' . substr($whatsappNumber, 1);
            }
        }
    }
    
    // Fallback to default if not found
    if (!$whatsappNumber) {
        $whatsappNumber = '+62-21-6543-5430';
    }
    
    // Set page to null to prevent contact page blocks from being rendered
    $page = null;
@endphp
<style>
/* WhatsApp Modal Styles */
#whatsappInquiryModal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1055;
    background-color: rgba(0,0,0,0.5);
}

#whatsappInquiryModal.show {
    display: block !important;
    opacity: 1 !important;
}

.modal-dialog {
    margin: 50px auto;
    max-width: 800px;
    position: relative;
    z-index: 1056;
}

.modal-content {
    background: white;
    border-radius: 8px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.3);
}

/* Form styling */
.form-label {
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.form-control {
    border: 1px solid #ced4da;
    border-radius: 0.375rem;
    padding: 0.5rem 0.75rem;
}

.form-control:focus {
    border-color: #86b7fe;
    box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
}

.btn-primary {
    background-color: #25D366;
    border-color: #25D366;
}

.btn-primary:hover {
    background-color: #128C7E;
    border-color: #128C7E;
}

/* Hide contact section on product pages */
.contact-section {
    display: none !important;
}
</style>
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
                                    <p>{!! $product->short_description !!}</p>
                                </div>
                            @endif

                            <button type="button" class="btn btn-detail send-inquiry" onclick="openWhatsAppModal()">
                                SEND INQUIRY
                            </button>

                            
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
                                        @if($product->product_details && is_array($product->product_details) && count($product->product_details) > 0)
                                            @foreach($product->product_details as $detail)
                                                @if(is_array($detail) && isset($detail['label']) && isset($detail['description']))
                                                <tr>
                                                    <td class="spec-label">{{ $detail['label'] }}</td>
                                                    <td class="spec-value">{!! $detail['description'] !!}</td>
                                                </tr>
                                                @endif
                                            @endforeach
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

<!-- WhatsApp Inquiry Modal -->
<div class="modal fade" id="whatsappInquiryModal" tabindex="-1" aria-labelledby="whatsappInquiryModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="whatsappInquiryModalLabel">Send Inquiry</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="whatsappInquiryForm">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="inquiryName" class="form-label">Name *</label>
                            <input type="text" class="form-control" id="inquiryName" name="name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="inquiryEmail" class="form-label">Email *</label>
                            <input type="email" class="form-control" id="inquiryEmail" name="email" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="inquiryPhone" class="form-label">Phone Number *</label>
                            <input type="tel" class="form-control" id="inquiryPhone" name="phone" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="inquiryCompany" class="form-label">Company (For Business Inquiries)</label>
                            <input type="text" class="form-control" id="inquiryCompany" name="company">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="inquiryMessage" class="form-label">How can we help you *</label>
                        <textarea class="form-control mb-3" id="inquiryMessage" name="message" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product Inquiry</label>
                        <div class="form-control-plaintext">
                            <strong>{{ $product->name }}</strong><br>
                            <small class="text-muted">{{ url()->current() }}</small>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="sendWhatsAppInquiry">Send</button>
            </div>
        </div>
    </div>
</div>

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

// WhatsApp Inquiry functionality
function openWhatsAppModal() {
    const modal = document.getElementById('whatsappInquiryModal');
    
    if (!modal) {
        alert('Modal not found. Please refresh the page and try again.');
        return;
    }
    
    // Show the modal
    modal.style.display = 'block';
    modal.style.opacity = '1';
    modal.classList.add('show');
    document.body.style.overflow = 'hidden';
    
    // Add backdrop manually
    let backdrop = document.getElementById('modalBackdrop');
    if (!backdrop) {
        backdrop = document.createElement('div');
        backdrop.id = 'modalBackdrop';
        backdrop.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            z-index: 1040;
        `;
        backdrop.onclick = closeWhatsAppModal;
        document.body.appendChild(backdrop);
    }
}

function closeWhatsAppModal() {
    const modal = document.getElementById('whatsappInquiryModal');
    if (modal) {
        modal.style.display = 'none';
        modal.classList.remove('show');
        document.body.style.overflow = '';
        
        // Remove backdrop
        const backdrop = document.getElementById('modalBackdrop');
        if (backdrop) {
            backdrop.remove();
        }
    }
}

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded, initializing WhatsApp modal...');
    
    // Initialize form submission
    const whatsappButton = document.getElementById('sendWhatsAppInquiry');
    const form = document.getElementById('whatsappInquiryForm');
    
    if (whatsappButton && form) {
        whatsappButton.addEventListener('click', function(e) {
            e.preventDefault();
            console.log('WhatsApp button clicked');
            
            // Get form data
            const formData = new FormData(form);
            const name = formData.get('name');
            const email = formData.get('email');
            const phone = formData.get('phone');
            const company = formData.get('company');
            const message = formData.get('message');
            
            // Validate required fields
            if (!name || !email || !phone || !message) {
                alert('Please fill in all required fields.');
                return;
            }
            
            // Format the WhatsApp message
            const productName = '{{ $product->name }}';
            const productUrl = '{{ url()->current() }}';
            
            const whatsappMessage = `Welcome to SUNFROZEN, supplying Frozen Goodness for Every Table.

Name : ${name}
Email : ${email}
Phone Number : ${phone}
Company (For Business Inquiries) : ${company || 'N/A'}
How can we help you : ${message}
Inquiries : ${productUrl}`;
            
            // WhatsApp number from contact information
            const whatsappNumber = '{{ $whatsappNumber }}';
            
            // Encode the message for URL
            const encodedMessage = encodeURIComponent(whatsappMessage);
            
            // Create WhatsApp URL
            const whatsappUrl = `https://wa.me/${whatsappNumber.replace(/[^0-9]/g, '')}?text=${encodedMessage}`;
            
            // Open WhatsApp
            window.open(whatsappUrl, '_blank');
            
            // Close modal
            closeWhatsAppModal();
        });
    }
    
    // Initialize modal close functionality
    const modal = document.getElementById('whatsappInquiryModal');
    if (modal) {
        console.log('Modal found for close functionality');
        
        // Close on backdrop click
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeWhatsAppModal();
            }
        });
        
        // Close on close button click
        const closeButtons = modal.querySelectorAll('[data-bs-dismiss="modal"], .btn-close');
        closeButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                closeWhatsAppModal();
            });
        });
    }
    
    // Test if modal can be opened
    console.log('Testing modal open...');
    const testButton = document.querySelector('.send-inquiry');
    if (testButton) {
        console.log('Send inquiry button found:', testButton);
    } else {
        console.error('Send inquiry button not found!');
    }
});
</script>
@endsection