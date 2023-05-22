<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
       public function index(){
        return view('admin.index');
       }
       public function confirmAdminLogin(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::attempt($credentials)) {
            return redirect()->route('admindashboard');
        }
        else{
            return redirect()->back()->withErrors([
                'error' => 'Invalid email or password.',
            ]);   
        }
       }

       public function adminDashboard(Request $request){
        $users=DB::table('users')
        ->leftJoin('multi_step_form','multi_step_form.user_id','users.id')
        ->select('users.id as userId','users.name','users.email','multi_step_form.company_name','multi_step_form.company_stage'
        ,'multi_step_form.company_phone','multi_step_form.country_name','city_name','website_name','contact_name',
        'contact_email','contact_phone')
         ->where('users.user_type',2)
        ->get();
    //dd($users);
           return view('admin.dashboard',compact('users'));
       }
       

       public function adminlogout(){
        Auth::logout();
        return redirect()->route('adminindex');     
       }
}
