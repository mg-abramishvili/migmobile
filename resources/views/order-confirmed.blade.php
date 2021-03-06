@extends('layouts.front')
@section('title', 'Migrant Mobile')
@section('description', 'Migrant Mobile')

@section('content')
    <div class="order-page">
        <div class="container">
            <h1 class="title-head mb-4">{{ __('Order confirmed') }}</h1>

            <div class="row">
                <div class="col-12 col-lg-7">
                    <p><strong>{{ __('Order number') }}:</strong> {{ $order->id }}</p>
                    <p><strong>Фамилия:</strong> {{ $order->last_name }}</p>

                    <span class="text-danger">{{ __('Please remember this order data') }}</span>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="order-page-cart">
                        <p class="fw-bold">{{ __('Your order') }}:</p>
            
                        <p>
                            @if(isset($order->description['simple']))
                                @foreach($order->description['simple']['plans'] as $plan)
                                    @if($plan['quantity'] > 0)
                                        @if(app()->getLocale() == 'uz')
                                            {{ $plan['quantity'] }} &times; {{ $plan['name_uz'] }}
                                        @elseif(app()->getLocale() == 'tj')
                                            {{ $plan['quantity'] }} &times; {{ $plan['name_tj'] }}
                                        @else
                                            {{ $plan['quantity'] }} &times; {{ $plan['name_ru'] }}
                                        @endif
                                        <br>
                                    @endif
                                @endforeach
                            @endif
                        </p>
                        <p>
                            @if(isset($order->description['pretty']))
                                @foreach($order->description['pretty']['numbers'] as $number)
                                    {{ $number }} ({{ __('pretty number') }})
                                    <br>
                                @endforeach
                            @endif
                        </p>

                        <!-- @if($order->is_paid == true)
                            <p class="text-success fw-bold">оплачен</p>
                        @endif
                        @if($order->is_paid == false)
                            <p class="text-success fw-bold">ожидает оплаты</p>
                        @endif -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection