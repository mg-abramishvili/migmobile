<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Number;
use App\Models\Setting;
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
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'numbers' => 'required',
        ]);

        $numbers = $request->numbers;

        foreach($numbers as $nm)
        {
            $number = Number::where('number', $nm)->first();

            if(isset($number->order_id)) {
                return response('Номер ' . $number->number . ' уже был кем-то куплен', 500);
            }
        }

        function gen_uuid() {
            return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
                mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
                mt_rand( 0, 0xffff ),
                mt_rand( 0, 0x0fff ) | 0x4000,
                mt_rand( 0, 0x3fff ) | 0x8000,
                mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
            );
        }

        $order = new Order();
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->uid = gen_uuid();
        $order->is_paid = false;
        $order->save();

        foreach($numbers as $nm)
        {
            $number = Number::where('number', $nm)->first();
            $number->order_id = $order->id;
            $number->save();
        }

        return $this->proceedPayment($order);
    }

    public function proceedPayment($order)
    {
        $settings = Setting::find(1);
        
        $data = array(
            'amount' => array(
                'value' => 790,
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
        // print_r($res);
        return $res['confirmation']['confirmation_url'];
    }

    public function orderConfirmed($uid)
    {
        $order = Order::where('uid', $uid)->with('numbers')->first();

        session()->forget('simple-cart');
        session()->forget('pretty-cart');

        return view('order-confirmed', compact('order'));
    }
}
