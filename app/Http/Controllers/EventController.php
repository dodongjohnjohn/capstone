<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http; // Add this line to import the Http facade

class EventController extends Controller
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
    public function index()
    {
        $events = Event::paginate(10);

        if (Auth()->user()->role == 'admin') {
            return view('admindash.eventfolder.event', ['events' => $events]);
        } else if (Auth()->user()->role == 'manager') {
            return view('admindash.eventfolder.event', ['events' => $events]);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_event()
    {
        if (Auth::check()) {
            $members = User::paginate(6);
            return view('admindash.eventfolder.create', compact('members'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $storeData = $request->validate([
        'organizer' => 'required|max:255',
        'title' => 'required|max:255',
        'description' => 'required|max:255',
        'address' => 'required|max:255',
        'time' => 'required|max:255',
        'date' => 'required|max:255',
    ]);
    $event = Event::create($storeData);

    // Get the phone numbers to send SMS to
    $phoneNumbers = $request->input('phone_numbers');

    // Build the message using the input data
    $message = "Organizer: " . $request->input('organizer') . "\n";
    $message = "Title: " . $request->input('title') . "\n";
    $message .= "Description: " . $request->input('description') . "\n";
    $message .= "Location: " . $request->input('address') . "\n";
    $message .= "Time: " . date('h:i A', strtotime($request->input('time'))) . "\n";
    $message .= "Date: " . $request->input('date');

    // Send SMS to each phone number
    foreach ($phoneNumbers as $phoneNumber) {
        $response = Http::post('https://api.semaphore.co/api/v4/messages', [
            'apikey' => '8a9b4ff3724e849c28872c3ed486f3ae',
            'number' => $phoneNumber,
            'message' => $message,
        ]);

        // Process the response if needed
    }

    return redirect('event');
}




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admindash.eventfolder.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Event::whereId($id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'address' => $request->address,
            'time' => $request->time,
            'date' => $request->date
        ]);

        return redirect('/event')->with('completed', 'Event has been updated!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function search(Request $request)
    {
        $query = $request->input('query');



    $events = Event::where('title', 'LIKE', "%$query%")
        ->orWhere('description', 'LIKE', "%$query%")
        ->orWhere('organizer', 'LIKE', "%$query%")
        ->orWhere('address', 'LIKE', "%$query%")
        ->orWhere('time', 'LIKE', "%$query%")
        ->orWhere('date', 'LIKE', "%$query%")
        ->paginate(6);

    $noResults = count($events) == 0;

    return view('admindash.eventfolder.event', compact('events', 'noResults'));
}
public function destroy($id)
{
    $event = Event::findOrFail($id);
    
    // Perform any additional checks or validations if needed before deleting the event
    
    $event->delete();

    return redirect('/event')->with('completed', 'Event has been deleted!');
}
}