<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\MultiStepForm;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Dompdf\Dompdf;

class UserController extends Controller
{
   public function index(){
    return view('auth.index');
   }
   public function signup(){
    return view('auth.signup');
   }
   public function confirmSignUp(Request $request){

    $request->validate([
        'username' => 'required',
        'email' => 'required|email|unique:users',
        'user_type' => 'required',
        'password' => 'required|min:4',
    ]);
    $user=User::create([
   
        'name' => $request->input('username'),
        'email' => $request->input('email'),
        'address' => $request->input('address'),
        'user_type' => $request->input('user_type'),
        'password' => Hash::make($request->input('password')),
    ]);
    return redirect()->route('signup')->with('success', 'Registration successful!');
   }

   public function confirmLogin(Request $request){
   // dd($request->all());
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
    
      $checkCondition=DB::table('multi_step_form')->where('user_id',Auth::user()->id)->first();
      
       if(empty($checkCondition->company_name) && empty($checkCondition->company_stage) && empty($checkCondition->company_phone)) {
        return redirect()->route('dashboard');
       }
    //    //for step 2 form
       else if(empty($checkCondition->country_name) && empty($checkCondition->city_name) && empty($checkCondition->website_name)){
        return redirect()->route('step2');
       }

    //   //for step 3 form
       else if(empty($checkCondition->contact_name) && empty($checkCondition->contact_email) && empty($checkCondition->contact_address)){
        return redirect()->route('step3');
       }

       else{
        return redirect()->route('downloadPDF');
       }
        // Authentication successful
        // echo 'Authentication successful';
    }
    else{ 
    // Authentication failed
    return redirect()->back()->withErrors([
        'login_failed' => 'Invalid email or password.',
    ]);
    }
   }

   public function dashboard(Request $request){
    return view('dashboard');

   }
   public function confirmstep1(Request $request){
 
      MultiStepForm::create([
        'user_id' => Auth::user()->id,
        'company_name' => $request->input('company_name'),
        'company_stage' => $request->input('company_stage'),
        'company_phone' => $request->input('company_phone')
     ]);
    return redirect()->route('step2');
    
   }

   public function step2(Request $request){

    return view('step2');
   }

   public function confirmstep2(Request $request){
    $step2Form=MultiStepForm::where('user_id',Auth::user()->id)->firstOrFail();
    $step2Form->country_name=$request->input('country_name');
    $step2Form->city_name=$request->input('city_name');
    $step2Form->website_name=$request->input('website_name');
    $step2Form->save();  
    return redirect()->route('step3');
    
   }

   public function step3(Request $request){
    return view('step3');
   }

   public function confirmstep3(Request $request){
    $step3Form=MultiStepForm::where('user_id',Auth::user()->id)->firstOrFail();
    $step3Form->contact_name=$request->input('contact_name');
    $step3Form->contact_email=$request->input('contact_email');
    $step3Form->contact_phone=$request->input('contact_phone');
    $step3Form->save();  
    return redirect()->route('downloadPDF');

    
   }
   
   public function downloadPDFPage(){
   return view ('final');
   }

   public function confirmDownloadPDF(Request $request){
     $details=DB::table('multi_step_form')  
     ->join('users','users.id' ,'=', 'multi_step_form.user_id')
     ->where('user_id',Auth::user()->id)->first();
 

    $pdfContent = '<ul>';
    $pdfContent .= '<li>User Name: ' . $details->name . '</li>';
    $pdfContent .= '<li>Company Name: ' . $details->company_name . '</li>';
    $pdfContent .= '<li>Company Stage: ' .$details->company_stage. '</li>';
    $pdfContent .= '<li>Company Phone: ' . $details->company_phone . '</li>';
    $pdfContent .= '<li>Country Name: ' . $details->country_name. '</li>';
    $pdfContent .= '<li>City Name: ' . $details->city_name . '</li>';
    $pdfContent .= '<li>Website Name: ' . $details->website_name . '</li>';
    $pdfContent .= '<li>Contact Name: ' . $details->contact_name . '</li>';
    $pdfContent .= '<li>Contact Email: ' . $details->contact_email . '</li>';
    $pdfContent .= '<li>Contact Phone: ' . $details->contact_phone . '</li>';
    $pdfContent .= '</ul>';

    // Create a new instance of Dompdf
    $dompdf = new Dompdf();

    // Load HTML content into Dompdf
    $dompdf->loadHtml($pdfContent);

    // (Optional) Set paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the PDF content
    $dompdf->render();

    // Generate the PDF file name
    $fileName = 'details.pdf';

    // Output the PDF file for download
    return $dompdf->stream($fileName);
   }
   public function logout(){
    Auth::logout();
    return redirect()->route('index') ;
   }
}
