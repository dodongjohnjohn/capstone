@extends('admindash.admin')

@section('menu-content')

<form action="{{ route('store.member', ['id' => $group->id]) }}" method="POST">
    @csrf
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        Group Name: {{ $group->group_name }}
                    </div>
                    <div class="card-body">
                        <form action="{{ route('store.member', ['id' => $group->id]) }}" method="POST">
                            @csrf
    
                            <div class="form-group">
                                <input type="hidden" name="group_id" value="{{ $group->id }}">
                            </div>
    
                            <div class="form-group">
                                <label for="leader">Add Member:</label>
                                <div class="checkbox"></div>
                            </div>
    
                            <div class="form-group">
                                <div class="checkbox">
                                    @foreach ($users as $user)
                                        @if ($user->role !== 'admin' && $user->role !== 'manager')
                                            @php
                                                $hasGroup = $group_members->contains('user_id', $user->id);
                                            @endphp
                                            <label>
                                                <input type="checkbox" name="member[]" value="{{ $user->id }}" @if ($hasGroup) disabled @endif>
                                                {{ $user->id }} - {{ $user->name }}
                                                @if ($hasGroup)
                                                    <span class="text-danger">(already have a group)</span>
                                                @endif
                                            </label>
                                            <br>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
    
                            <button type="submit" class="btn btn-primary">Add Members</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    

    <table class="table hide-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Group ID</th>
                <th>Member ID</th>
                <th>Member Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($group_members as $member)
                <tr>
                    <td>{{ $member->id }}</td>
                    <td>{{ $member->group_id }}</td>
                    <td>{{ $member->user_id }}</td>
                    <td>{{ $member->user_name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</form>

<style>
    .hide-table {
        display: none;
    }
</style>


@endsection
