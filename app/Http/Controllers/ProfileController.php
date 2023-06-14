<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Response;


class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function profile()
    {
        // Get user data
        $userData = [
            'name' => session('user_name'),
            'email' => session('user_email'),
            'address' => session('user_address'),
            'phone_number' => session('user_phone_number')
        ];

        // Generate the QR code image using the user data
        $qrCode = QrCode::size(250)->generate(json_encode($userData));

        // Pass the QR code image and user data to the view
        return view('profile', [
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

