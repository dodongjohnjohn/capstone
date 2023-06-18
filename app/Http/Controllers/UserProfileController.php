<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Response;

class UserProfileController extends Controller
{
    public function user_profile()
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
        return view('main_user', [
            'qrCode' => $qrCode,
            'userData' => $userData
        ]);
    }
}
