<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MembersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function member(Request $request)
    {
        if (Auth::check()) {
            $query = User::query();

            // Check if search parameter is set
            if ($request->has('search')) {
                $search = $request->input('search');
                $query->where(function($q) use ($search) {
                    $q->where('name', 'LIKE', "%{$search}%")
                      ->orWhere('address', 'LIKE', "%{$search}%")
                      ->orWhere('phone_number', 'LIKE', "%{$search}%")
                      ->orWhere('email', 'LIKE', "%{$search}%");
                });
            }

            $data = $query->paginate(6);
            $noResults = $data->total() == 0;

            return view('admindash.membersfolder.members', ['members' => $data, 'noResults' => $noResults]);
        }
    }

    public function editMember($id)
    {
        $editData = User::find($id);

        return view('admindash.membersfolder.edit_member', compact('editData', 'id'));
    }

    public function updateMember(Request $request, $id)
    {
        $updateData = User::find($id);
        $updateData->name = $request->input('name');
        $updateData->email = $request->input('email');
        $updateData->address = $request->input('address');
        $updateData->phone_number = $request->input('phone_number');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $filename);
            $updateData->image = $filename;
        }

        $updateData->save();
        return redirect('admindash.membersfolder.members')->with('success', 'Member updated successfully.');
    }

    public function deleteMember($id)
    {
        $member = User::find($id);
        if ($member) {
            $member->delete();
            
            return redirect()->back()->with('success', 'Member deleted successfully.');
        }
        return redirect()->back()->with('error', 'Failed to delete member.');
    }
}
