<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class AccountConfirmationController extends Controller
{
    public function confirm_account()
    {
        $members = User::paginate(6);
        return view('admindash.accountconfirmation.confirm_account', compact('members'));
    }

    public function changeRole(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->role = $request->role;
        $user->save();

        return redirect()->back()->with('success', 'User role changed successfully.');
    }

    public function toggleAccountConfirmation(Request $request)
{
    $user = User::findOrFail($request->id);
    $user->account_confirmation = $request->accountConfirmation;
    $user->save();

    // Retrieve the phone number of the user
    $phoneNumber = $user->phone_number;

    // Determine the message based on the account confirmation status
    $message = $request->accountConfirmation === 'access' ? 'Your account has been confirmed. You can now login.' : 'Your account is restricted.';

    // Perform any necessary operations with the phone number
    // Example: Sending SMS using Semaphore API
    $response = Http::post('https://api.semaphore.co/api/v4/messages', [
        'apikey' => '8a9b4ff3724e849c28872c3ed486f3ae',
        'number' => $phoneNumber,
        'message' => $message,
    ]);

    return redirect()->back()->with('success', 'Account confirmation status updated successfully.');
}

}
