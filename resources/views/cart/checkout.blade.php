@extends('layouts.welcom')
@section('content')
<div id="breadcrumb" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="breadcrumb-header">Checkout</h3>
                <ul class="breadcrumb-tree">
                    <li><a href="/">Home</a></li>
                    <li class="active">Checkout</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <form action="{{route('order.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-7">
                    <!-- Billing Details -->
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">Shipping Information</h3>
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="name" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="address" placeholder="Address">
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="city" placeholder="City">
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="zipcode" placeholder="ZIP Code">
                        </div>
                        <div class="form-group">
                            <input class="input" type="number" name="phone" placeholder="Telephone">
                        </div>
                        <div class="order-notes">
                            <textarea class="input" name="notes" placeholder="Order Notes"></textarea>
                        </div>
                    </div>
                </div>
                <!-- Order Details -->
                <div class="col-md-5 order-details">
                    <div class="section-title text-center">
                        <h3 class="title">Your Order</h3>
                    </div>
                    <div class="order-summary">
                        <div class="order-col">
                            <div><strong>PRODUCT</strong></div>
                            <div><strong>TOTAL</strong></div>
                        </div>
                        @foreach(\Cart::getContent() as $item)
                            <div class="order-products">
                                <div class="order-col">
                                    <div>{{$item->quantity}}x {{$item->name}}</div>
                                    <div>${{ \Cart::get($item->id)->getPriceSum() }}</div>
                                </div>
                            </div>
                        @endforeach
                        <div class="order-col">
                            <div>Shiping</div>
                            <div><strong>FREE</strong></div>
                        </div>
                        <div class="order-col">
                            <div><strong>TOTAL</strong></div>
                            <div><strong class="order-total">${{ \Cart::getTotal() }}</strong></div>
                        </div>
                    </div>    
                    <div class="payment-method">
                        <div class="input-radio">
                            <input type="radio" name="payment_method" value="cash_delivery" id="payment-1">
                            <label for="payment-1">
                                <span></span>
                                Cash on delevery
                            </label>
                            <div class="caption">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                        <div class="input-radio">
                            <input type="radio" name="payment_method" value="paypal" id="payment-3">
                            <label for="payment-3">
                                <span></span>
                                Paypal System
                            </label>
                            <div class="caption">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="primary-btn order-submit">Place order</button>
                </div>
                <!-- /Order Details -->
            </div><!-- /row -->
        </form>
    </div><!-- /container -->
</div>
@endsection