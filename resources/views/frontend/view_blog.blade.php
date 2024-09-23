@extends('frontend.layout')

@section('main')

    <!--post-single-->
    <section class="post-single">
        <div class="container-fluid ">
            <div class="row ">
                <div class="col-lg-12">
                    <!--post-single-image-->
                        <div class="post-single-image text-center">
                            <img src="{{ asset('uploads/blogs').'/'.$blog->image }}" alt="">
                        </div>

                        <div class="post-single-body">
                            <!--post-single-title-->
                            <div class="post-single-title">
                                <h2> Brand is just a perception, and perception will match reality over time</h2>
                                <ul class="entry-meta">
                                    <li class="post-author-img"><img src="{{ $blog->author_id == 0 ? asset('uploads/profile.jpg'):asset('uploads/authors/').'/'.$author->image }}" alt=""></li>
                                    <li class="post-author"> <a href="{{ route('single.author.blogs',$blog->author_id) }}">{{ $blog->author_id == 0 ? 'Admin':$author->name }}</a></li>
                                    <li class="entry-cat"> <a href="blog-layout-1.html" class="category-style-1 "> <span class="line"></span>{{ $subcategory[$blog->subcategory_id] }}</a></li>
                                    <li class="post-date"> <span class="line"></span>{{ $blog->created_at->diffForHumans() }}</li>
                                </ul>

                            </div>

                            <!--post-single-content-->
                            <div class="post-single-content">
                                {!! nl2br($blog->description) !!}
                            </div>

                            <!--post-single-bottom-->
                            <div class="post-single-bottom">
                                <div class="tags">
                                    <p>Tags:</p>
                                    <ul class="list-inline">
                                        @foreach ($tag_id as $id)
                                        <li >
                                            <a href="">{{ $tags_name[$id] }}</a>
                                        </li>
                                        @endforeach

                                    </ul>
                                </div>
                                <div class="social-media">
                                    <p>Share on :</p>
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
                                        <li>
                                            <a href="#" >
                                                <i class="fab fa-pinterest"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!--post-single-author-->
                            <div class="post-single-author ">
                                <div class="authors-info">
                                    <div class="image">
                                        <a href="author.html" class="image">
                                            <img src="assets/img/author/1.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h4>{{ $blog->author_id == 0 ? 'Admin':$author->name }}</h4>
                                        <p> Etiam vitae dapibus rhoncus. Eget etiam aenean nisi montes felis pretium donec veni. Pede vidi condimentum et aenean hendrerit.
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
                                                <li>
                                                    <a href="#" >
                                                        <i class="fab fa-pinterest"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!--post-single-comments-->
                            <div class="post-single-comments">
                                <!--Comments-->
                                <h4 >{{ $total_comments }} Comments</h4>
                                <ul class="comments">
                                    <!--comment1-->
                                    @forelse ($comments as $comment)
                                    <li class="comment-item pt-0">
                                        <img src="{{ $comment->author_id == 0 ? asset('uploads/profile.jpg') : asset('uploads/authors').'/'.$comment->rel_to_author->image}}">
                                        <div class="content">
                                            <div class="meta">
                                                <ul class="list-inline">
                                                    <li><a href="#">{{ $comment->author_id == 0 ? 'Admin comment' : $comment->rel_to_author->name }}</a> </li>
                                                    <li class="slash"></li>
                                                    <li>{{ $comment->created_at->diffForHumans() }}</li>
                                                </ul>
                                            </div>
                                            <p>{{ $comment->comment }}</p>
                                        </div>

                                    </li>
                                    @empty

                                    <li class="comment-item pt-0">

                                        <div class="content">
                                            <h3 class="text-center">No Comments on this blog.</h3>
                                        </div>

                                    </li>
                                    @endforelse

                                </ul>
                                <div class="mb-3">
                                    {{ $comments->links() }}
                                </div>
                                <!--Leave-comments-->
                                <div class="comments-form">
                                    <h4 >Leave a Comment</h4>
                                    <!--form-->
                                    <form class="form " action="{{ route('comment') }}" method="POST" id="main_contact_form">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                                    <textarea name="comment" id="message" cols="30" rows="5" class="form-control" placeholder="Your comment here*" required="required"></textarea>
                                                </div>
                                                @error('comment')
                                                    <strong class="text-warning">{{ $message }}</strong>
                                                @enderror
                                            </div>

                                            <div class="col-lg-12">
                                                <button type="submit" class="btn-custom">Send Comment</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!--/-->
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>



@endsection
