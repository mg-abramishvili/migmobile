@extends('layouts.front')
@section('title', 'Migrant Mobile')
@section('description', 'Migrant Mobile')

@section('content')
    <div class="order-page">
        <div class="container">
            <h1 class="title-head mb-4">Заказ принят</h1>

            <div class="row">
                <div class="col-12 col-lg-7">
                    <p><strong>Номер заказа:</strong> {{ $order->id }}</p>
                    <p><strong>Фамилия:</strong> {{ $order->last_name }}</p>

                    <span class="text-danger">{{ __('Please remember this order data') }}</span>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="order-page-cart">
                        <p class="fw-bold">Ваш заказ:</p>
            
                        <p>
                            @if($order->description['simple'])
                                @foreach($order->description['simple']['plans'] as $plan)
                                    @if(app()->getLocale() == 'uz')
                                        {{ $plan['quantity' }} &times; {{ $plan['name_uz' }}
                                    @elseif(app()->getLocale() == 'tj')
                                        {{ $plan['quantity' }} &times; {{ $plan['name_tj'] }}
                                    @else
                                        {{ $plan['quantity'] }} &times; {{ $plan['name_ru'] }}
                                    @endif
                                @endforeach
                            @endif
                        </p>

                        @if($order->is_paid == true)
                            <p class="text-success fw-bold">оплачен</p>
                        @endif
                        @if($order->is_paid == false)
                            <p class="text-success fw-bold">ожидает оплаты</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection