<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Number;
use App\Models\Setting;
use App\Models\Plan;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getCart(Request $request)
    {
        if($request->type === 'simple')
        {
            $cart = session()->get('simple-cart');
        }
        if($request->type === 'pretty')
        {
            $cart = session()->get('pretty-cart');
        }

        return $cart;
    }

    public function storeSimpleCart(Request $request)
    {
        $simple_cart = $request->simple_cart;
        
        session()->put('simple-cart', $simple_cart);
    }

    public function storePrettyCart(Request $request)
    {
        $pretty_cart = $request->pretty_cart;
        
        if($pretty_cart["numbers"])
        {
            foreach($pretty_cart["numbers"] as $nm)
            {
                $number = Number::where('number', $nm)->first();
    
                if(isset($number->order_id)) {
                    return response('Номер ' . $number->number . ' уже был кем-то куплен', 500);
                }
            }
        }

        session()->put('pretty-cart', $pretty_cart);
    }

    public function store(Request $request)
    {
        function gen_uuid() {
            return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
                mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
                mt_rand( 0, 0xffff ),
                mt_rand( 0, 0x0fff ) | 0x4000,
                mt_rand( 0, 0x3fff ) | 0x8000,
                mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
            );
        }

        $this->validate($request, [
            'order' => 'required',
            'cart' => 'required',
        ]);

        $order = new Order();
        $order->first_name = $request->order["first_name"];
        $order->middle_name = $request->order["middle_name"];
        $order->last_name = $request->order["last_name"];
        $order->phone = $request->order["phone"];
        $order->zip = $request->order["zip"];
        $order->region = $request->order["region"];
        $order->city = $request->order["city"];
        $order->street = $request->order["street"];
        $order->building = $request->order["building"];
        $order->apartment = $request->order["apartment"];
        $order->entrance = $request->order["entrance"];
        $order->uid = gen_uuid();
        $order->is_paid = false;
        $order->description = $request->cart;
        $order->price = 0;

        $cart = $request->cart;

        if(isset($cart['simple']))
        {
            foreach($cart['simple']['plans'] as $plan)
            {
                if($plan["quantity"] > 0)
                {
                    if(!$this->CheckStockQuantity($plan))
                    {
                        return response('Необходимого количество SIM-карт ' . $plan['name_ru'] . ' уже нет в наличии', 500);
                    }
                }
            }

            $order->price += $cart['simple']['price'];
        }

        if(isset($cart['pretty']))
        {
            foreach($cart['pretty']['numbers'] as $nm)
            {
                $number = Number::where('number', $nm)->first();
    
                if(isset($number->order_id)) {
                    return response('Номер ' . $number->number . ' уже был кем-то куплен', 500);
                }
            }

            $order->price += $cart['pretty']['price'];
        }
        
        $order->save();

        if(isset($cart['pretty']))
        {
            foreach($cart['pretty']['numbers'] as $nm)
            {
                $number = Number::where('number', $nm)->first();
                $number->order_id = $order->id;
                $number->save();
            }
        }

        session()->forget('simple-cart');
        session()->forget('pretty-cart');

        return $this->proceedPayment($order);
    }

    public function proceedPayment($order)
    {
        $settings = Setting::find(1);
        
        $receiptData = array();

        if(isset($order->description['simple']))
        {
            $sumQuantity = 0;
            foreach($order->description['simple']['plans'] as $plan) {
                $sumQuantity += $plan['quantity'];
            }

            array_push($receiptData, array(
                'description' => 'SIM-карта с доставкой',
                'quantity' => $sumQuantity,
                'amount' => array(
                    'value' => $order->description['simple']['price'],
                    'currency' => 'RUB',
                ),
                'vat_code' => 1,
                'payment_mode' => 'full_payment',
                'payment_subject' => 'commodity',
                'country_of_origin_code' => 'RU',
            ));
        }

        if(isset($order->description['pretty']))
        {
            array_push($receiptData, array(
                'description' => 'SIM-карта с доставкой',
                'quantity' => count($order->description['pretty']['numbers']) + '.000',
                'amount' => array(
                    'value' => $order->description['pretty']['price'],
                    'currency' => 'RUB',
                ),
                'vat_code' => 1,
                'payment_mode' => 'full_payment',
                'payment_subject' => 'commodity',
                'country_of_origin_code' => 'RU',
            ));
        }

        $data = array(
            'amount' => array(
                'value' => $order->price,
                'currency' => 'RUB',
            ),
            'capture' => true,
            'confirmation' => array(
                'type' => 'redirect',
                'return_url' => 'https://migrantmobile.com/order-confirmed/' . $order->uid,
            ),
            'description' => 'Заказ №' . $order->id,
            'metadata' => array(
                 'order_id' => $order->id,
            ),
            'receipt' => array(
                'customer' => array(
                    'full_name' => $order->last_name . ' ' . $order->middle_name . ' ' . $order->first_name,
                    'phone' => $order->phone,
                    // 'email' => 'email@email.net',
                ),
                'payment_id' => $order->payment_id,
                'type' => 'payment',
                'send' => true,
                'items' => $receiptData,
                'settlements' => array(
                    array(
                    'type' => 'cashless',
                    'amount' => array(
                        'value' => $order->price,
                        'currency' => 'RUB',
                    )
                    )
                ),
                uniqid('', true)
            )
        );
         
        $data = json_encode($data, JSON_UNESCAPED_UNICODE);
             
        $ch = curl_init('https://api.yookassa.ru/v3/payments');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_USERPWD, "$settings->yookassa_shop_id:$settings->yookassa_secret_key");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Idempotence-Key: ' . $order->uid));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 	
        $res = curl_exec($ch);
        curl_close($ch);	
            
        $res = json_decode($res, true);
        return response($data, 500);
        if($res)
        {
            $order->payment_id = $res['id'];
            $order->save();
    
            return $res['confirmation']['confirmation_url'];
        }  
    }

    public function orderConfirmed($uid)
    {
        $order = Order::where('uid', $uid)->first();

        $order->save();

        return view('order-confirmed', compact('order'));
    }

    public function notificationFromYookassa(Request $request)
    {
        $notification = $request->object;

        $order = Order::where('payment_id', $notification['id'])->first();

        $order->is_paid = true;

        $order->save();

        return response('OK', 200);
    }

    public function CheckStockQuantity($planFromOrder)
    {
        $plan = Plan::where('name', $planFromOrder['name'])->first();

        if($planFromOrder['quantity'] <= $plan->in_stock)
        {
            return true;
        }

        return false;
    }

    public function ProcessStockQuantity($planFromOrder)
    {
        $plan = Plan::where('name', $planFromOrder['name'])->first();

        if($planFromOrder['quantity'] <= $plan->in_stock)
        {
            $plan->in_stock = $plan->in_stock - $planFromOrder['quantity'];
            $plan->save();
            return true;
        }

        return false;
    }
}
