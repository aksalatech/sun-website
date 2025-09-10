@php
    $logoFooter = \App\Models\GlobalSetting::getContentBySlug('logo-footer');
    $siteTitle = \App\Models\GlobalSetting::getContentBySlug('site-title');
    $copyright = \App\Models\GlobalSetting::getContentBySlug('copyright');
    $menuItems = \App\Models\Menu::query()
        ->where('is_active', true)
        ->orderBy('order')
        ->get();

   $page = Z3d0X\FilamentFabricator\Models\Page::where('blocks', 'like', '%"type":"contact-us-page"%')->firstOrFail();
   $blocks = $page->blocks[0];
   // var_dump($blocks);

   if($blocks){
      $information = $blocks['data']['information'] ?? [];
   }

    
@endphp
<footer class="th-bg">
  <div class="container">
      <div class="row d-flex align-items-center justify-content-center">
         <div class="col-md-4 col-sm-6">
            <!--Widget Navigation Start-->
            <div class="widget widget-about">
                  <div class="logo-footer">
                        <img src="{{ asset('storage/' . $logoFooter) }}" alt="" />
                  </div>
            </div>
            
            <!--Widget Navigation End-->
         </div>
         <div class="col-md-4 col-sm-6">
            <!--Widget Navigation Start-->
            <div class="widget widget_nav_menu d-flex justify-content-center">
               <ul class="list-footer-page">
                  @foreach ($menuItems as $item)
                        <li><a class="footer-page" href="{{ $item['path'] }}">{{ $item['title'] }}</a></li>
                  @endforeach
               </ul>
            </div>
            <!--Widget Navigation End-->
         </div>
         <div class="col-md-4 col-sm-6">
               <!--Widget Navigation Start-->
               <h5 class="title-contact-list">{{ $siteTitle }}</h5>
               <ul class="contact-list">
                  @foreach ($information as $contact)
                     <li>
                        {{ $contact['text'] }}
                     </li>
                  @endforeach
               </ul>
               <!--Widget Navigation End-->
         </div>
      </div>
      <div class="copy-right ">
            <p>{{ $copyright }}</p>
      </div>
  </div>
</footer>
