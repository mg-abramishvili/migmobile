@extends('layouts.front')
@section('title', 'Migrant Mobile')
@section('description', 'Migrant Mobile')

@section('content')
    <div class="main-news" id="news">
        <div class="container">
            <h5 class="title-head">{{ __('News') }}</h5>
            <div class="main-news-slider">
                @foreach($news as $newsItem)
                    <div class="main-news-item">
                        <a href="#">
                            <div class="main-news-item-image" style="background-image: url(https://www.tajembassy.ru/images/demo/gallery/gallery2.jpg);"></div>
                            <p>{{ $newsItem->name }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="main-form main-form-avia">
        <div class="container">
            <div class="main-form-inner">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-8">
                        <h2 class="title-head title-head-white">{{ __('Looking for a ticket without overpayments?') }}</h2>
                        <p>{{ __('You can also buy cheap flights from us') }}</p>
                    </div>
                    <div class="col-12 col-lg-4 text-center">
                        <a href="{{ route('avia') }}" class="btn btn-primary btn-white">{{ __('Buy a ticket') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-sim" id="sim">
        <div class="container">
            <h5 class="title-head">{{ __('SIM cards') }}</h5>
            <div class="main-sim-slider">
                <div class="main-sim-item main-sim-item-beeline">
                    <p>{{ __('Beeline plan') }}</p>
                    <ul>
                        <li>100 MIN</li>
                        <li>10 GB</li>
                        <li>30 дней</li>
                    </ul>
                    <button class="btn btn-primary">{{ __('Order') }}</button>
                </div>
                <div class="main-sim-item main-sim-item-mts">
                    <p>{{ __('MTS plan') }}</p>
                    <ul>
                        <li>100 MIN</li>
                        <li>10 GB</li>
                        <li>30 дней</li>
                    </ul>
                    <button class="btn btn-primary">{{ __('Order') }}</button>
                </div>
                <div class="main-sim-item main-sim-item-megafon">
                    <p>{{ __('Megafon plan') }}</p>
                    <ul>
                        <li>100 MIN</li>
                        <li>10 GB</li>
                        <li>30 дней</li>
                    </ul>
                    <button class="btn btn-primary">{{ __('Order') }}</button>
                </div>
                <div class="main-sim-item main-sim-item-tele2">
                    <p>{{ __('Tele2 plan') }}</p>
                    <ul>
                        <li>100 MIN</li>
                        <li>10 GB</li>
                        <li>30 дней</li>
                    </ul>
                    <button class="btn btn-primary">{{ __('Order') }}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="main-form">
        <div class="container">
            <div class="main-form-inner">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-8">
                        <h2 class="title-head title-head-white">{{ __('Do you want a beautiful phone number?') }}</h2>
                        <p>{{ __('You can buy a beautiful phone number from us') }}</p>
                    </div>
                    <div class="col-12 col-lg-4 text-center">
                        <a href="/order/" class="btn btn-primary btn-white">{{ __('Choose a number') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-bank-card" id="bank-card">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-7">
                    <h5 class="title-head">{{ __('Bank cards') }}</h5>
                    
                    <ul>
                        <li>{{ __('Russian VISA debit card specially for foreign citizens') }}.</li>
                        <li>{{ __('The preferential commission for international transfers is only 1.15%') }}.</li>
                        <li>{{ __('Card delivery is free of charge') }}.</li>
                    </ul>
                    
                    <p>{{ __('Apply for a bank card of a Russian bank') }}</p>

                    <create-lead service="bank_card" lang="{{ app()->getLocale() }}"></create-lead>
                </div>
                <div class="col-12 col-lg-5">
                    <img src="/img/cards.png" alt="Банковская карта">
                </div>
            </div>
        </div>
    </div>

    <div class="main-loan" id="loan">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-5">
                    <img src="/img/rub.png" alt="Денежный займ">
                </div>
                <div class="col-12 col-lg-7">
                    <div class="main-loan-info">
                        <h5 class="title-head">{{ __('Loans') }}</h5>

                        <ul>
                            <li>{{ __('Loans for any purpose specifically for foreign citizens') }}</li>
                            <li>{{ __('Money is credited online to the card of any Russian bank') }}</li>
                            <li>{{ __('The loan is provided by the microfinance organization Asia Credit') }}</li>
                        </ul>

                        <p>{{ __('Apply for a cash loan of up to 30,000 rubles') }}</p>
                        
                        <create-lead service="loan" lang="{{ app()->getLocale() }}"></create-lead>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-about" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-12">
                    <h5 class="title-head">{{ __('About Us') }}</h5>
                    <p>Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века.</p>
                    <p>В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов.</p>
                    <p>Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн.</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var newsSlider = document.querySelector('.main-news-slider');

        if(matchMedia('(min-width: 992px)').matches ) {
            var flkty = new Flickity(newsSlider, {
                cellAlign: 'left',
                contain: true,
                groupCells: 4,
                pageDots: false
            })
        } else {
            var flkty = new Flickity(newsSlider, {
                cellAlign: 'left',
                contain: true,
                groupCells: 1,
                pageDots: false
            })
        }

        var simSlider = document.querySelector('.main-sim-slider');

        if(matchMedia('(min-width: 992px)').matches ) {
            var flkty = new Flickity(simSlider, {
                cellAlign: 'left',
                contain: true,
                groupCells: 4,
                pageDots: false,
                prevNextButtons: false,
            })
        } else {
            var flkty = new Flickity(simSlider, {
                cellAlign: 'left',
                contain: true,
                groupCells: 1,
                pageDots: false
            })
        }
    </script>
@endsection