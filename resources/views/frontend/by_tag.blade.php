@extends('frontend.layout')
@section('main')

<!--section-heading-->
<div class="section-heading " >
    <div class="container-fluid">
        <div class="section-heading-2">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading-2-title">
                        <h1>{{ $tag->tag }}</h1>
                        <p class="links"><a href="{{ route('front.dashboard') }}">Home <i class="las la-angle-right"></i></a> Tags <i class="las la-angle-right"></i> {{ $tag->tag }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog Layout-2-->
<section class="blog-layout-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!--post 1-->
                @forelse ($blogs as $blog)
                <div class="post-list post-list-style2">
                    <div class="post-list-image">
                        <a href="{{ route('blog.view',$blog->id) }}">
                            <img src="{{ asset('uploads/blogs/').'/'.$blog->image }}" alt="">
                        </a>
                    </div>
                    <div class="post-list-content">
                        <h3 class="entry-title">
                            <a href="{{ route('blog.view', $blog->id) }}">{{ $blog->title }}</a>
                        </h3>
                        <ul class="entry-meta">
                            {{-- <li class="post-author-img"><img src="{{ asset('uploads/authors/').'/'.$blog->rel_to_author->image }}" alt=""></li> --}}
                            <li class="post-author"> <a href="{{ route('single.author.blogs', $blog->author_id) }}">{{ $blog->author_id == 0 ? 'Admin':$blog->rel_to_author->name }}</a></li>
                            <li class="entry-cat"> <a href="#" class="category-style-1 "> <span class="line"></span> {{ $blog->rel_to_subcategory->subcategory_name }}</a></li>
                            <li class="post-date"> <span class="line"></span> {{ $blog->created_at->diffForHumans() }}</li>
                        </ul>
                        <div class="post-btn">
                            <a href="{{ route('blog.view', $blog->id) }}" class="btn-read-more">Continue Reading <i class="las la-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="p-2 m-3">
                    <h3 class="text-center">No Post Found!</h3>
                </div>
                @endforelse

            </div>
        </div>
    </div>
</section>

@endsection
