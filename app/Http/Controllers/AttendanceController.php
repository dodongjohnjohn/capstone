<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use  Illuminate\Support\Facades\Auth;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use TCPDF;
use Illuminate\Support\Facades\Redirect;

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function attendance()
    {
        if (Auth::check()) {
            $events = Event::paginate(6);
            
            return view('admindash.attendancefolder.attendance', compact('events'));
        }
    }


    public function add_attendance($eventId)
    {
        $event = Event::find($eventId);
        $events = Event::all(); 
        return view('admindash.attendancefolder.add_attendance', compact('event', 'events'));
    }
    public function view_attendance($eventId)
    {
        
        $event = Event::findOrFail($eventId);
    
       
        $attendance = Attendance::where('event_id', $eventId)->get();
    
       
        $groupedAttendance = $attendance->groupBy('time_type');
    
        $noResults = false;
    
        return view('admindash.attendancefolder.view_attendance', compact('event', 'groupedAttendance', 'noResults'));
    }
    



    public function store(Request $request)
    {
        $attendance = new Attendance;
        $attendance->name = $request->input('name');
        $attendance->time = $request->input('time');
        $attendance->time_type = $request->input('time_type');
        $attendance->event_id = $request->input('event_id');
        $attendance->save();

        $event = Event::all();
        return view('admindash.attendancefolder.attendance', ['events' => $event]);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $events = Event::where('title', 'LIKE', "%$search%")
        ->orWhere('description', 'LIKE', "%$search%")
        ->orWhere('address', 'LIKE', "%$search%")
        ->orWhere('time', 'LIKE', "%$search%")
        ->orWhere('date', 'LIKE', "%$search%")
        ->paginate(6);

        $noResults = count($events) == 0;

        return view('admindash.attendancefolder.attendance', compact('events', 'noResults'));
    }
    
    public function viewSearch(Request $request, $eventId)
{
    $query = $request->input('query');

    // Get the event
    $event = Event::findOrFail($eventId);

    // Get the attendance records 
    $attendance = Attendance::where('event_id', $eventId)
                             ->where('name', 'LIKE', "%$query%")
                             ->get();

    // Group the attendance records by time type
    $groupedAttendance = $attendance->groupBy('time_type');

    $noResults = count($attendance) == 0;

    
    return view('admindash.attendancefolder.view_attendance', compact('event', 'groupedAttendance', 'noResults', 'attendance'));
}

public function qrScan($eventId)
{
    $event = Event::findOrFail($eventId);
    return view('admindash.attendancefolder.qr-scan', compact('event'));
}

public function scanQR(Request $request)
{
    $attendance = new Attendance;
    $attendance->name = $request->input('name');
    $attendance->time = $request->input('time');
    $attendance->time_type = $request->input('time_type');
    $attendance->event_id = $request->input('event_id');
    $attendance->save();

    $event = Event::all();
    $events = Event::paginate(6);
    return view('admindash.attendancefolder.attendance', ['events' => $events]);
    
}
public function destroy($id)
{
    // Delete the event based on the provided ID
    Event::destroy($id);

    return redirect()->back()->with('success', 'Event deleted successfully.');
}


}
