@extends('layouts.main')

@section('title', 'Блог пользователей')

@section('content')
    <!-- Blog Details Hero Section Begin -->
    <section class="blog-hero-section set-bg" data-setbg="{{$post->cover}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bh-text">
                        <h2>{{$post->title}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero Section End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 left-blog-pad">
                    <div class="bd-text">
                        {!! $post->content !!}
                        <div class="bd-tags">
                            @foreach($tags as $tag)
                                <a>{{$tag->title}}</a>
                            @endforeach
                        </div>
                        <div class="comment-option">
                            <h4>2 Comments</h4>
                            <div class="single-comment-item first-comment">
                                <div class="sc-author">
                                    <img src="/img/blog/details/comment/comment-1.jpg" alt="">
                                </div>
                                <div class="sc-text">
                                    <span>May 28,2019</span>
                                    <h5>Brandon Kelley</h5>
                                    <p>Vasse Felix chief executive, Paul Holmes a Court said no plans have yet been made
                                        for the buildings on the property.</p>
                                    <a href="#" class="comment-btn like-btn">Like</a>
                                    <a href="#" class="comment-btn">Reply</a>
                                </div>
                            </div>
                            <div class="single-comment-item reply-comment">
                                <div class="sc-author">
                                    <img src="/img/blog/details/comment/comment-2.jpg" alt="">
                                </div>
                                <div class="sc-text">
                                    <span>27 Aug 2019</span>
                                    <h5>Brandon Kelley</h5>
                                    <p>Vasse Felix chief executive, Paul Holmes a Court said no plans have yet been made
                                        for the buildings on the property.</p>
                                    <a href="#" class="comment-btn like-btn">Like</a>
                                    <a href="#" class="comment-btn">Reply</a>
                                </div>
                            </div>
                            <div class="single-comment-item second-comment ">
                                <div class="sc-author">
                                    <img src="/img/blog/details/comment/comment-3.jpg" alt="">
                                </div>
                                <div class="sc-text">
                                    <span>27 Aug 2019</span>
                                    <h5>Brandon Kelley</h5>
                                    <p>Vasse Felix chief executive, Paul Holmes a Court said no plans have yet been made
                                        for the buildings on the property.</p>
                                    <a href="#" class="comment-btn like-btn">Like</a>
                                    <a href="#" class="comment-btn">Reply</a>
                                </div>
                            </div>
                        </div>
                        <div class="comment-form">
                            <h4>Leave A Comment</h4>
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Name">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Email">
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea placeholder="Comment"></textarea>
                                        <button type="submit">Post Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-sidebar">
                        <div class="bs-recent">
                            <div class="section-title sidebar-title">
                                <h5>Рекомендации</h5>
                            </div>
                            @foreach($recommendation as $post)
                                <div class="news-item">
                                    <div class="ni-pic">
                                        <img src="{{$post->cover}}" alt="" style="width: 250px; height: 150px">
                                    </div>
                                    <div class="ni-text">
                                        <h5><a href="/blog/detail/{{$post->id}}">{{$post->title}}</a></h5>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->
@endsection
