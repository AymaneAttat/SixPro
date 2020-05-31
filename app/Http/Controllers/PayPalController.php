<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use Srmklive\PayPal\Services\AdaptivePayments;
use RealRashid\SweetAlert\Facades\Alert;
use App\Order;
use App\User;

class PayPalController extends Controller
{
    public function getExpressCheckout($orderId){
        // $cartItems = [
        //    [
        //        'name' => 'Product 1',
        //        'price' => 9.99,
        //        'qty' => 1,
        //    ],
        //    [
        //        'name' => 'Product 2',
        //        'price' => 4.99,
        //        'qty' => 2,
        //    ],
        // ];
        $checkoutData = $this->checkoutData($orderId);
        //dd($checkoutData);
        $provider = new ExpressCheckout;
        $response = $provider->setExpressCheckout($checkoutData);
        return redirect($response['paypal_link']);
    }

    public function checkoutData($orderId){
        $cartItem = [];
        foreach(\Cart::getContent() as $item){
            
                $cartItem = array_map(function($item){
                    return [
                        'name' => $item['name'] ,
                        'price' => $item['price'],
                        'qty' => $item['quantity']
                    ];
                },\Cart::getContent()->toarray());
            
        }
        
        $checkoutData = [
            'items' => $cartItem,   
            'return_url' => route('paypal.success',$orderId),
            'cancel_url' => route('paypal.cancel'),
            'invoice_id' => uniqid(),
            'invoice_description' => 'Order description',
            'total' => \Cart::getTotal()
        ];
        return $checkoutData;
    }

    public function CancelPage(){

    }

    public function getExpressCheckoutSuccess(Request $request, $orderId){
        $token = $request->get('token');
        $payerId = $request->get('PayerID');
        //dd($token);
        $provider = new ExpressCheckout;
        $checkoutData = $this->checkoutData($orderId);
        //dd($checkoutData);
        $response = $provider->getExpressCheckoutDetails($token);
        //dd($response);
        if(in_array(strtoupper($response['ACK']),['SUCCESS','SUCCESSWITHWARNING'])){
            $payment_status = $provider->doExpressCheckoutPayment($checkoutData, $token, $payerId);
            //dd($payment_status);
            $status = $payment_status['PAYMENTINFO_0_PAYMENTSTATUS'];
            //dd($status);
            //if(in_array($status,['Completed','Processed'])){}
            $order = Order::findOrFail($orderId);
            $order->is_paid = 1;
            $order->status = 'completed';
            $order->save();
            \Cart::clear();
            return redirect()->route('shop')->withSuccessMessage('Payment successfull');        
        }
        return redirect()->route('shop')->withSuccessMessage('Payment unsuccessfull something went wrong');
    }
}
