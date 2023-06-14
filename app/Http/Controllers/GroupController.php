<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Group;
use App\Models\User;
use App\Models\GroupMember;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    function group(Request $request)
{
    if (Auth::check()) {
        $search = $request->input('search');
        $groups = Group::when($search, function ($query, $search) {
            return $query->where('group_name', 'like', '%' . $search . '%')
                         ->orWhere('leader_name', 'like', '%' . $search . '%');
        })->paginate(6);
        return view('admindash.groupfolder.group', compact('groups', 'search'));
    }
}


    public function create()
    {
        $users = User::all();

        return view('admindash.groupfolder.create', compact('users'));
    }
    
    public function store_member(Request $request, $id)
    {
        $group = Group::findOrFail($id);
        $users = User::all();

        
        $selectedMembers = $request->input('member', []);

        foreach ($selectedMembers as $userId) {
            $user = User::findOrFail($userId);

            $groupMember = new GroupMember([
                'group_id' => $group->id,
                'user_id' => $user->id,
                'user_name' => $user->name,
            ]);

            $groupMember->save();
        }
    
        return redirect()->route('group', ['id' => $group->id])->with('success', 'Members added successfully');
    }

    public function store(Request $request)
    { // Validate form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'leader' => 'required|array|min:1',
            'leader.*' => 'integer|exists:users,id',
        ]);
    
        // Get the name of leader
        $leaders = [];
        foreach ($validatedData['leader'] as $leaderId) {
            $leader = User::find($leaderId);
            if ($leader) {
                $leaders[] = $leader->name;
            }
        }
    
        // Create a new Group 
        $group = new Group([
            'group_name' => $validatedData['name'],
            'leader_id' => $validatedData['leader'][0], //  only one leader
            'leader_name' => implode(', ', $leaders),
        ]);
        $group->save();
    
        return back()->with('success', 'Group created successfully.');
    }
    
    
    public function show($id)
    {
        $group = Group::find($id);
        $users = User::all(); 
        return view('admindash.groupfolder.view_group', compact('group', 'users'));
    }
    
    
    public function add_member($id)
    {
        $group = Group::find($id); 
        $users = User::all();
        return view('admindash.groupfolder.add_member', compact('group', 'users'));
    }
    
    public function update(Request $request, $id)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'leader' => 'required|array|min:1',
            'leader.*' => 'integer|exists:users,id',
            'member' => 'array',
            'member.*' => 'integer|exists:users,id',
        ]);
    
        $group = Group::findOrFail($id);
    
        // Update group name
        $group->group_name = $validatedData['name'];
    
        // Update group leader
        $group->leader_id = $validatedData['leader'][0];
    
        // name of leader
        $leader = User::find($group->leader_id);
        if ($leader) {
            $group->leader_name = $leader->name;
        }
    
        $group->save();
    
        // Update group members
        $selectedMembers = $validatedData['member'] ?? [];
    
        $group->groupMembers()->whereNotIn('user_id', $selectedMembers)->delete();
    
        //  new group members
        foreach ($selectedMembers as $userId) {
            $user = User::findOrFail($userId);
    
           
            $existingGroupMember = $group->groupMembers()->where('user_id', $user->id)->first();
    
            if (!$existingGroupMember) {
                $groupMember = new GroupMember([
                    'group_id' => $group->id,
                    'user_id' => $user->id,
                    'user_name' => $user->name,
                ]);
    
                $group->groupMembers()->save($groupMember);
            }
        }
    
        // Retrieve the paginated groups
        $search = $request->input('search', ''); // Define default value for $search
        $groups = Group::when($search, function ($query, $search) {
            return $query->where('group_name', 'like', '%' . $search . '%')
                         ->orWhere('leader_name', 'like', '%' . $search . '%');
        })->paginate(6);
    
        return view('admindash.groupfolder.group', compact('groups', 'search'))->with('success', 'Group updated successfully.');
    }
    
    public function destroy($id)
{
    $group = Group::findOrFail($id);
    
    
        $group->delete();
        return redirect('/group')->with('completed', 'Group has been deleted!');
}

}
