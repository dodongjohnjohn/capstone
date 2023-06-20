@extends('main_user')

@section('group-content')

<h1 class="text-center text-light fw-bold">Groups</h1> 
<hr/>
<div class="col-md-12">
  <div class="mt-1">
    {{ $groups->links('pagination::bootstrap-4', ['links' => 3]) }}
  </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card-group">
            @foreach ($groups as $group)
            <div class="card me-3 group-card">
                <div class="card-body">
                    <h5 class="card-title">{{$group['group_name']}}</h5>
                    <p class="card-text">Leader: {{$group['leader_name']}}</p>
                    <p class="card-text">
                        <strong>Members:</strong>
                        <ul class="list-group">
                            @foreach ($group->groupMembers as $groupMember)
                                <li class="list-group-item">{{ $groupMember->user_name }}</li>
                            @endforeach
                        </ul>
                    </p>
                </div>
                <div class="card-border-right"></div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection('group-content')
