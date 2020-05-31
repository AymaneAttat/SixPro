<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Product;
use App\Category;
use App\Manufacture;
use App\User;
use App\Order;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('start','category','show','showPro');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function start(){
        $arr['product'] = Product::where('status', '1')->get();
        $arr['category'] = Category::where('status','1')->get();
        $arr['manufact'] = Manufacture::where('status','1')->get();
        return view('home.index')->with($arr);
    }
    public function category(){
        $arr['product'] = Product::where('status', '1')->get();
        $arr['category'] = Category::where('status','1')->get();
        $arr['manufact'] = Manufacture::where('status','1')->get();
        return view('home.category')->with($arr);
    }
    public function show($id){
        $category = Category::findOrFail($id);
        $product = Product::where('category_id',$category->id)->get();
        return view('home.showCatPro',compact('category','product'));
    }
    public function showPro($id){
        $pro = Product::findOrFail($id);
        $product = Product::where('category_id',$pro->category_id)->get();
        return view('home.showPro',compact('pro','product'));
    }
    public function orderClient()
    {
        $arr['orders'] = Order::where('status' , 'completed')->orderBy('created_at','desc')->paginate(5);
        return view('order.order')->with($arr);
    }
}
