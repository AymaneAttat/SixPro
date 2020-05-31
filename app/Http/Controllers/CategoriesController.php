<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Category;
use App\User;

class CategoriesController extends Controller
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
        $arr['categories'] = Category::orderBy('created_at','desc')->paginate(5);
        return view('categories.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);
        
        $category = new Category;
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->status = $request->input('status');
        $category->save();
        return redirect()->route('categories.index')->withSuccessMessage('Categories Created');
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
        $arr['category'] = Category::find($id);
        return view('categories.edit')->with($arr);
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
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);
        
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->status = $request->input('status');
        $category->save();
        return redirect()->route('categories.index')->withSuccessMessage('Categories Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('categories.index')->withSuccessMessage('Categories Deleted');
    }
}
