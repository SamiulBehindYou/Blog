@extends('frontend.layout')

@section('main')

    <!-- blog-slider-->
    <section class="blog blog-home4 d-flex align-items-center justify-content-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-carousel">
                        <!--post1-->
                        @forelse ($sliders as $slider)
                        <div class="blog-item" style="background-image: url('{{ asset('uploads/blogs/').'/'.$slider->image }}')">
                            <div class="blog-banner">
                                <div class="post-overly">
                                    <div class="post-overly-content">
                                        <div class="entry-cat">
                                            <a href="blog-layout-1.html" class="category-style-2">{{ $slider->rel_to_subcategory->subcategory_name }}</a>
                                        </div>
                                        <h2 class="entry-title">
                                            <a href="post-single.html">{{ $slider->title }}</a>
                                        </h2>
                                        <ul class="entry-meta">
                                            <li class="post-author">
                                                <a href="{{ route('single.author.blogs', $slider->author_id) }}">
                                                    @if ($slider->author_id == 0)
                                                        Admin
                                                    @else
                                                        {{ $slider->rel_to_author->name }}
                                                    @endif
                                                </a>
                                            </li>
                                            <li class="post-date"> <span class="line"></span>{{ $slider->created_at->diffForHumans() }}</li>
                                            <li class="post-timeread"> <span class="line"></span> {{ $slider->read_time }} mins read</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty

                        @endforelse


                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- top categories-->
    <div class="categories">
        <div class="container-fluid">
            <div class="categories-area">
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="categories-items">
                            @foreach ($categories as $category)
                                <a class="category-item" href="#">
                                    <div class="image">
                                        <img src="{{ asset('uploads/categories').'/'.$category->category_image }}" alt="">
                                    </div>
                                    <p>{{ $category->category_name }} <span>10</span> </p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent articles-->
    <section class="section-feature-1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 oredoo-content">
                    <div class="theiaStickySidebar">
                        <div class="section-title">
                            <h3>Recent Articles </h3>
                            <p>Discover the most outstanding articles in all topics of life.</p>
                        </div>
                        @forelse ($blogs as $blog)
                        <!--post1-->
                        <div class="post-list post-list-style4">
                            <div class="post-list-image">
                                <a href="{{ route('blog.view',$blog->id) }}">
                                    <img src="{{ asset('uploads/blogs/').'/'.$blog->image }}" alt="">
                                </a>
                            </div>
                            <div class="post-list-content">
                                <ul class="entry-meta">
                                    <li class="entry-cat">
                                        <a href="{{ route('by.subcategory', $blog->subcategory_id) }}" class="category-style-1">{{ $blog->rel_to_subcategory->subcategory_name }}</a>
                                    </li>
                                    <li class="post-date"> <span class="line"></span> {{ $blog->created_at->diffForHumans() }}</li>
                                </ul>
                                <h5 class="entry-title">
                                    <a href="{{ route('blog.view', $blog->id) }}">{{ $blog->title }}</a>
                                </h5>

                                <div class="post-btn">
                                    <a href="{{ route('blog.view', $blog->id) }}" class="btn-read-more">Continue Reading <i class="las la-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>

                        @empty

                        @endforelse




                        <!--pagination-->
                        @if ($blogs->hasPages())
                                {{ $blogs->links('vendor.pagination.custom') }}
                        @endif
                    </div>
                </div>

                <!--Sidebar-->
                <div class="col-lg-4 oredoo-sidebar">
                    <div class="theiaStickySidebar">
                        <div class="sidebar">
                            <!--search-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h5>Search</h5>
                                </div>
                                <div class=" widget-search">
                                    <form action="{{ route('search') }}" method="GET">
                                        <input type="search" id="gsearch" name="keyword" placeholder="Search ....">
                                        <button type="submit" class="btn-submit"><i class="las la-search"></i></button>
                                    </form>
                                </div>
                            </div>

                            <!--popular-posts-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h5>popular Posts</h5>
                                </div>

                                <ul class="widget-popular-posts">
                                    @foreach ($populers as $sl=>$populer)
                                    <li class="small-post">
                                        <div class="small-post-image">
                                            <a href="{{ route('blog.view',$blog->id) }}">
                                                <img src="{{ asset('uploads/blogs').'/'.$populer->image }}" alt="">
                                                <small class="nb">{{ $sl+1 }}</small>
                                            </a>
                                        </div>
                                        <div class="small-post-content">
                                            <p>
                                                <a href="{{ route('blog.view',$blog->id) }}">{{ $populer->title }}</a>
                                            </p>
                                            <small> <span class="slash"></span>{{ $populer->created_at->diffForHumans() }}</small>
                                        </div>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>

                            <!--newslatter-->
                            <div class="widget widget-newsletter">
                                <h5>Subscribe To Our Newsletter</h5>
                                <p>No spam, notifications only about new products, updates.</p>
                                <form action="{{ route('subscrib') }}" class="newslettre-form" method="POST">
                                    @csrf
                                    <div class="form-flex">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Your Email Adress" name="email" required="required">
                                        </div>
                                        @error('email')
                                            <strong class="text-warning">{{ $message }}</strong>
                                        @enderror
                                        <button class="btn-custom" type="submit">Subscribe now</button>
                                    </div>
                                </form>
                            </div>

                            <!--stay connected-->
                            <div class="widget ">
                                <div class="widget-title">
                                    <h5>Stay connected</h5>
                                </div>

                                <div class="widget-stay-connected">
                                    <div class="list">
                                        @php
                                        $setting = App\Models\Setting::find(1);
                                        @endphp
                                        @if($setting->facebook_status == 1)
                                            <div class="item color-facebook">
                                                <a href="{{ $setting->facebook }}"><i class="fab fa-facebook"></i></a>
                                                <p>Facebook</p>
                                            </div>
                                        @endif
                                        @if($setting->instagram_status == 1)
                                            <div class="item color-instagram">
                                                <a href="{{ $setting->insagram }}"><i class="fab fa-instagram"></i></a>
                                                <p>instagram</p>
                                            </div>
                                        @endif
                                        @if($setting->twiter_status == 1)
                                            <div class="item color-twitter">
                                                <a href="{{ $setting->twiter }}"><i class="fab fa-twitter"></i></a>
                                                <p>twitter</p>
                                            </div>
                                        @endif
                                        @if($setting->youtube_status == 1)
                                            <div class="item color-youtube">
                                                <a href="{{ $setting->youtube }}"><i class="fab fa-youtube"></i></a>
                                                <p>Youtube</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <!--Tags-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h5>Tags</h5>
                                </div>
                                <div class="widget-tags">
                                    <ul class="list-inline">
                                        @forelse ($tags as $tag)
                                        <li>
                                            <a href="{{ route('by.tag', $tag->id) }}">{{ $tag->tag }}</a>
                                        </li>
                                        @empty
                                        <li>
                                            <p>No Tags found</p>
                                        </li>
                                        @endforelse

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/-->
            </div>
        </div>
    </section>

@endsection
