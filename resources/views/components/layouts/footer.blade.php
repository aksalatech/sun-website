@php
    $logoFooter = \App\Models\GlobalSetting::getContentBySlug('logo-footer');
    $siteTitle = \App\Models\GlobalSetting::getContentBySlug('site-title');
    $copyright = \App\Models\GlobalSetting::getContentBySlug('copyright');
    $menuItems = \App\Models\Menu::query()
        ->where('is_active', true)
        ->orderBy('order')
        ->get();

    $page = Z3d0X\FilamentFabricator\Models\Page::where('blocks', 'like', '%"type":"contact-us-page"%')->first();
    $blocks = $page ? ($page->blocks[0] ?? null) : null;
    $information = $blocks['data']['information'] ?? [];
@endphp

<footer class="footer">
  <div class="footer-cta">
    <div class="container">
      <div class="row d-flex align-items-center justify-content-between">
        <div class="col-md-3">
          <h3 class="cta-title mb-0">Write to us</h3>
        </div>
        <div class="col-md-6">
          <p class="cta-desc">Send us your question via the contact form, and we will respond to you as soon as we can. We are ready to help you 24/7</p>
        </div>
        <div class="col-md-3">
            <div class="d-flex justify-content-end">
                <a href="{{ url('/contact-us') }}" class="primary-btn">Contact</a>
            </div>
        </div>
      </div>
    </div>
  </div>

  <div class="footer-main">
    <div class="container">
      <div class="row footer-grid">
        <div class="col-md-4 col-sm-6">
          <h5 class="footer-company">PT SURYATAMA USAHA NUSANTARA</h5>
          <ul class="footer-contact">
            @foreach ($information as $i => $contact)
              @break($i >= 3)
              <li class="footer-contact-item">
                @if ($i === 0)
                  <svg class="icon" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C8.134 2 5 5.134 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.866-3.134-7-7-7Zm0 9.5a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5Z" fill="currentColor"/></svg>
                @elseif ($i === 1)
                  <svg class="icon" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.62 10.79a15.053 15.053 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.01-.24c1.12.37 2.33.57 3.58.57a1 1 0 0 1 1 1V21a1 1 0 0 1-1 1C11.4 22 2 12.6 2 1a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.2 2.46.57 3.58a1 1 0 0 1-.24 1.01l-2.21 2.2Z" fill="currentColor"/></svg>
                @else
                  <svg class="icon" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 4H4a2 2 0 0 0-2 2v.4l10 6 10-6V6a2 2 0 0 0-2-2Zm0 4.4-8 4.8-8-4.8V18a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8.4Z" fill="currentColor"/></svg>
                @endif
                <span>{{ $contact['text'] }}</span>
              </li>
            @endforeach
          </ul>
        </div>

        <div class="col-md-2 col-sm-6">
          <h5 class="footer-title">Products</h5>
          <ul class="footer-links">
            <li><a href="#" class="footer-link">Vegetables</a></li>
            <li><a href="#" class="footer-link">Fruits</a></li>
            <li><a href="#" class="footer-link">Mix</a></li>
          </ul>
        </div>

        <div class="col-md-2 col-sm-6">
          <h5 class="footer-title">Others</h5>
          <ul class="footer-links">
            <li><a href="{{ url('/career') }}" class="footer-link">Career</a></li>
            <li><a href="{{ url('/faq') }}" class="footer-link">FAQ</a></li>
            <li><a href="{{ url('/blogs') }}" class="footer-link">Blogs</a></li>
            <li><a href="{{ url('/contact-us') }}" class="footer-link">Contact us</a></li>
            <li><a href="{{ url('/about-us') }}" class="footer-link">About us</a></li>
          </ul>
        </div>

        <div class="col-md-4 col-sm-6">
          <h5 class="footer-title">Follow Us</h5>
          <p class="footer-follow-desc">Our company provides customers and consumers the best choice of healthy, tasty foods with the highest quality, most competitive price and outstanding services.</p>
          <div class="footer-social">
            <a href="#" aria-label="Facebook" class="social-link">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M22 12.06C22 6.51 17.52 2 12 2S2 6.51 2 12.06c0 5 3.66 9.15 8.44 9.94v-7.03H7.9v-2.91h2.54V9.41c0-2.5 1.49-3.89 3.77-3.89 1.09 0 2.23.2 2.23.2v2.46h-1.25c-1.23 0-1.61.76-1.61 1.54v1.85h2.74l-.44 2.91h-2.3v7.03C18.34 21.21 22 17.06 22 12.06Z" fill="currentColor"/></svg>
            </a>
            <a href="#" aria-label="TikTok" class="social-link">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M21 8.5c-2.1 0-3.9-.7-5.2-2V16a6 6 0 1 1-6-6c.3 0 .6 0 .9.1V12a3 3 0 1 0 3 3V2h2.2c.9 2 2.9 3.5 5.1 3.8V8.5Z" fill="currentColor"/></svg>
            </a>
            <a href="#" aria-label="Instagram" class="social-link">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7 2h10a5 5 0 0 1 5 5v10a5 5 0 0 1-5 5H7a5 5 0 0 1-5-5V7a5 5 0 0 1 5-5Zm5 5.5A4.5 4.5 0 1 0 16.5 12 4.5 4.5 0 0 0 12 7.5Zm6.25-.75a1 1 0 1 0 1 1 1 1 0 0 0-1-1Z" fill="currentColor"/></svg>
            </a>
            <a href="#" aria-label="LinkedIn" class="social-link">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.98 3.5a2.5 2.5 0 1 0 0 5.001 2.5 2.5 0 0 0 0-5Zm.02 6.5H2v10h3V10Zm4 0H6v10h3v-5.5c0-1.38 1.12-2.5 2.5-2.5S14 13.12 14 14.5V20h3v-6c0-2.76-2.24-5-5-5-1.1 0-2.1.36-2.9.97V10Z" fill="currentColor"/></svg>
            </a>
            <a href="#" aria-label="YouTube" class="social-link">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M23.5 7.1a3 3 0 0 0-2.1-2.1C19.6 4.5 12 4.5 12 4.5s-7.6 0-9.4.5A3 3 0 0 0 .5 7.1 31.4 31.4 0 0 0 0 12a31.4 31.4 0 0 0 .5 4.9 3 3 0 0 0 2.1 2.1c1.8.5 9.4.5 9.4.5s7.6 0 9.4-.5a3 3 0 0 0 2.1-2.1 31.4 31.4 0 0 0 .5-4.9 31.4 31.4 0 0 0-.5-4.9ZM9.75 15.02V8.98L15.5 12l-5.75 3.02Z" fill="currentColor"/></svg>
            </a>
          </div>
        </div>
      </div>
      <div class="copy-right text-left">
        <p>{{ $copyright }}</p>
      </div>
    </div>
  </div>
</footer>
