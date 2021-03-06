@extends('layouts.front')
@section('title', 'Migrant Mobile')
@section('description', 'Migrant Mobile')

@section('content')
    <div class="news-page py-4">
        <div class="container">
            <h1 class="title-head mb-4">{{ __('News') }}</h1>
            
            @foreach($news as $newsItem)
                <a href="/news/{{ $newsItem->id }}" class="news-page-list-item">
                    @if($newsItem->gallery)
                        <div class="news-page-list-item-image" style="background-image: url({{ $newsItem->gallery }})"></div>
                    @else
                        <div class="news-page-list-item-image" style="background-image: url(/img/gallery2.jpg)"></div>
                    @endif
                    <div class="news-page-list-item-desc">
                        <span>{{ $newsItem->created_at->format('d.m.Y') }}</span>
                        <h5>{{ $newsItem->name }}</h5>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection