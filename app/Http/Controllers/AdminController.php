<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Redirector;
use App\Admin;
use App\User;
use Auth;
use Redirect;

class AdminController extends Controller
{
    public function index(){
        return view('admin.admin_login');
    }

    public function show_dashboard(){
        return view('admin.dashbord');
    }

    public function dashboard(Request $request){
        $this->validate($request, [
            'admin_email' => ['required', 'string', 'email', 'max:255'],
            'admin_password' => ['required', 'string', 'min:8'],
        ]);
        $userdata = array(
            'email' => $request->input('admin_email') ,
            'password' => $request->input('admin_password')
        );
        // attempt to do the login
        if (Auth::attempt($userdata)){
            return redirect::to('/dashbord');
        }
        
        return redirect()->back()->with('errors','Email Or Password faux');
    }

    public function registerIndex(){
        return view('admin_register');
    }

    public function registerDashboard(Request $request){
        $this->validate($request, [
            'admin_email' => ['required', 'string', 'email', 'max:255'],
            'admin_password' => ['required', 'string', 'min:8', 'confirmed'],
            'admin_name' => ['required', 'string', 'max:255'],
        ]);
        $user = Admin::create([
            'admin_name' => $request->input('admin_name'),
            'admin_email' => $request->input('admin_email'),
            'admin_password' => Hash::make($request->input('admin_password')),
            'admin_phone' => $request->input('admin_phone'),
        ]);
        return redirect::to('/dashbord');
    }

    public function doLogout(){
        Auth::logout(); // logging out user
        return Redirect::to('/admin'); // redirection to login screen
    }
}
