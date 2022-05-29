@extends('layouts.front')
@section('title', 'Migrant Mobile')
@section('description', 'Migrant Mobile')

@section('content')
    <div class="avia-page">
        <div class="present" style="background-image: url(/img/present-bg.jpg);">
            <div class="container avia-container">
                <h1 class="title-head title-head-center">Дешевые авиабилеты от крупнейших авиакомпаний и агентств</h1>
                <span class="subtitle">Сэкономьте до 30% средств на покупке авиабилетов без наценок</span>
                <div class="present__fix-height-wrap">
                    <div class="present__form" id="present__form">
                        <script charset="utf-8" src="//www.travelpayouts.com/widgets/25befb466b8bbed6d31093bebd91177c.js?v=2187" async></script>
                    </div>
                </div>
            </div>
        </div>

        <div class="calendar">
            <div class="container">
                <h2 class="title-head title-head-center">Календарь низких цен</h2>
                <span class="subtitle">Самые выгодные перелёты на год вперед!</span>
                <div class="calendar__form" id="calendar__form">
                    @if(session()->get('language') == 'ru')
                        <script src="https://tp.media/content?currency=rub&promo_id=4041&shmarker=349676&campaign_id=100&trs=162992&searchUrl=www.aviasales.ru%2Fsearch&locale=ru&powered_by=true&one_way=false&only_direct=false&period=year&range=7%2C14&primary=%23FFDD2D&color_background=%23ffffff&achieve=%23FFDD2D&dark=%23000000&light=%23151515&origin=MOW&destination=TAS" charset="utf-8"></script>
                    @endif

                    @if(session()->get('language') == 'uz')
                        <script src="https://tp.media/content?currency=uzs&promo_id=4041&shmarker=349676&campaign_id=100&trs=162992&searchUrl=www.aviasales.ru%2Fsearch&locale=ru&powered_by=true&one_way=false&only_direct=false&period=year&range=7%2C14&primary=%230C73FE&color_background=%23ffffff&achieve=%2345AD35&dark=%23000000&light=%23FFFFFF&origin=MOW&destination=TAS" charset="utf-8"></script>
                    @endif

                    @if(session()->get('language') == 'tj')
                        <script src="https://tp.media/content?currency=tjs&promo_id=4041&shmarker=349676&campaign_id=100&trs=162992&searchUrl=www.aviasales.ru%2Fsearch&locale=ru&powered_by=true&one_way=false&only_direct=false&period=year&range=7%2C14&primary=%230C73FE&color_background=%23ffffff&achieve=%2345AD35&dark=%23000000&light=%23FFFFFF&origin=MOW&destination=DYU" charset="utf-8"></script>
                    @endif
                </div>
            </div>
        </div>

        <div class="popular">
            <div class="container">
                <h2 class="title-head title-head-center">Самые популярные направления перелётов</h2>
                <ul class="popular__list">
                    @if(Route::is('aviaRu'))
                        <li id="popular__list__item-1">
                            <script src="//tp.media/content?currency=rub&promo_id=4044&shmarker=349676&campaign_id=100&trs=162992&target_host=www.aviasales.ru%2Fsearch&locale=ru&limit=6&powered_by=true&destination=TAS" charset="utf-8"></script>
                        </li>
                        <li id="popular__list__item-2">
                            <script src="//tp.media/content?currency=rub&promo_id=4044&shmarker=349676&campaign_id=100&trs=162992&target_host=www.aviasales.ru%2Fsearch&locale=ru&limit=6&powered_by=true&destination=NMA" charset="utf-8"></script>
                        </li>
                        <li id="popular__list__item-3">
                            <script src="//tp.media/content?currency=rub&promo_id=4044&shmarker=349676&campaign_id=100&trs=162992&target_host=www.aviasales.ru%2Fsearch&locale=ru&limit=6&powered_by=true&destination=SKD" charset="utf-8"></script>
                        </li>
                        <li id="popular__list__item-4">
                            <script src="//tp.media/content?currency=rub&promo_id=4044&shmarker=349676&campaign_id=100&trs=162992&target_host=www.aviasales.ru%2Fsearch&locale=ru&limit=6&powered_by=true&destination=DYU" charset="utf-8"></script>
                        </li>
                        <li id="popular__list__item-5">
                            <script src="//tp.media/content?currency=rub&promo_id=4044&shmarker=349676&campaign_id=100&trs=162992&target_host=www.aviasales.ru%2Fsearch&locale=ru&limit=6&powered_by=true&destination=LBD" charset="utf-8"></script>
                        </li>
                        <li id="popular__list__item-6">
                            <script src="//tp.media/content?currency=rub&promo_id=4044&shmarker=349676&campaign_id=100&trs=162992&target_host=www.aviasales.ru%2Fsearch&locale=ru&limit=6&powered_by=true&destination=KQT" charset="utf-8"></script>
                        </li>
                    @elseif(Route::is('aviaUz'))
                        <li id="popular__list__item-1">
                            <script src="//tp.media/content?currency=rub&promo_id=4044&shmarker=349676&campaign_id=100&trs=162992&target_host=www.aviasales.ru%2Fsearch&locale=ru&limit=6&powered_by=true&destination=TAS" charset="utf-8"></script>
                        </li>
                        <li id="popular__list__item-2">
                            <script src="//tp.media/content?currency=rub&promo_id=4044&shmarker=349676&campaign_id=100&trs=162992&target_host=www.aviasales.ru%2Fsearch&locale=ru&limit=6&powered_by=true&destination=NMA" charset="utf-8"></script>
                        </li>
                        <li id="popular__list__item-3">
                            <script src="//tp.media/content?currency=rub&promo_id=4044&shmarker=349676&campaign_id=100&trs=162992&target_host=www.aviasales.ru%2Fsearch&locale=ru&limit=6&powered_by=true&destination=SKD" charset="utf-8"></script>
                        </li>
                        <li id="popular__list__item-4">
                            <script src="//tp.media/content?currency=rub&promo_id=4044&shmarker=349676&campaign_id=100&trs=162992&target_host=www.aviasales.ru%2Fsearch&locale=ru&limit=6&powered_by=true&destination=BHK" charset="utf-8"></script>
                        </li>
                            <li id="popular__list__item-5">
                        <script src="//tp.media/content?currency=rub&promo_id=4044&shmarker=349676&campaign_id=100&trs=162992&target_host=www.aviasales.ru%2Fsearch&locale=ru&limit=6&powered_by=true&destination=FEG" charset="utf-8"></script>
                            </li>
                        <li id="popular__list__item-6">
                            <script src="//tp.media/content?currency=rub&promo_id=4044&shmarker=349676&campaign_id=100&trs=162992&target_host=www.aviasales.ru%2Fsearch&locale=ru&limit=6&powered_by=true&destination=NCU" charset="utf-8"></script>
                        </li>
                    @elseif(Route::is('aviaTj'))
                        <li id="popular__list__item-1">
                            <script src="//tp.media/content?currency=rub&promo_id=4044&shmarker=349676&campaign_id=100&trs=162992&target_host=www.aviasales.ru%2Fsearch&locale=ru&limit=6&powered_by=true&destination=DYU" charset="utf-8"></script>
                        </li>
                        <li id="popular__list__item-2">
                            <script src="//tp.media/content?currency=rub&promo_id=4044&shmarker=349676&campaign_id=100&trs=162992&target_host=www.aviasales.ru%2Fsearch&locale=ru&limit=6&powered_by=true&destination=LBD" charset="utf-8"></script>
                        </li>
                        <li id="popular__list__item-3">
                            <script src="//tp.media/content?currency=rub&promo_id=4044&shmarker=349676&campaign_id=100&trs=162992&target_host=www.aviasales.ru%2Fsearch&locale=ru&limit=6&powered_by=true&destination=KQT" charset="utf-8"></script>
                        </li>
                        <li id="popular__list__item-4">
                            <script src="//tp.media/content?currency=rub&promo_id=4044&shmarker=349676&campaign_id=100&trs=162992&target_host=www.aviasales.ru%2Fsearch&locale=ru&limit=6&powered_by=true&destination=TJU" charset="utf-8"></script>
                        </li>
                        <li id="popular__list__item-5">

                        </li>
                        <li id="popular__list__item-6">

                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endsection