<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use  Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\RegisterController;
use App\Models\Donation;
use App\Models\Attendance;
use function PHPUnit\Framework\returnSelf;
use App\Models\Event;
use Carbon\Carbon;

class CustomAuthController extends Controller
{
 

    public function index()
    {

        return view('login_register.login');
    }




    /*
    function validate_registration(Request $request)

    {

        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6',
            'address'  => 'required',
            'phone_number'  => 'required',
            'photo'  => 'required|image:jpg,png,jpeg.gif.svg|max:10048',
            
        ]);

        $file_name - time(). '.' . request()->photo->getClientOriginalExtension();
        request()->photo->move(public_path('images'), $photo);
        
        $photo - new photo;


    
       
        
      

        $data = $request->all();

        User::create([
            'name'      => $data['name'],
            'email'     =>  $data['email'],
            'password'  => Hash::make($data['password']),
            'address'   => $data['address'],
            'phone_number'   => $data['phone_number'],
            'photo'   => $data['photo'],

           
        ]);

        

        return redirect('/')->with('success','Rgistration completed you can now login');
        */
        public function login(Request $request)
        {
            $input = $request->all();
            $this->validate($request, [
                'email'    => 'required',
                'password' => 'required'
            ]);
        
            if (Auth::attempt(['email' => $input['email'], 'password' => $input['password']])) {
                $user = Auth::user();
                
        
                if ($user->account_confirmation == 'access') {
                    if ($user->role == 'admin') {
                        // Store user data in session
                        session([
                            'user_id' => $user->id,
                            'user_name' => $user->name,
                            'user_email' => $user->email,
                            'user_address' => $user->address,
                            'user_phone_number' => $user->phone_number,
                            'user_role' => $user->role
                        ]);
        
                        // Get dashboard data
                        $totalMembers = User::count();
                        $totalDonations = Donation::sum('amount');
                        $totalAttendance = Attendance::count();
                        $attendancePercentage = ($totalAttendance / $totalMembers) * 100;

                        $members = User::all();
                        $events = Event::all();
                        $totalDonations = Donation::sum('amount');

                        
                        $donations = Donation::select('created_at', 'amount')
                        ->whereYear('created_at', Carbon::now()->year)
                        ->get();
        
                        return view('report', compact('totalDonations', 'donations','events','members','totalMembers', 'totalDonations', 'attendancePercentage'));
                    } elseif ($user->role == 'user') {
                        // Store user data in session
                        session([
                            'user_id' => $user->id,
                            'user_name' => $user->name,
                            'user_email' => $user->email,
                            'user_address' => $user->address,
                            'user_phone_number' => $user->phone_number
                            
                        ]);
        
                        return view('userdash.user', compact('user'));
                    } elseif ($user->role == 'manager') {
                        // Store user data in session
                        session([
                            'user_id' => $user->id,
                            'user_name' => $user->name,
                            'user_email' => $user->email,
                            'user_address' => $user->address,
                            'user_phone_number' => $user->phone_number,
                            'user_role' => $user->role
                        ]);
        
                        // Get dashboard data
                        $totalMembers = User::count();
                        $totalDonations = Donation::sum('amount');
                        $totalAttendance = Attendance::count();
                        $attendancePercentage = ($totalAttendance / $totalMembers) * 100;
                        
                        $members = User::all();
                        $events = Event::all();
                        $totalDonations = Donation::sum('amount');

                        
                        $donations = Donation::select('created_at', 'amount')
                        ->whereYear('created_at', Carbon::now()->year)
                        ->get();
        
                        return view('report', compact('totalDonations', 'donations','events','members','totalMembers', 'totalDonations', 'attendancePercentage'));
                    }
                } else {
                    return redirect()->back()->withInput()->withErrors([
                        'login_failed' => "You're not authorized to login."
                    ]);
                }
            }
        
            return redirect()->back()->withInput()->withErrors([
                'login_failed' => 'Invalid login details.'
            ]);
        }
        




    /*
        function validate_login(Request $request)
        {
            $input = $request->all();
            $this->validate($request,[
                'email'    => 'required',
                'password' => 'required'
                
            ]);
    
            $credentials = $request->only('email', 'password');
    
            if(Auth::attempt(['email'=>$input['email'],'password'=>$input['password']]))
            {
    
               /* return redirect('dashboard');
               if(Auth()->user()->role == 'admin')
               {
    
                if(Auth::check())
                {
                    return view('admindash.admin');
                   
                }
               
    
               }
               else if(Auth()->user()->role == 'user')
               {
                if(Auth::check())
               {
                  return view('userdash.user');
               }
               }
    
            }
    
            return redirect('/')->with('success', 'Login details are not valid!');
    
        }*/

        public function logout()
        {
            Auth::logout();
      
    
            return redirect('/');
        }

    public function forgotPassword()
    {
        return view('login_register.forgot_password');
    }


    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $response = Password::sendResetLink($request->only('email'));

        return $response === Password::RESET_LINK_SENT
            ? back()->with('status', trans($response))
            : back()->withErrors(['email' => trans($response)]);
    }
    /////////////////////admin-menu////////////////////////////////////






    function group()
    {
        if (Auth::check()) {
            return view('admindash.group');
        }
    }

    function certificate()
    {
        if (Auth::check()) {
            return view('admindash.certificate');
        }
    }

    function report()
    {
        if (Auth::check()) {
            return view('admindash.report');
        }
    }





    ////////////////////////////////user-menu////////////////////////////////////////////////////////////////////////////////



    function user_event()
    {
        if (Auth::check()) {
            return view('userdash.user_event');
        }
    }
    function user_group()
    {
        if (Auth::check()) {
            return view('userdash.user_group');
        }
    }
    function user_certificate()
    {
        if (Auth::check()) {
            return view('userdash.user_certificate');
        }
    }
    function user_report()
    {
        if (Auth::check()) {
            return view('userdash.user_report');
        }
    }
}
