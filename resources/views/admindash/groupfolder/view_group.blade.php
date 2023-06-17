@extends('admindash.admin')

@section('menu-content')

    <form action="{{ route('groups.update', ['id' => $group->id]) }}" method="POST">
        <input type="text" value="{{ $group->leader_id }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Group Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $group->group_name }}" required>
        </div>

        <div class="form-group">
            <label for="leader">Leader:</label>
            <div class="checkbox">
                @foreach ($users as $user)
                    @php
                        $checked = $group->leader_id == $user->id ? 'checked' : '';
                    @endphp
                    @if ($user->role === 'admin')
                        <label><input type="checkbox" name="leader[]" value="{{ $user->id }}" {{ $checked }}> {{ $user->id }} - {{ $user->name }}</label><br>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="form-group">
            <label for="members">Members:</label>
            <div class="checkbox">
                @foreach ($users as $user)
                    @php
                        $checked = $group->groupMembers && $group->groupMembers->contains('user_id', $user->id) ? 'checked' : '';
                    @endphp
                    <label>
                        <input type="checkbox" name="member[]" value="{{$user->id}}" {{$checked}}>
                        {{$user->id}} - {{$user->name}}
                    </label><br>
                @endforeach
            </div>
        </div>
        
        


        <button type="submit" class="btn btn-primary">Update</button>
    </form>

@endsection
