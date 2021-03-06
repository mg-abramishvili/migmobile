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
                        <a href="/news/{{$newsItem->id}}">
                            @if($newsItem->gallery)
                                <div class="main-news-item-image" style="background-image: url({{ $newsItem->gallery }});"></div>
                            @else
                                <div class="main-news-item-image" style="background-image: url(/img/gallery2.jpg);"></div>
                            @endif
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
                @foreach($plans as $plan)
                    <div class="main-sim-item main-sim-item-beeline">
                        <div class="main-sim-item-icon" style="background-image: url({{ $plan->icon }})"></div>
                        <p>
                            @if(app()->getLocale() == 'uz')
                                {{ $plan->name_uz }}
                            @elseif(app()->getLocale() == 'tj')
                                {{ $plan->name_tj }}
                            @else
                                {{ $plan->name_ru }}
                            @endif
                        </p>
                        <ul>
                            <li>{{ $plan->min }} {{ __('min') }}</li>
                            <li>{{ $plan->gb }} {{ __('gb') }}</li>
                            <li>{{ $plan->sms }} SMS</li>
                            <li><strong>{{ $plan->price }} ??????. / {{ __('month') }}.</strong></li>
                        </ul>
                        <a href="/order/" class="btn btn-primary">{{ __('Order') }}</a>
                    </div>
                @endforeach
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
                        <a href="/order-pretty/" class="btn btn-primary btn-white">{{ __('Choose a number') }}</a>
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
                    
                    @if(app()->getLocale() == 'uz')
                        {!! $bankCard->uz !!}
                    @elseif(app()->getLocale() == 'tj')
                        {!! $bankCard->tj !!}
                    @else
                        {!! $bankCard->ru !!}
                    @endif

                    <create-lead service="bank_card" lang="{{ app()->getLocale() }}"></create-lead>
                </div>
                <div class="col-12 col-lg-5">
                    <img src="/img/cards.jpg" alt="???????????????????? ??????????">
                </div>
            </div>
        </div>
    </div>

    <div class="main-loan" id="loan">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-5">
                    <img src="/img/rub.png" alt="???????????????? ????????">
                </div>
                <div class="col-12 col-lg-7">
                    <div class="main-loan-info">
                        <h5 class="title-head">{{ __('Loans') }}</h5>

                        @if(app()->getLocale() == 'uz')
                            {!! $loan->uz !!}
                        @elseif(app()->getLocale() == 'tj')
                            {!! $loan->tj !!}
                        @else
                            {!! $loan->ru !!}
                        @endif
                        
                        <create-lead service="loan" lang="{{ app()->getLocale() }}"></create-lead>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="main-about" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-12">
                    <h5 class="title-head">{{ __('About Us') }}</h5>

                    @if(app()->getLocale() == 'uz')
                        {!! $about->uz !!}
                    @elseif(app()->getLocale() == 'tj')
                        {!! $about->tj !!}
                    @else
                        {!! $about->ru !!}
                    @endif
                </div>
            </div>
        </div>
    </div> -->
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