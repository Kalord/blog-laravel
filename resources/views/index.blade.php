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
            <div class="tn-title"><i class="fa fa-caret-right"></i> Trending News</div>
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
                        <h4>Next Match</h4>
                        <div class="mc-table">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="left-team">
                                            <img src="img/match/tf-1.jpg" alt="">
                                            <h6>Cambodia</h6>
                                        </td>
                                        <td class="mt-content">
                                            <div class="mc-op">Ucraina vs England</div>
                                            <h4>VS</h4>
                                            <div class="mc-op">15 September 2019</div>
                                        </td>
                                        <td class="right-team">
                                            <img src="img/match/tf-2.jpg" alt="">
                                            <h6>Qatar</h6>
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
                        <h4>Recent Results</h4>
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