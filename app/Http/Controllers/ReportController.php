<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\User;
use App\Models\Event;
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
    
    public function index()
    {
        $members = User::all();
        $events = Event::all();
        $totalDonations = Donation::sum('amount');

        $donations = Donation::select('created_at', 'amount')
            ->whereYear('created_at', Carbon::now()->year)
            ->get();


            $totalMembers = User::count();
            $totalDonations = Donation::sum('amount');
            $totalGroups = Group::count();
            $attendancePercentage = Attendance::count();

            

        return view('report', compact('totalMembers', 'totalDonations', 'totalGroups', 'attendancePercentage', 'members', 'events', 'totalDonations', 'donations'));
    }
}


