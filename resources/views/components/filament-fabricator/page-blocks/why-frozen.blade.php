@aware(['page'])
<section class="why-frozen-section" style="background:var(--light-color); padding:60px 0;">
    <style>
      .why-grid { display: grid; grid-template-columns: repeat(1, 1fr); gap: 20px; align-items: stretch; }
      @media (min-width: 576px) { .why-grid { grid-template-columns: repeat(3, 1fr); } }
      @media (min-width: 768px) { .why-grid { grid-template-columns: repeat(5, 1fr); } }
    </style>
    <div class="container">
        <div class="text-center" style="max-width:980px; margin:0 auto 30px;">
            <h2 style="font-family: 'Montserrat', sans-serif; font-weight:800;" class="text-dark">{{ $title }}</h2>
            @if(!empty($subtitle))
            <p style="margin-top:10px; font-weight:600;">{{ $subtitle }}</p>
            @endif
        </div>

        <div class="why-grid">
            @foreach(($reasons ?? []) as $reason)
                <div class="why-card" style="background:#fff; border-radius:16px; padding:30px 20px; text-align:center; height:100%;">
                    @if(!empty($reason['icon']))
                        <div style="margin-bottom:20px;">
                            <img src="{{ asset('storage/'.$reason['icon']) }}" alt="icon" style="width:90px; height:90px; object-fit:contain;">
                        </div>
                    @endif
                    <div style="font-weight:800; line-height:1.3;">{{ $reason['title'] }}</div>
                    @if(!empty($reason['description']))
                        <div style="margin-top:8px; font-weight:600;">{!! $reason['description'] !!}</div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>


