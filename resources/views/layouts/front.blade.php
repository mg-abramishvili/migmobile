<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>@yield('title')</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('/css/flickity.min.css') }}"/>
        <link rel="stylesheet" href="{{ mix('/css/front.css') }}"/>
    </head>
    <body>
        <div id="front">
            <header class="header">
                <div class="header-top">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col header-top-logo">
                                @if(Route::is('homeRu') || Route::is('aviaRu'))
                                    <a href="/"><img src="/img/logo.svg" alt="Паритет-Телеком"></a>
                                @elseif(Route::is('homeUz') || Route::is('aviaUz'))
                                    <a href="/uz"><img src="/img/logo.svg" alt="Паритет-Телеком"></a>
                                @elseif(Route::is('homeTj') || Route::is('aviaTj'))
                                    <a href="/tj"><img src="/img/logo.svg" alt="Паритет-Телеком"></a>
                                @endif
                            </div>
                            <div class="col header-top-socials">
                                <ul>
                                    <li>
                                        <a href="https://instagram.com/migrant_mobile" target="_blank">
                                            <img src="/img/instagram.svg" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://t.me/Migrant_mobile_bot" target="_blank">
                                            <img src="/img/telegram.svg" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://youtube.com/channel/UCUyiF6u7V9gASr5wBEeqiKw" target="_blank">
                                            <img src="/img/youtube.svg" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.facebook.com/migrant.mobile" target="_blank">
                                            <img src="/img/facebook.svg" alt="">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col header-top-tel">
                                <a href="#">+7 999 123-45-67</a>
                            </div>
                            <div class="col header-top-lang">
                                <ul class="header-top-flags">
                                    <li>
                                        <a href="{{ route('homeRu') }}">
                                            <img src="/img/flag_rus.svg" alt="Русский язык">
                                            RU
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('homeUz') }}/">
                                            <img src="/img/flag_uzb.svg" alt="Узбекский язык">
                                            UZ
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('homeTj') }}/">
                                            <img src="/img/flag_taj.svg" alt="Таджикский язык">
                                            TJ
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col header-top-nav-button">
                                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample10" aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col header-bottom-menu">
                                <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
                                    <div class="navbar-collapse justify-content-md-center collapse" id="navbarsExample10" style="">
                                        <ul class="navbar-nav">
                                            <li class="nav-item">
                                                @if(Route::is('homeRu') || Route::is('aviaRu'))
                                                    <a href="/#news" class="nav-link">Новости<a/>
                                                @elseif(Route::is('homeUz') || Route::is('aviaUz'))
                                                    <a href="/uz/#news" class="nav-link">Янгиликлар<a/>
                                                @elseif(Route::is('homeTj') || Route::is('aviaTj'))
                                                    <a href="/tj/#news" class="nav-link">Хабарҳо<a/>
                                                @endif
                                            </li>
                                            <li class="nav-item">
                                                @if(Route::is('homeRu') || Route::is('aviaRu'))
                                                    <a href="{{ route('aviaRu') }}" class="nav-link">Авиабилеты<a/>
                                                @elseif(Route::is('homeUz') || Route::is('aviaUz'))
                                                    <a href="{{ route('aviaUz') }}" class="nav-link">Авиачипталар<a/>
                                                @elseif(Route::is('homeTj') || Route::is('aviaTj'))
                                                    <a href="{{ route('aviaTj') }}" class="nav-link">Чиптаҳои ҳавопаймо<a/>
                                                @endif
                                            </li>
                                            <li class="nav-item">
                                                @if(Route::is('homeRu') || Route::is('aviaRu'))
                                                    <a href="/#sim" class="nav-link">SIM-карты</a>
                                                @elseif(Route::is('homeUz') || Route::is('aviaUz'))
                                                    <a href="/#sim" class="nav-link">SIM-карталар</a>
                                                @elseif(Route::is('homeTj') || Route::is('aviaTj'))
                                                    <a href="/#sim" class="nav-link">SIM-кортҳо</a>
                                                @endif
                                            </li>
                                            <li class="nav-item">
                                                @if(Route::is('homeRu') || Route::is('aviaRu'))
                                                    <a href="/#bank-card" class="nav-link">Банковские карты</a>
                                                @elseif(Route::is('homeUz') || Route::is('aviaUz'))
                                                    <a href="/uz/#bank-card" class="nav-link">Банк карталари</a>
                                                @elseif(Route::is('homeTj') || Route::is('aviaTj'))
                                                    <a href="/tj/#bank-card" class="nav-link">Кортҳои бонкӣ</a>
                                                @endif
                                            </li>
                                            <li class="nav-item">
                                                @if(Route::is('homeRu') || Route::is('aviaRu'))
                                                    <a href="/#loan" class="nav-link">Денежные займы</a>
                                                @elseif(Route::is('homeUz') || Route::is('aviaUz'))
                                                    <a href="/uz/#loan" class="nav-link">Қарзга пул</a>
                                                @elseif(Route::is('homeTj') || Route::is('aviaTj'))
                                                    <a href="/tj/#loan" class="nav-link">Қарзҳои пулӣ</a>
                                                @endif
                                            </li>
                                            <li class="nav-item">
                                                @if(Route::is('homeRu') || Route::is('aviaRu'))
                                                    <a href="/#about" class="nav-link">О нас</a>
                                                @elseif(Route::is('homeUz') || Route::is('aviaUz'))
                                                    <a href="/uz/#about" class="nav-link">Биз ҳақимизда</a>
                                                @elseif(Route::is('homeTj') || Route::is('aviaTj'))
                                                    <a href="/tj/#about" class="nav-link">Дар бораи мо</a>
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <main>
                @yield('content')
            </main>

            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col footer-logo">
                            <a href="#">
                                <img src="/img/logo-w.svg" alt="Паритет-Телеком">
                            </a>
                            <a href="#">
                                @if(request()->lang == 'uz')
                                    Махфийлик сиёсати
                                @elseif(request()->lang == 'tj')
                                    Сиёсати корбурди маълумоти шахсӣ
                                @else
                                    Политика конфиденциальности
                                @endif
                            </a>
                        </div>
                        <div class="col footer-menu">
                            <ul>
                                <li>
                                    @if(Route::is('homeRu') || Route::is('aviaRu'))
                                        <a href="/#news">Новости<a/>
                                    @elseif(Route::is('homeUz') || Route::is('aviaUz'))
                                        <a href="/uz/#news">Янгиликлар<a/>
                                    @elseif(Route::is('homeTj') || Route::is('aviaTj'))
                                        <a href="/tj/#news">Хабарҳо<a/>
                                    @endif
                                </li>
                                <li>
                                    @if(Route::is('homeRu') || Route::is('aviaRu'))
                                        <a href="{{ route('aviaRu') }}">Авиабилеты<a/>
                                    @elseif(Route::is('homeUz') || Route::is('aviaUz'))
                                        <a href="{{ route('aviaUz') }}">Авиачипталар<a/>
                                    @elseif(Route::is('homeTj') || Route::is('aviaTj'))
                                        <a href="{{ route('aviaTj') }}">Чиптаҳои ҳавопаймо<a/>
                                    @endif
                                </li>
                                <li>
                                    @if(Route::is('homeRu') || Route::is('aviaRu'))
                                        <a href="/#sim">SIM-карты</a>
                                    @elseif(Route::is('homeUz') || Route::is('aviaUz'))
                                        <a href="/#sim">SIM-карталар</a>
                                    @elseif(Route::is('homeTj') || Route::is('aviaTj'))
                                        <a href="/#sim">SIM-кортҳо</a>
                                    @endif
                                </li>
                                <li>
                                    @if(Route::is('homeRu') || Route::is('aviaRu'))
                                        <a href="/#bank-card">Банковские карты</a>
                                    @elseif(Route::is('homeUz') || Route::is('aviaUz'))
                                        <a href="/uz/#bank-card">Банк карталари</a>
                                    @elseif(Route::is('homeTj') || Route::is('aviaTj'))
                                        <a href="/tj/#bank-card">Кортҳои бонкӣ</a>
                                    @endif
                                </li>
                                <li>
                                    @if(Route::is('homeRu') || Route::is('aviaRu'))
                                        <a href="/#loan">Денежные займы</a>
                                    @elseif(Route::is('homeUz') || Route::is('aviaUz'))
                                        <a href="/uz/#loan">Қарзга пул</a>
                                    @elseif(Route::is('homeTj') || Route::is('aviaTj'))
                                        <a href="/tj/#loan">Қарзҳои пулӣ</a>
                                    @endif
                                </li>
                                <li>
                                    @if(Route::is('homeRu') || Route::is('aviaRu'))
                                        <a href="/#about">О нас</a>
                                    @elseif(Route::is('homeUz') || Route::is('aviaUz'))
                                        <a href="/uz/#about">Биз ҳақимизда</a>
                                    @elseif(Route::is('homeTj') || Route::is('aviaTj'))
                                        <a href="/tj/#about">Дар бораи мо</a>
                                    @endif
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 footer-social">
                            <p>
                                @if(request()->lang == 'uz')
                                    Ижтимоий тармоқларда бизни кузатинг
                                @elseif(request()->lang == 'tj')
                                    Моро дар шабакаҳои иҷтимоӣ пайгирӣ кунед
                                @else
                                    Следите за нами в соцсетях:
                                @endif
                            </p>
                            <ul>
                                <li>
                                    <a href="https://instagram.com/migrant_mobile" target="_blank">
                                        <img src="/img/instagram.svg" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="https://t.me/Migrant_mobile_bot" target="_blank">
                                        <img src="/img/telegram.svg" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="https://youtube.com/channel/UCUyiF6u7V9gASr5wBEeqiKw" target="_blank">
                                        <img src="/img/youtube.svg" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/migrant.mobile" target="_blank">
                                        <img src="/img/facebook.svg" alt="">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        
        <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('/js/flickity.pkgd.min.js') }}"></script>
        <script src="{{ mix('/js/front.js') }}"></script>
        @yield('scripts')
    </body>
</html>