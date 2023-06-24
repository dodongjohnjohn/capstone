<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Donation;
use App\Models\User;



class DonationController extends Controller
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
    public function index(Request $request)
    {
        
        $search = $request->input('search');
        $donations = Donation::when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%')
                         ->orWhere('email', 'like', '%' . $search . '%')
                         ->orWhere('listers_name', 'like', '%' . $search . '%');
        })->paginate(10);
    
        return view('admindash.donationfolder.donation', ['donations' => $donations]);
    }
    

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $name = $user->name;
        return view('admindash.donationfolder.create_donation', compact('name'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'listers_name' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email',
            'amount' => 'required|numeric|min:0',
            'phone_number' => 'required|string',
        ]);
    
        $donation = new Donation;
        $donation->listers_name = $request->input('listers_name');
        $donation->name = $request->input('name');
        $donation->email = $request->input('email');
        $donation->amount = $request->input('amount');
        $donation->save();
    
        // Send SMS to the donor
        $donorName = $request->input('name');
        $donorAmount = $request->input('amount');
        $donorPhone = $request->input('phone_number');
    
        // Build the SMS message
        $message = 'We have received your donation ' . $donorAmount . ' Thank you, ' . $donorName . ', for your generous donation!';
    
        // Send SMS using Semaphore
        $response = Http::post('https://api.semaphore.co/api/v4/messages', [
            'apikey' => '8a9b4ff3724e849c28872c3ed486f3ae',
            'number' => $donorPhone,
            'message' => $message,
        ]);
    
        // Check if the SMS was sent successfully
        if ($response->successful()) {
            // SMS sent successfully
            return redirect()->route('donation.index')->with('success', 'Donation created successfully! SMS sent to donor.');
        } else {
            // Error sending SMS
            return redirect()->route('donation.index')->with('error', 'Donation created successfully, but failed to send SMS to donor.');
        }
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
    $donation = Donation::find($id);
    return view('admindash.donationfolder.edit_donation', compact('donation'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'listers_name' => 'required|string',
        'name' => 'required|string',
        'email' => 'required|email',
        'amount' => 'required|numeric|min:0',
    ]);

    $donation = Donation::find($id);
    $donation->listers_name = $request->input('listers_name');
    $donation->name = $request->input('name');
    $donation->email = $request->input('email');
    $donation->amount = $request->input('amount');
    $donation->save();

    return redirect()->route('donation.index')->with('success', 'Donation updated successfully!');
}
public function destroy($id)
    {
        Donation::destroy($id);
        return redirect()->back()->with('success', 'Event deleted successfully.');
    }

}
