<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function registration()
    {
     
            return view('login_register.registration');
        }
    

    
 




    public function insert(Request $request)
    {
     

         $name = $request->input('name');
         $email = $request->input('email');
         $password = $request->input('password');
         $address = $request->input('address');
         $phone_number = $request->input('phone_number');

       
            $inInsertSucccess = User::insert(['name'=>$name, 'email'=>$email, 'password'=>Hash::make($password), 'address'=>$address, 'phone_number'=>$phone_number]);

    
      
            if($inInsertSucccess) {
                return redirect()->back()->with('success','Registration completed you can now login');
            } else {
               return redirect('login_register.registration')->with('success','Registration completed you can now login');
            }
          
       }
   
   
}
