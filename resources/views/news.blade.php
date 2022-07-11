@extends('layouts.front')
@section('title', 'Migrant Mobile')
@section('description', 'Migrant Mobile')

@section('content')
    <div class="news-page py-4">
        <div class="container">
            <h1 class="title-head mb-4">{{ __('News') }}</h1>
            
            @foreach($news as $newsItem)
                <div class="news-page-list-item">
                    <div class="news-page-list-item-image" style="background-image: url({{ $newsItem->gallery }})"></div>
                    <div class="news-page-list-item-desc">
                        <p>{{ $newsItem->created_at->format('d.m.Y') }}</span>
                        <h5>{{ $newsItem->name }}</h5>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection