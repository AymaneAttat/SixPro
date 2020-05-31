<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Product;
use Auth;
use Redirect;

class CartController extends Controller
{
  public function __construct()
  {    
        $this->middleware('auth');
  }
  
  public function shop()
  {
      if( session('success_message') ){
        Alert::success('Success', session('success_message'));
      }
      $products = Product::all();
      /* dd($products); */
      return view('cart.shop')->withTitle('E-COMMERCE STORE | SHOP')->with(['products' => $products]);
  }

  public function cart()  {
      if( session('success_message') ){
        Alert::toast(session('success_message'),'Toast Type' );
      }
      $cartCollection = \Cart::getContent();
      /* dd($cartCollection); */
      return view('cart.cart')->withTitle('E-COMMERCE STORE | CART')->with(['cartCollection' => $cartCollection]);
  }

  public function add(Request $request){
    \Cart::add(array(
        'id' => $request->id,
        'name' => $request->name,
        'price' => $request->price,
        'quantity' => $request->quantity,
        'attributes' => array(
        'image' => $request->img,
        'slug' => $request->slug
        )
    ));
    return redirect()->route('cart.index')->withSuccessMessage('Item is Added to Cart!');
  }

  public function remove(Request $request){
    \Cart::remove($request->id);
    return redirect()->route('cart.index')->withSuccessMessage('Item is removed!');
  }

  public function update(Request $request){
      \Cart::update($request->id,
          array(
              'quantity' => array(
              'relative' => false,
              'value' => $request->quantity
              ),
      ));
      return redirect()->route('cart.index')->withSuccessMessage('Cart is Updated!');
  }

  public function clear(){
    \Cart::clear();
    return redirect()->route('cart.index')->withSuccessMessage('Cart is cleared!');
  }

  public function checkout(){
    return view('cart.checkout');
  }
}