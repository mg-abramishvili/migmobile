@extends('layouts.front')
@section('title', 'Migrant Mobile')
@section('description', 'Migrant Mobile')

@section('content')
    <div class="order-page">
        <order-pretty lang="{{app()->getLocale()}}"></order-pretty>
    </div>
@endsection