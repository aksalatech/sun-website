@php
    $page = (object)[
        'title' => $blog->title,
        'meta_description' => $blog->meta_description,
        'meta_keywords' => $blog->meta_keywords,
    ];

    $latestBlogs = \App\Models\Blog::query()
    ->where('is_active', 1)
    ->latest()
    ->limit(5)
    ->get();
@endphp
@extends('components.filament-fabricator.layouts.default', ['page' => $page])

    <div class="container mt-150 mb-50">
        <div class="row detail-blogs">
            <div class="col-md-9 col-sm-12">
                <img src="{{ asset('storage/' . $blog->thumbnail) }}" class="img-fluid post-thumb" alt="Blog Thumbnail">
                <h2 class="text-2xl font-bold mb-30 mt-30">{{ $blog->title }}</h2>
                <p class="mt-30 mb-50" style="color: #000">{{ $blog->desc }}</p>
                <div class="blog-content">
                    {!! $blog->content !!}
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                <h5 class="mb-3 pb-10">Latest Blog</h5>
                <ul class="list-unstyled latest-blog-list">
                    @foreach ($latestBlogs as $latest)
                      <li class="d-flex align-items-start gap-2 mb-3">
                          <img src="{{ asset('storage/' . $latest->thumbnail) }}" class="latest-thumb" alt="Thumb">
                          <a
                              href="{{ route('pages.blog.detail', ['slug' => $latest->slug]) }}"
                              class="latest-title text-decoration-none" >
                              {{ $latest->title }}
                          </a>
                      </li>
                    @endforeach
                </ul>
            </div>
        </div>
        
    </div>
