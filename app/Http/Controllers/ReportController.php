<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\User;
use App\Models\Donation;
use Carbon\Carbon;
use App\Models\Group;
use App\Models\Attendance;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        // Check if it's a print request
        $isPrintRequest = $request->query('print') === 'true';

        $members = User::all();
        $donations = Donation::all();
        $attendanceCount = Attendance::count();
        
        $totalMembers = User::count();
        $totalDonations = Donation::sum('amount');
        $attendancePercentage = Attendance::count();
    
        return view('report', compact('totalMembers', 'totalDonations', 'attendancePercentage', 'members', 'donations', 'isPrintRequest'));
    }
}

