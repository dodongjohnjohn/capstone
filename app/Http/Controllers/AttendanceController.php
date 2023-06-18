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
public function printAttendanceRecords($eventId)
{
    // Retrieve the event and attendance records
    $event = Event::findOrFail($eventId);
    $attendance = Attendance::where('event_id', $eventId)->get();

    // Create a new TCPDF instance
    $pdf = new TCPDF();

    // Set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Your Name');
    $pdf->SetTitle('Attendance Records');
    $pdf->SetSubject('Attendance Records');

    // Add a page
    $pdf->AddPage();

    // Generate the PDF content for Time In records
    $html = '<h1>Attendance Records - ' . $event->title . ' (Time In)</h1>';
    $html .= '<table>';

    // Add the column names to the table header
    $html .= '<tr>';
    $html .= '<th><strong>Name</strong></th>';
    $html .= '<th><strong>Time</strong></th>';
    $html .= '</tr>';

    foreach ($attendance as $record) {
        if ($record->time_type === 'time_in') {
            $html .= '<tr>';
            $html .= '<td>' . $record->name . '</td>';
            $html .= '<td>' . $record->time . '</td>';
            $html .= '</tr>';
        }
    }

    $html .= '</table>';

    // Write the HTML content to the PDF
    $pdf->writeHTML($html, true, false, true, false, '');

    // Add a new page for Time Out records
    $pdf->AddPage();

    // Generate the PDF content for Time Out records
    $html = '<h1>Attendance Records - ' . $event->title . ' (Time Out)</h1>';
    $html .= '<table>';

    // Add the column names to the table header
    $html .= '<tr>';
    $html .= '<th><strong>Name</strong></th>';
    $html .= '<th><strong>Time</strong></th>';
    $html .= '</tr>';

    foreach ($attendance as $record) {
        if ($record->time_type === 'time_out') {
            $html .= '<tr>';
            $html .= '<td>' . $record->name . '</td>';
            $html .= '<td>' . $record->time . '</td>';
            $html .= '</tr>';
        }
    }

    $html .= '</table>';

    // Write the HTML content to the PDF
    $pdf->writeHTML($html, true, false, true, false, '');

    // Output the PDF to the browser for printing
    $pdf->Output('attendance_records.pdf', 'I');
}


}
