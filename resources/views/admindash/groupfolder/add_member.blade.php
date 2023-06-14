@extends('admindash.admin')

@section('menu-content')

<form action="{{ route('store.member', ['id' => $group->id]) }}" method="POST">

    @csrf
    <div class="form-group">
        <p>Group Name:{{ $group->group_name }}</p>
    </div>

    <div class="form-group">
        <input type="hidden" name="group_id" value="{{ $group->id }}">
        
    </div>

    <div class="form-group">
        <label for="leader">Add Member:</label>
        <div class="checkbox"> 
        </div>
    </div>

    <div class="form-group">
        <div class="checkbox">
            @foreach ($users as $user)
                @if ($user->role === 'user')
                    <label><input type="checkbox" name="member[]" value="{{ $user->id }}"> {{ $user->id }} - {{ $user->name }}</label><br>
                @endif
            @endforeach
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Add Members</button>

</form>

@endsection
