@extends('admindash.admin')
@section('menu-content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>Create Group</h2>
            <form method="POST" action="{{route('submit.group')}}">
                @csrf
                <div class="form-group">
                    <label for="name">Group Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>                    
                <div class="form-group">
                    <label for="leader">Leader:</label>
                    <div class="checkbox">
                        @foreach ($users as $user)
                            @if ($user->role === 'admin')
                                <label><input type="checkbox" name="leader[]" value="{{$user->id}}"> {{$user->id}} - {{$user->name}}</label><br>
                            @endif
                        @endforeach
                    </div>
                </div>
                
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Create</button>
                    <a href="{{ url('/groups') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
    