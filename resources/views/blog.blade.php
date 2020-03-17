@extends('layouts.main')

@section('title', 'Блог пользователей')


@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bs-text">
                        <h2>Советы / рецепты / FAQ</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 left-blog-pad">
                    <div class="large-blog set-bg" data-setbg="img/blog/blog-1.jpg">
                        <div class="bi-tag">Soccer</div>
                        <div class="bi-text">
                            <h3><a href="./blog-details.html">England Women 1-0 Argentina Women: Taylor guarantees Lionesses' path to last
                                    16</a></h3>
                            <ul>
                                <li><i class="fa fa-calendar"></i> May 19, 2019</li>
                                <li><i class="fa fa-edit"></i> 3 Comment</li>
                            </ul>
                        </div>
                    </div>
                    <div class="blog-items">
                        <div class="single-item">
                            <div class="bi-pic">
                                <img src="img/blog/blog-2.jpg" alt="">
                            </div>
                            <div class="bi-text">
                                <h4><a href="./blog-details.html">Jodie Taylor celebrates her first goal of the tournament</a></h4>
                                <ul>
                                    <li><i class="fa fa-calendar"></i> May 19, 2019</li>
                                    <li><i class="fa fa-edit"></i> 3 Comment</li>
                                </ul>
                                <p>It’s that time again when people start thinking about their New Years Resolutions.
                                    Usually they involve, losing weight, quitting smoking, and joining a gym, just to
                                    mention a few.</p>
                            </div>
                        </div>
                        <div class="single-item">
                            <div class="bi-pic">
                                <img src="img/blog/blog-3.jpg" alt="">
                            </div>
                            <div class="bi-text">
                                <h4><a href="./blog-details.html">Vanina Correa keeps out Nikita Parris' first-half penalty</a></h4>
                                <ul>
                                    <li><i class="fa fa-calendar"></i> May 19, 2019</li>
                                    <li><i class="fa fa-edit"></i> 3 Comment</li>
                                </ul>
                                <p>It’s that time again when people start thinking about their New Years Resolutions.
                                    Usually they involve, losing weight, quitting smoking, and joining a gym, just to
                                    mention a few.</p>
                            </div>
                        </div>
                        <div class="single-item">
                            <div class="bi-pic">
                                <img src="img/blog/blog-4.jpg" alt="">
                            </div>
                            <div class="bi-text">
                                <h4><a href="./blog-details.html">Derby will demand £4m for Lampard next year</a></h4>
                                <ul>
                                    <li><i class="fa fa-calendar"></i> May 19, 2019</li>
                                    <li><i class="fa fa-edit"></i> 3 Comment</li>
                                </ul>
                                <p>It’s that time again when people start thinking about their New Years Resolutions.
                                    Usually they involve, losing weight, quitting smoking, and joining a gym, just to
                                    mention a few.</p>
                            </div>
                        </div>
                        <div class="single-item">
                            <div class="bi-pic">
                                <img src="img/blog/blog-5.jpg" alt="">
                            </div>
                            <div class="bi-text">
                                <h4><a href="./blog-details.html">Virgil van Dijk says Liverpool are hungry for more success</a></h4>
                                <ul>
                                    <li><i class="fa fa-calendar"></i> May 19, 2019</li>
                                    <li><i class="fa fa-edit"></i> 3 Comment</li>
                                </ul>
                                <p>It’s that time again when people start thinking about their New Years Resolutions.
                                    Usually they involve, losing weight, quitting smoking, and joining a gym, just to
                                    mention a few.</p>
                            </div>
                        </div>
                    </div>
                    <div class="more-blog">
                        <a href="#">Загрузить еще</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-sidebar">
                        <div class="bs-categories">
                            <div class="section-title sidebar-title">
                                <h5>Разделы</h5>
                            </div>
                            <ul>
                                @foreach($categories as $category)
                                    <li class="item-category" data-id="{{$category->id}}"><a style="cursor: pointer;">{{$category->title}}</a></li>
                                @endforeach
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
                                <h5>Рекомендации</h5>
                            </div>
                            <div class="news-item">
                                <div class="ni-pic">
                                    <img src="img/news/ln-1.jpg" alt="">
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
                                    <img src="img/news/ln-2.jpg" alt="">
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
                                    <img src="img/news/ln-3.jpg" alt="">
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
                                    <img src="img/news/ln-4.jpg" alt="">
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
                                <h5>Теги</h5>
                            </div>
                            <div class="tags">
                                @foreach($tags as $tag)
                                <a class="tag-item" data-id="{{$tag->id}}" style="cursor: pointer;">{{$tag->title}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
    <style>
        .active-tag {
            border: 3px solid #000;
        }
    </style>
@endsection