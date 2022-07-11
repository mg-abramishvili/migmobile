@extends('layouts.front')
@section('title', 'Migrant Mobile')
@section('description', 'Migrant Mobile')

@section('content')
    <div class="order-page">
        <order-simple lang="{{app()->getLocale()}}"></order-simple>
    </div>
@endsection