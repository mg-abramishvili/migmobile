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
        <div id="app">
            <header class="header">
                <div class="header-top">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col header-top-logo">
                                @hasSection('lang')
                                    <a href="/@yield('lang', 'ru')"><img src="img/logo.svg" alt="Паритет-Телеком"></a>
                                @else
                                    <a href="/ru"><img src="img/logo.svg" alt="Паритет-Телеком"></a>
                                @endif
                            </div>
                            <div class="col header-top-socials">
                                <ul>
                                    <li>
                                        <a href="https://instagram.com/migrant_mobile" target="_blank">
                                            <img src="img/instagram.svg" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://t.me/Migrant_mobile_bot" target="_blank">
                                            <img src="img/telegram.svg" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://youtube.com/channel/UCUyiF6u7V9gASr5wBEeqiKw" target="_blank">
                                            <img src="img/youtube.svg" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.facebook.com/migrant.mobile" target="_blank">
                                            <img src="img/facebook.svg" alt="">
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
                                        <a href="{{ route('home', ['lang' => 'ru']) }}">
                                            <img src="img/flag_rus.svg" alt="Русский язык">
                                            RU
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('home', ['lang' => 'uz']) }}">
                                            <img src="img/flag_uzb.svg" alt="Узбекский язык">
                                            UZ
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('home', ['lang' => 'tj']) }}">
                                            <img src="img/flag_taj.svg" alt="Таджикский язык">
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
                                                <a href="#" class="nav-link">
                                                    @if(request()->lang == 'uz')
                                                        Янгиликлар
                                                    @elseif(request()->lang == 'tj')
                                                        Хабарҳо
                                                    @else
                                                        Новости
                                                    @endif
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    @if(request()->lang == 'uz')
                                                        Авиачипталар
                                                    @elseif(request()->lang == 'tj')
                                                        Чиптаҳои ҳавопаймо
                                                    @else
                                                        Авиабилеты
                                                    @endif
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    @if(request()->lang == 'uz')
                                                        SIM-карталар
                                                    @elseif(request()->lang == 'tj')
                                                        SIM-кортҳо
                                                    @else
                                                        SIM-карты
                                                    @endif
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    @if(request()->lang == 'uz')
                                                        Банк карталари
                                                    @elseif(request()->lang == 'tj')
                                                        Кортҳои бонкӣ
                                                    @else
                                                        Банковские карты
                                                    @endif
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    @if(request()->lang == 'uz')
                                                        Қарзга пул
                                                    @elseif(request()->lang == 'tj')
                                                        Қарзҳои пулӣ
                                                    @else
                                                        Денежные займы
                                                    @endif
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    @if(request()->lang == 'uz')
                                                        Биз ҳақимизда
                                                    @elseif(request()->lang == 'tj')
                                                        Дар бораи мо
                                                    @else
                                                        О нас
                                                    @endif
                                                </a>
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
                                <img src="img/logo-w.svg" alt="Паритет-Телеком">
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
                                    <a href="#">
                                        @if(request()->lang == 'uz')
                                            Янгиликлар
                                        @elseif(request()->lang == 'tj')
                                            Хабарҳо
                                        @else
                                            Новости
                                        @endif
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        @if(request()->lang == 'uz')
                                            Авиачипталар
                                        @elseif(request()->lang == 'tj')
                                            Чиптаҳои ҳавопаймо
                                        @else
                                            Авиабилеты
                                        @endif
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        @if(request()->lang == 'uz')
                                            SIM-карталар
                                        @elseif(request()->lang == 'tj')
                                            SIM-кортҳо
                                        @else
                                            SIM-карты
                                        @endif
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        @if(request()->lang == 'uz')
                                            Банк карталари
                                        @elseif(request()->lang == 'tj')
                                            Кортҳои бонкӣ
                                        @else
                                            Банковские карты
                                        @endif
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        @if(request()->lang == 'uz')
                                            Қарзга пул
                                        @elseif(request()->lang == 'tj')
                                            Қарзҳои пулӣ
                                        @else
                                            Денежные займы
                                        @endif
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        @if(request()->lang == 'uz')
                                            Биз ҳақимизда
                                        @elseif(request()->lang == 'tj')
                                            Дар бораи мо
                                        @else
                                            О нас
                                        @endif
                                    </a>
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
                                        <img src="img/instagram.svg" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="https://t.me/Migrant_mobile_bot" target="_blank">
                                        <img src="img/telegram.svg" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="https://youtube.com/channel/UCUyiF6u7V9gASr5wBEeqiKw" target="_blank">
                                        <img src="img/youtube.svg" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/migrant.mobile" target="_blank">
                                        <img src="img/facebook.svg" alt="">
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