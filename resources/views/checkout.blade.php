@extends('layouts.front')
@section('title', 'Migrant Mobile')
@section('description', 'Migrant Mobile')

@section('content')
    <div class="order-page">
        <checkout lang="{{app()->getLocale()}}"></checkout>
    </div>
@endsection