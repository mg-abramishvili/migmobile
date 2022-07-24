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
                                <a href="/">
                                    <img src="/img/logo.svg" alt="Паритет-Телеком">
                                </a>
                            </div>
                            <div class="col header-top-socials">
                                <ul>
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
                                        <a href="https://vm.tiktok.com/ZSd28C4HB/" target="_blank">
                                            <img src="/img/tiktok.svg" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://ok.ru/group/61666975613007" target="_blank">
                                            <img src="/img/ok.svg" alt="">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col header-top-tel">
                                <a href="#">+7 999 123-45-67</a>
                            </div>
                            <div class="col header-top-lang">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <div class="dropdown-item header-top-flags-item">
                                            <a href="{{ route('home') }}">
                                                <img src="/img/flag_{{ strtoupper(app()->getLocale()) }}.svg" alt="Русский язык">
                                                {{ strtoupper(app()->getLocale()) }}
                                            </a>
                                        </div>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        @foreach(config('app.languages') as $langLocale => $langName)
                                            <li class="dropdown-item header-top-flags-item">
                                                <a href="{{ url()->current() }}?lang={{ $langLocale }}">
                                                    <img src="/img/flag_{{ $langName }}.svg" alt="{{ $langName }}">
                                                    {{ $langName }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
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
                                                <a href="/news-all" class="nav-link">{{ __('News') }}<a/>
                                            </li>
                                            <li class="nav-item">
                                                <a href="/avia/" class="nav-link">{{ __('Avia Tickets') }}<a/>
                                            </li>
                                            <li class="nav-item">
                                                <a href="/#sim" class="nav-link">{{ __('SIM cards') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="/#bank-card" class="nav-link">{{ __('Bank cards') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="/#loan" class="nav-link">{{ __('Loans') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="/tracking" class="nav-link">{{ __('Order status') }}</a>
                                            </li>
                                            <li class="nav-item socials-menu-mobile">
                                                <ul>
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
                                                        <a href="https://vm.tiktok.com/ZSd28C4HB/" target="_blank">
                                                            <img src="/img/tiktok.svg" alt="">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="https://ok.ru/group/61666975613007" target="_blank">
                                                            <img src="/img/ok.svg" alt="">
                                                        </a>
                                                    </li>
                                                </ul>
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
                            <a href="/policy">{{ __('Privacy policy') }}</a>
                        </div>
                        <div class="col footer-menu">
                            <ul>
                                <li>
                                    <a href="/news-all">{{ __('News') }}<a/>
                                </li>
                                <li>
                                    <a href="/avia/">{{ __('Avia Tickets') }}<a/>
                                </li>
                                <li>
                                    <a href="/#sim">{{ __('SIM cards') }}</a>
                                </li>
                                <li>
                                    <a href="/#bank-card">{{ __('Bank cards') }}</a>
                                </li>
                                <li>
                                    <a href="/#loan">{{ __('Loans') }}</a>
                                </li>
                                <!-- <li>
                                    <a href="/#about">{{ __('About Us') }}</a>
                                </li> -->
                            </ul>
                        </div>
                        <div class="col-12 footer-social">
                            <p>{{ __('Follow us on social media') }}</p>
                            <ul>
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
                                    <a href="https://vm.tiktok.com/ZSd28C4HB/" target="_blank">
                                        <img src="/img/tiktok.svg" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="https://ok.ru/group/61666975613007" target="_blank">
                                        <img src="/img/ok.svg" alt="">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

        @if(Route::is('avia'))
        @else
            <script src="{{ mix('/js/front.js') }}"></script>
        @endif

        <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('/js/flickity.pkgd.min.js') }}"></script>
        @yield('scripts')
    </body>
</html>