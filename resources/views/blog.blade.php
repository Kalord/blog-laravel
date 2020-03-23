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
                <div class="blog-items">

                </div>
                <div class="more-blog" style="cursor: pointer;">
                    <a>Загрузить еще</a>
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
                            <li class="item-category" data-id="{{$category->id}}">
                                <a style="cursor: pointer;">{{$category->title}}</a>
                            </li>
                            @endforeach
                            <li class="reset-category"><a style="cursor: pointer;">Сбросить поисковой фильтр</a></li>
                        </ul>

                    </div>
                    <div class="follow-links">

                    </div>
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
