<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\User;
use App\Order;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'address' => 'required',
            'zipcode' => 'required',
            'notes' => 'required'
        ]);
        $order = new Order;
        $order->order_number = uniqid('OrderNumber-');
        $order->name = $request->input('name');
        $order->city = $request->input('city');
        $order->address = $request->input('address');
        $order->phone = $request->input('phone');
        $order->zipcode = $request->input('zipcode');
        $order->grand_total = \Cart::getTotal();
        $order->item_count = \Cart::getContent()->count();
        $order->user_id = Auth()->user()->id;
        $order->payment_method = $request->input('payment_method');
        $order->notes = $request->input('notes');
        $order->save();
        $cartCollection = \Cart::getContent();
        foreach($cartCollection as $item){
            $order->items()->attach($item->id, ['price' => $item->price, 'quantity' => $item->quantity]);
        }
        if(request('payment_method') == 'paypal'){
            
            return redirect()->route('paypal.checkout',$order->id);
        }
        \Cart::clear();
        return redirect()->route('shop')->withSuccessMessage('Order Has Been Placed');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
