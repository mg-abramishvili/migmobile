@extends('layouts.front')
@section('title', 'Migrant Mobile')
@section('description', 'Migrant Mobile')

@section('content')
    <div class="news-page py-4">
        <div class="container">
            <h1 class="title-head mb-4">{{ $newsItem->name }}</h1>
            <div class="row">
                @if($newsItem->gallery)
                    <div class="col-12 col-lg-4">
                        <img src="{{ $newsItem->gallery }}" alt="{{ $newsItem->name }}" class="w-100 mb-3 rounded">
                    </div>
                    <div class="col-12 col-lg-8">
                        {!! $newsItem->text !!}
                    </div>
                @else
                    <div class="col-12">
                        {!! $newsItem->text !!}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection