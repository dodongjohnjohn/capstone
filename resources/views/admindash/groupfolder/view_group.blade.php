@extends('admindash.admin')

@section('menu-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('groups.update', ['id' => $group->id]) }}" method="POST">
                        <input type="hidden" value="{{ $group->leader_id }}">
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
                                    @if ($user->role === 'admin' || $user->role === 'manager')
                                        <label><input type="checkbox" name="leader[]" value="{{ $user->id }}" {{ $checked }}> {{ $user->id }} - {{ $user->name }}</label><br>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="members">Members:</label>
                            <div class="checkbox">
                                @foreach ($users as $user)
                                    @if ($user->role !== 'admin' && $user->role !== 'manager')
                                        @php
                                            $checked = $group->groupMembers && $group->groupMembers->contains('user_id', $user->id) ? 'checked' : '';
                                        @endphp
                                        <label>
                                            <input type="checkbox" name="member[]" value="{{$user->id}}" {{$checked}}>
                                            {{$user->id}} - {{$user->name}}
                                        </label><br>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
