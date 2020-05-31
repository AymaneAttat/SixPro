<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Manufacture;
use App\Category;
use App\User;

class ManufactureController extends Controller
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
        $arr['manufact'] = Manufacture::orderBy('created_at','desc')->paginate(5);
        return view('manufacture.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manufacture.create');
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
        
        $manufact = new Manufacture;
        $manufact->name = $request->input('name');
        $manufact->description = $request->input('description');
        $manufact->status = $request->input('status');
        $manufact->save();
        return redirect()->route('manufacture.index')->withSuccessMessage('Manufacture Created');
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
        $arr['manufact'] = Manufacture::find($id);
        return view('manufacture.edit')->with($arr);
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
        
        $manufact = Manufacture::find($id);
        $manufact->name = $request->input('name');
        $manufact->description = $request->input('description');
        $manufact->status = $request->input('status');
        $manufact->save();
        return redirect()->route('manufacture.index')->withSuccessMessage('Manufacture Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $manufact = Manufacture::find($id);
        $manufact->delete();
        return redirect()->route('manufacture.index')->withSuccessMessage('Manufacture Destroyed');
    }
}
