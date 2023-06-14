<?php

namespace App\Http\Controllers;

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
                         ->orWhere('email', 'like', '%' . $search . '%');
        })->paginate(6);
    
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
    ]);

    $donation = new Donation;
    $donation->listers_name = $request->input('listers_name');
    $donation->name = $request->input('name');
    $donation->email = $request->input('email');
    $donation->amount = $request->input('amount');
    $donation->save();

    $donations = Donation::all();
    return redirect()->route('donation.index')->with('success', 'Donation created successfully!');

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
