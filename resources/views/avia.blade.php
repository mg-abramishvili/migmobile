@extends('layouts.front')
@section('title', 'Migrant Mobile')
@section('description', 'Migrant Mobile')

@section('content')
    <div class="avia-hero" style="background-image: url(/img/avia1.jpg)">
        <div class="container">
            @if(Route::is('aviaRu'))
                <iframe scrolling="no" frameborder="0" src="//www.travelpayouts.com/widgets/25befb466b8bbed6d31093bebd91177c.html?v=2186" style="width: 100%; height: auto;"></iframe>
            @elseif(Route::is('aviaUz'))
                UZ AVIA
            @elseif(Route::is('aviaTj'))
                TJ AVIA
            @endif
        </div>
    </div>
@endsection