<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\User;
use App\Models\Event;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function user_group()
{
    $groups = Group::paginate(8);
    $users = User::all();
    return view('userdash.user_group', compact('groups', 'users'));
}
public function user_event()
{
    $events = Event::paginate(5); // Change '10' to the number of events you want to display per page
    return view('userdash.user_event', compact('events'));
}
public function user_donation()
{
    $totalDonations = Donation::sum('amount');
    $donations = Donation::paginate(5); // Change '10' to the number of events you want to display per page
    return view('userdash.user_donation', compact('donations', 'totalDonations'));
}

 public function profile()
    {
        // Get user data from session
        $userData = [
            'name' => session('user_name'),
            'email' => session('user_email'),
            'address' => session('user_address'),
            'phone_number' => session('user_phone_number')
        ];

        // Generate the QR code image using the user data
        $qrCode = QrCode::size(250)->generate(json_encode($userData));

        // Pass the QR code image and user data to the view
        return view('userdash.user_profile', [
            'qrCode' => $qrCode,
            'userData' => $userData
        ]);
    }

    public function downloadQR()
    {
        // Get user data from session
        $userData = [
            'name' => session('user_name'),
            'email' => session('user_email'),
            'address' => session('user_address'),
            'phone_number' => session('user_phone_number')
        ];

        // Generate the QR code image using the user data
        $qrCode = QrCode::size(250)->generate(json_encode($userData));

        // Set the headers for the response
        $headers = [
            'Content-Type' => 'image/svg+xml',
            'Content-Disposition' => 'attachment; filename="qr-code.svg"'
        ];

        // Return the response with the QR code image
        return Response::make($qrCode, 200, $headers);
    }
}