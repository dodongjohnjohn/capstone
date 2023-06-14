<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Donation;
use App\Models\Attendance;
use App\Models\Group;
use App\Models\Event;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $totalMembers = User::count();
        $totalDonations = Donation::sum('amount');
        $totalGroups = Group::count();
        $attendancePercentage = Attendance::count();
   

        // Fetch the events from the database or any other data source
    
        return view('admindash.dashboard', compact('totalMembers', 'totalDonations', 'totalGroups', 'attendancePercentage'));
    }
}

