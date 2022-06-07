@extends('layouts.front')
@section('title', 'Migrant Mobile')
@section('description', 'Migrant Mobile')

@section('content')
    <div class="order-page">
        <div class="container">
            <h1 class="title-head mb-4">Заказ №{{ $order->id }} оплачен</h1>
            
            <p>Ваш заказ:</p>
            
            <p>{{ $order->description }}</p>
        </div>
    </div>
@endsection