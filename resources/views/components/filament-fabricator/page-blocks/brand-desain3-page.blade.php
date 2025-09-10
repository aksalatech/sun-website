@aware(['page'])
@foreach ($images as $item)
<section class="brand-desain-3-section p-0">
    <a href="{{ url(request()->path() . $item['url']) }}">
        <img src="{{ Storage::url($item['image']) }}" alt="{{ $item['title'] }}" srcset="">
    </a>
</section>
@endforeach
