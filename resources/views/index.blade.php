@extends('layouts.main')

@section('title', 'Got')


@section('content')
    <!-- Hero Section Begin -->
    <section class="hero-section set-bg" data-setbg="img/hero/hero-1.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hs-item">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="hs-text">
                                        <a href="#" class="primary-btn">Перекус прямо сейчас</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Trending News Section Begin -->
    <div class="trending-news-section">
        <div class="container">
            <div class="tn-title"><i class="fa fa-caret-right"></i> Новости</div>
            <div class="news-slider owl-carousel">
                <div class="nt-item">Vinyl Banners With Its Different Types Kinds And Applications</div>
                <div class="nt-item">Banners With Its Different Types Kinds And Applications</div>
            </div>
        </div>
    </div>
    <!-- Trending News Section End -->

    <!-- Match Section Begin -->
    <section class="match-section set-bg" data-setbg="img/match/match-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ms-content">
                        <h4>Выбираем рацион</h4>
                        <form class="recipe-form">
                        <select class="input-group" name="sex">
                            <option value="1">Мужчина</option>
                            <option value="2">Женщина</option>
                        </select>
                        <input placeholder="Ваш вес" class="input-group" name="weight">
                        <input placeholder="Ваш рост" class="input-group" name="height">
                        <select class="input-group" name="lifestyle">
                            <option value="1">Активный образ жизни</option>
                            <option value="2">Умеренная активность</option>
                            <option value="3">Сидячий образ жизни (PHP Developer)</option>
                        </select>
                        <select class="input-group" name="target">
                            <option value="1">Потеря веса</option>
                            <option value="2">Поддержка веса</option>
                            <option value="3">Набор веса</option>
                        </select>
                        <button class="btn btn-primary button-group calc-button">Подобрать :)</button>
                        </form>
                    </div>
                </div>
                <style>
                    .input-group {
                        display: block;
                        margin-top: 10px;
                        border-radius: 3px;
                        border: 0;
                    }
                    .button-group {
                        display: block;
                        margin-top: 10px;
                        border-radius: 3px;
                    }
                </style>
            </div>
        </div>
    </section>

    <!-- Match Section Begin -->
    <section class="match-section set-bg" data-setbg="img/match/match-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ms-content">
                        <h4>Сравниваем еду</h4>
                        <div class="mc-table">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="left-team">
                                            <img src="img/match/tf-1.jpg" alt="">
                                            <h6>Овсянка</h6>
                                        </td>
                                        <td class="mt-content">
                                            <div class="mc-op">Завтракаем по уму</div>
                                            <h4>VS</h4>
                                            <div class="mc-op"><a href="#">Подробнее</a></div>
                                        </td>
                                        <td class="right-team">
                                            <img src="img/match/tf-2.jpg" alt="">
                                            <h6>Гречка</h6>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mc-table">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="left-team">
                                            <img src="img/match/tf-3.jpg" alt="">
                                            <h6>Australia</h6>
                                        </td>
                                        <td class="mt-content">
                                            <div class="mc-op">Ucraina vs England</div>
                                            <h4>VS</h4>
                                            <div class="mc-op">15 September 2019</div>
                                        </td>
                                        <td class="right-team">
                                            <img src="img/match/tf-4.jpg" alt="">
                                            <h6>Iraq</h6>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mc-table">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="left-team">
                                            <img src="img/match/tf-5.jpg" alt="">
                                            <h6>Ucraina</h6>
                                        </td>
                                        <td class="mt-content">
                                            <div class="mc-op">Ucraina vs England</div>
                                            <h4>VS</h4>
                                            <div class="mc-op">15 September 2019</div>
                                        </td>
                                        <td class="right-team">
                                            <img src="img/match/tf-6.jpg" alt="">
                                            <h6>Jordan</h6>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ms-content">
                        <h4>Сравниваем еду</h4>
                        <div class="mc-table">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="left-team">
                                            <img src="img/match/tf-1.jpg" alt="">
                                            <h6>Darussalam</h6>
                                        </td>
                                        <td class="mt-content">
                                            <div class="mc-op">Ucraina vs England</div>
                                            <h4>1 : 2</h4>
                                            <div class="mc-op">15 September 2019</div>
                                        </td>
                                        <td class="right-team">
                                            <img src="img/match/tf-2.jpg" alt="">
                                            <h6>Ucraina</h6>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mc-table">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="left-team">
                                            <img src="img/match/tf-3.jpg" alt="">
                                            <h6>Japan</h6>
                                        </td>
                                        <td class="mt-content">
                                            <div class="mc-op">Ucraina vs England</div>
                                            <h4>1 : 2</h4>
                                            <div class="mc-op">15 September 2019</div>
                                        </td>
                                        <td class="right-team">
                                            <img src="img/match/tf-4.jpg" alt="">
                                            <h6>Philippines</h6>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mc-table">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="left-team">
                                            <img src="img/match/tf-5.jpg" alt="">
                                            <h6>Kyrgyz</h6>
                                        </td>
                                        <td class="mt-content">
                                            <div class="mc-op">Ucraina vs England</div>
                                            <h4>1 : 2</h4>
                                            <div class="mc-op">15 September 2019</div>
                                        </td>
                                        <td class="right-team">
                                            <img src="img/match/tf-6.jpg" alt="">
                                            <h6 class="mi-right">Pakistan</h6>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Match Section End -->


    @endsection