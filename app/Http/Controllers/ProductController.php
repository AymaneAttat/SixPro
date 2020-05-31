<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Product;
use App\Category;
use App\Manufacture;
use App\User;

class ProductController extends Controller
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
        if( session('success_message') ){
            Alert::success('Success Title', session('success_message'));
        }
        $arr['product'] = Product::orderBy('created_at','desc')->paginate(5);
        return view('produits.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['category'] = Category::where('status','1')->get();
        $arr['manufact'] = Manufacture::where('status','1')->get();
        return view('produits.create')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formInput = $request->except('image');
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'prix' => 'required',
            'size' => 'required',
            'color' => 'required',
            'category_id' => 'required',
            'manufacture_id' => 'required',
            'image' => 'image|max:10000'
        ]);
        $image = $request->image;
        if($image){
            $imageName = $image->getClientOriginalName();
            $image->move('images',$imageName);
            $formInput['image'] = $imageName;
        }
        Product::create($formInput);
        return redirect()->route('produits.index')->withSuccessMessage('Product Created');
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
        $arr['pro'] = Product::findOrFail($id);
        $arr['category'] = Category::where('status','1')->get();
        $arr['manufact'] = Manufacture::where('status','1')->get();
        return view('produits.edit')->with($arr);
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
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'prix' => 'required',
            'size' => 'required',
            'color' => 'required',
            'category_id' => 'required',
            'manufacture_id' => 'required',
            'image' => 'image|max:10000'
        ]);
        
        $pro = Product::find($id);
        $pro->name = $request->input('name');
        $pro->description = $request->input('description');
        $pro->status = $request->input('status');
        $pro->prix = $request->input('prix');
        $pro->size = $request->input('size');
        $pro->color = $request->input('color');
        $pro->category_id = $request->input('category_id');
        $pro->manufacture_id = $request->input('manufacture_id');
        $pro->DetailDescription = $request->input('DetailDescription');
        $pro->shipping_cost = $request->input('shipping_cost');
        if($request->hasFile('image')){
            $image = $request->image;
            $imageName = $image->getClientOriginalName();
            $image->move('images',$imageName);
            $pro->image = $imageName;
        }
        $pro->save();
        return redirect()->route('produits.index')->withSuccessMessage('Product Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pro = Product::find($id);

        if($pro->image){
            Storage::delete('public/images/'.$pro->image); //Delete Image
        }
        $pro->delete();
        return redirect()->route('produits.index')->withSuccessMessage('Product Destroyed');
    }
}
