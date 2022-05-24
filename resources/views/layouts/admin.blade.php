<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Migrant Mobile - ПУ</title>
        
        <link href="{{ mix('css/admin.css') }}" type="text/css" rel="stylesheet"/>
    </head>
    <body class="admin_panel" style="min-height: 100vh;">
        @auth
            <div id="app"></div>
        @endauth

        @guest
            <main>
                @yield('content')
            </main>
        @endguest
        
        @if(Route::currentRouteName() != 'login')
            <script src="{{ mix('/js/admin.js') }}"></script>
        @endif

        @yield('scripts')
    </body>
</html>