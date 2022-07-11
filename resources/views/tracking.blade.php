@extends('layouts.front')
@section('title', 'Migrant Mobile')
@section('description', 'Migrant Mobile')

@section('content')
    <div class="order-page">
        <tracking lang="{{app()->getLocale()}}"></tracking>
    </div>
@endsection