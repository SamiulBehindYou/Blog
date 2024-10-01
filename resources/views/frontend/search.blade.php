@extends('frontend.layout')
@section('main')

    <!--section-heading-->
    <div class="section-heading " >
        <div class="container-fluid">
            <div class="section-heading-2">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-heading-2-title text-left">
                            <h2>Search resultats for : {{ $keyword }}</h2>
                            <p class="desc">{{ $blogs->count() }} Articles were found for keyword  <strong> {{ $keyword }}</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


   <!--blog-layout-1-->
    <div class="blog-search">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 oredoo-content">
                    <div class="theiaStickySidebar">
                     <!--Post1-->
                     @forelse ($blogs as $blog)
                     <div class="post-list post-list-style1 pt-0">
                         <div class="post-list-image">
                            <a href="{{ route('blog.view',$blog->id) }}">
                                <img src="{{ asset('uploads/blogs/').'/'.$blog->image }}" alt="">
                            </a>
                         </div>
                         <div class="post-list-title">
                             <div class="entry-title">
                                 <h5>
                                    <a href="{{ route('blog.view', $blog->id) }}">{{ $blog->title }}</a>
                                 </h5>
                             </div>
                         </div>
                         <div class="post-list-category">
                             <div class="entry-cat">
                                 <a href="{{ route('by.subcategory', $blog->subcategory_id) }}" class="category-style-1">{{ $blog->rel_to_subcategory->subcategory_name }}</a>
                             </div>
                         </div>
                     </div>

                     @empty
                     <div class="row">
                        <div class="col-lg-12 m-auto">
                            <h1>No post found on this search!</h1>
                        </div>
                     </div>
                     @endforelse

                    <!--pagination-->
                    {{-- {{ $blogs->links('vendor.pagination.custom') }} --}}
                    <!--/-->
                    </div>
                </div>

                 <!--sidebar-->
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

                           <!--categories-->
                           <div class="widget ">
                            <div class="widget-title">
                                <h5>Categories</h5>
                            </div>
                            <div class="widget-categories">
                                @forelse ($subcategories as $subcategory)
                                <a class="category-item" href="{{ route('by.subcategory', $subcategory->id) }}">
                                    <p>{{ $subcategory->subcategory_name }}</p>
                                </a>
                                @empty

                                @endforelse


                            </div>
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

                            <!--popular-posts-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h5>popular Posts</h5>
                                </div>

                                <ul class="widget-popular-posts">
                                    @foreach ($populers as $sl=>$populer)
                                    <li class="small-post">
                                        <div class="small-post-image">
                                            <a href="{{ route }}">
                                                <img src="{{ asset('uploads/blogs').'/'.$populer->image }}" alt="">
                                                <small class="nb">{{ $sl+1 }}</small>
                                            </a>
                                        </div>
                                        <div class="small-post-content">
                                            <p>
                                                <a href="post-single.html">{{ $populer->title }}</a>
                                            </p>
                                            <small> <span class="slash"></span>{{ $populer->created_at->diffForHumans() }}</small>
                                        </div>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>


                            <!--Ads-->
                            <div class="widget">
                                <div class="widget-ads">
                                    <img src="assets/img/ads/ads2.jpg" alt="">
                                </div>
                            </div>
                            <!--/-->
                        </div>
                   </div>
                </div>
                <!--/-->
            </div>
        </div>
    </div>


@endsection
