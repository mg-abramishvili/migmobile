@extends('layouts.front')
@section('title', 'Migrant Mobile')
@section('description', 'Migrant Mobile')

@section('content')
    <div class="order-page">
        <div class="container">
            <h1 class="title-head mb-4">Заказ №{{ $order->id }}</h1>
            
            <p>Ваш заказ:</p>
            
            <p>{{ $order->description }}</p>

            <p>Статус:</p>

            @if($order->is_paid == true)
                <p class="text-success">оплачен</p>
            @endif
            @if($order->is_paid == false)
                <p class="text-danger">ожидает оплаты</p>
            @endif
        </div>
    </div>
@endsection