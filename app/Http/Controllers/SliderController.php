<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Product;
use App\Category;
use App\Manufacture;
use App\User;
use App\Slider;

class SliderController extends Controller
{
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
        $arr['sliders'] = Slider::orderBy('created_at','desc')->paginate(5);
        return view('slider.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slider.create');
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
            'status' =>'required',
            'image' => 'image|max:10000'
        ]);
        $image = $request->image;
        if($image){
            $imageName = $image->getClientOriginalName();
            $image->move('images',$imageName);
            $formInput['image'] = $imageName;
        }
        Slider::create($formInput);
        return redirect()->route('slider.index')->withSuccessMessage('Slider Created');
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
        $sli = Slider::findOrFail($id);
        return view('slider.edit',compact('sli'));
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
            'status' =>'required',
            'image' => 'image|max:10000'
        ]);
        $sli = Slider::findOrFail($id);
        $sli->status = $request->input('status');
        if($request->hasFile('image')){
            $image = $request->image;
            $imageName = $image->getClientOriginalName();
            $image->move('images',$imageName);
            $sli->image = $imageName;
        }
        $sli->save();
        return redirect()->route('slider.index')->withSuccessMessage('Slider Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sli = Slider::find($id);
        if($sli->image){
            Storage::delete('public/images/'.$sli->image);
        }
        $sli->delete();
        return redirect()->route('slider.index')->withSuccessMessage('Slider Destroy');
    }
}
