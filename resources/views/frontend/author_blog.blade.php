@extends('frontend.layout')

@section('main')

<!--author-->
<section class="authors">
    <div class="container-fluid">
        <div class="row">
            <!--author-image-->
            <div class="col-lg-12 col-md-12 ">
                    <div class="authors-info">
                    <div class="image">
                        <a href="author.html" class="image">
                            @if ($author == null)
                                <img src="{{ asset('uploads/profile.jpg') }}" alt="">
                            @else
                                <img src="{{ asset('uploads/authors').'/'.$author->image }}" alt="">
                            @endif
                        </a>
                    </div>
                    <div class="content">
                        <h4 >
                            @if ($author == null)
                                Admin
                            @else
                                {{ $author->name }}
                            @endif
                        </h4>
                        <p>
                             Etiam vitae dapibus rhoncus. Eget etiam aenean nisi montes felis pretium donec veni. Pede vidi condimentum et aenean hendrerit.
                            Quis sem justo nisi varius.
                        </p>
                        <div class="social-media">
                            <ul class="list-inline">
                                <li>
                                    <a href="#">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" >
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <!--/-->
            </div>
        </div>
    </div>
</section>

<!-- blog-author-->
<section class="blog-author mt-30">
    <div class="container-fluid">
        <div class="row">
            <!--content-->
            <div class="col-lg-8 oredoo-content">
                <div class="theiaStickySidebar">
                    <!--post1-->
                    @forelse ($blogs as $blog)
                    <div class="post-list post-list-style4 pt-0">
                        <div class="post-list-image">
                            <a href="{{ route('blog.view', $blog->id) }}">
                                <img src="{{ asset('uploads/blogs'.'/'.$blog->image) }}" alt="">
                            </a>
                        </div>
                        <div class="post-list-content">
                            <ul class="entry-meta">
                                <li class="entry-cat">
                                    <a href="blog-layout-1.html" class="category-style-1">{{ $blog->rel_to_subcategory->subcategory_id }}</a>
                                </li>
                                <li class="post-date"> <span class="line"></span>{{ $blog->created_at->diffForHumans() }}</li>
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
                    <div class="post-list post-list-style4 pt-0">
                        <h3>No Blogs found!</h3>
                    </div>
                    @endforelse

                    <!--pagination-->
                    <div class="pagination">
                        <div class="pagination-area text-left">
                            <div class="pagination-list">
                                <ul class="list-inline">
                                    <li><a href="#" ><i class="las la-arrow-left"></i></a></li>
                                    <li><a href="#" class="active">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#" ><i class="las la-arrow-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/-->

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
                                <form action="https://oredoo.assiagroupe.net/Oredoo/search.html">
                                    <input type="search" id="gsearch" name="gsearch" placeholder="Search ....">
                                    <a href="search.html" class="btn-submit"><i class="las la-search"></i></a>
                                </form>
                            </div>
                         </div>

                        <!--categories-->
                        <div class="widget ">
                            <div class="widget-title">
                                <h5>Sub Categories</h5>
                            </div>
                            <div class="widget-categories">
                                @foreach ($subcategories as $subcategory)
                                <a class="category-item" href="#">
                                    <p>{{ $subcategory->subcategory_name }}</p>
                                </a>
                                @endforeach

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
                                    <div class="item color-facebook">
                                        <a href="#"><i class="fab fa-facebook"></i></a>
                                        <p>Facebook</p>
                                    </div>

                                    <div class="item color-instagram">
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                        <p>instagram</p>
                                    </div>

                                    <div class="item color-twitter">
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <p>twitter</p>
                                    </div>

                                    <div class="item color-youtube">
                                        <a href="#"><i class="fab fa-youtube"></i></a>
                                        <p>Youtube</p>
                                    </div>
                                </div>
                            </div>
                        </div>


                         <!--Tags-->
                         <div class="widget">
                             <div class="widget-title">
                                 <h5>Tags</h5>
                             </div>
                             <div class="tags">
                                <ul class="list-inline">
                                    @foreach ($tags as $tag)
                                    <li>
                                        <a href="#">{{ $tag->tag }}</a>
                                    </li>
                                    @endforeach

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
