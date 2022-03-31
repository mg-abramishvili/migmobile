@extends('layouts.front')
@section('title', 'Migrant Mobile')
@section('description', 'Migrant Mobile')

@section('content')
    <div class="avia-page">
        <div class="present b-lazy b-loaded" style="background-image: url(&quot;img/present-bg.jpg&quot;);">
            <div class="container">
                <h1>Дешевые авиабилеты от крупнейших авиакомпаний и агентств</h1>
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
                <h2>Календарь низких цен</h2>
                <span class="subtitle">Самые выгодные перелёты на год вперед!</span>
                <div class="calendar__tooltip">
                    <div class="tooltip">Для изменения параметров календаря нажмите тут</div>
                </div>
                <div class="calendar__form" id="calendar__form">
                    <script src="https://tp.media/content?currency=rub&promo_id=4041&shmarker=349676&campaign_id=100&trs=162992&searchUrl=www.aviasales.ru%2Fsearch&locale=ru&powered_by=true&one_way=false&only_direct=false&period=year&range=7%2C14&primary=%23FFDD2D&color_background=%23ffffff&achieve=%23FFDD2D&dark=%23000000&light=%23151515" charset="utf-8"></script>
                </div>
            </div>
        </div>

        <div class="popular">
            <div class="container">
                <h2>Самые популярные направления перелётов</h2>
                <ul class="popular__list">
                    <li id="popular__list__item-1">
                        <script src="//tp.media/content?currency=rub&promo_id=4044&shmarker=349676&campaign_id=100&trs=162992&target_host=www.aviasales.ru%2Fsearch&locale=ru&limit=6&powered_by=true&destination=MOW" charset="utf-8"></script>
                    </li>
                    <li id="popular__list__item-2">
                        <script src="//tp.media/content?currency=rub&promo_id=4044&shmarker=349676&campaign_id=100&trs=162992&target_host=www.aviasales.ru%2Fsearch&locale=ru&limit=6&powered_by=true&destination=LED" charset="utf-8"></script>
                    </li>
                    <li id="popular__list__item-3">
                        <script src="//tp.media/content?currency=rub&promo_id=4044&shmarker=349676&campaign_id=100&trs=162992&target_host=www.aviasales.ru%2Fsearch&locale=ru&limit=6&powered_by=true&destination=OVB" charset="utf-8"></script>
                    </li>
                    <li id="popular__list__item-4">
                        <script src="//tp.media/content?currency=rub&promo_id=4044&shmarker=349676&campaign_id=100&trs=162992&target_host=www.aviasales.ru%2Fsearch&locale=ru&limit=6&powered_by=true&destination=SVX" charset="utf-8"></script>
                    </li>
                    <li id="popular__list__item-5">
                        <script src="//tp.media/content?currency=rub&promo_id=4044&shmarker=349676&campaign_id=100&trs=162992&target_host=www.aviasales.ru%2Fsearch&locale=ru&limit=6&powered_by=true&destination=KZN" charset="utf-8"></script>
                    </li>
                    <li id="popular__list__item-6">
                        <script src="//tp.media/content?currency=rub&promo_id=4044&shmarker=349676&campaign_id=100&trs=162992&target_host=www.aviasales.ru%2Fsearch&locale=ru&limit=6&powered_by=true&destination=UFA" charset="utf-8"></script>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection