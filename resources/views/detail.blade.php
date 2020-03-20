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
                            <a href="#">Multipopuse</a>
                            <a href="#">Design</a>
                            <a href="#">Ideas</a>
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
                        <div class="bs-categories">
                            <div class="section-title sidebar-title">
                                <h5>Categories</h5>
                            </div>
                            <ul>
                                <li><a href="#">Fool Ball</a></li>
                                <li><a href="#">Soccer</a></li>
                                <li><a href="#">basketball</a></li>
                                <li><a href="#">Volleyball</a></li>
                                <li><a href="#">E-Sport</a></li>
                            </ul>
                        </div>
                        <div class="follow-links">
                            <div class="section-title sidebar-title">
                                <h5>Follow</h5>
                            </div>
                            <ul>
                                <li class="facebook">
                                    <i class="fa fa-facebook"></i>
                                    <div class="fl-name">Facebook</div>
                                    <span class="fl-fan">2.530 Fans</span>
                                </li>
                                <li class="twitter">
                                    <i class="fa fa-twitter"></i>
                                    <div class="fl-name">Twitter</div>
                                    <span class="fl-fan">2.046 Fans</span>
                                </li>
                                <li class="google">
                                    <i class="fa fa-google"></i>
                                    <div class="fl-name">Google</div>
                                    <span class="fl-fan">1.170 Fans</span>
                                </li>
                            </ul>
                        </div>
                        <div class="bs-recent">
                            <div class="section-title sidebar-title">
                                <h5>Recent Post</h5>
                            </div>
                            <div class="news-item">
                                <div class="ni-pic">
                                    <img src="/img/news/ln-1.jpg" alt="">
                                </div>
                                <div class="ni-text">
                                    <h5><a href="#">How To Quit Smoking Using Zyban</a></h5>
                                    <ul>
                                        <li><i class="fa fa-calendar"></i> May 19, 2019</li>
                                        <li><i class="fa fa-edit"></i> 3 Comment</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="news-item">
                                <div class="ni-pic">
                                    <img src="/img/news/ln-2.jpg" alt="">
                                </div>
                                <div class="ni-text">
                                    <h5><a href="#">Decorate For Less With Art Posters</a></h5>
                                    <ul>
                                        <li><i class="fa fa-calendar"></i> May 19, 2019</li>
                                        <li><i class="fa fa-edit"></i> 3 Comment</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="news-item">
                                <div class="ni-pic">
                                    <img src="/img/news/ln-3.jpg" alt="">
                                </div>
                                <div class="ni-text">
                                    <h5><a href="#">Home Business Advertising Ideas</a></h5>
                                    <ul>
                                        <li><i class="fa fa-calendar"></i> May 19, 2019</li>
                                        <li><i class="fa fa-edit"></i> 3 Comment</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="news-item">
                                <div class="ni-pic">
                                    <img src="/img/news/ln-4.jpg" alt="">
                                </div>
                                <div class="ni-text">
                                    <h5><a href="#">Lasik Doesn T Stop Your Eyes From Aging</a></h5>
                                    <ul>
                                        <li><i class="fa fa-calendar"></i> May 19, 2019</li>
                                        <li><i class="fa fa-edit"></i> 3 Comment</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="bs-popular-tag">
                            <div class="section-title sidebar-title">
                                <h5>Popular Tag</h5>
                            </div>
                            <div class="tags">
                                <a href="#">Seagame</a>
                                <a href="#">Fifa</a>
                                <a href="#">World Cup 2019</a>
                                <a href="#">Championship</a>
                                <a href="#">2019</a>
                                <a href="#">Qatar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->
@endsection
