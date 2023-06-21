@extends('main_user')

@section('group-content')

<h1 class="text-center text-light fw-bold">Groups</h1> 
<hr/>

<div class="container">
    <div class="row">
        @foreach ($groups as $group)
        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{$group['group_name']}}</h5>
                    <p class="card-text">Leader: {{$group['leader_name']}}</p>
                    <p class="card-text flex-grow-1">
                        <strong>Members:</strong>
                        <ul class="list-group overflow-auto">
                            @foreach ($group->groupMembers as $groupMember)
                                <li class="list-group-item">{{ $groupMember->user_name }}</li>
                            @endforeach
                        </ul>
                    </p>
                    {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="col-md-12">
        <div class="mt-1">
          <div class="pagination-container bg-light p-3">
            <ul class="pagination justify-content-start">
              {{ $groups->links('pagination::bootstrap-5') }}
            </ul>
          </div>
        </div>
      </div>       
</div>
@endsection('group-content')

