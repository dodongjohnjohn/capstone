@extends('admindash.admin')

@section('menu-content')
    <div class="container">
        <h2>All Groups</h2>

        <div class="row mb-3">
            <div class="col-md-12">
                <a href="{{ route('create.group') }}" class="btn btn-success float-end mb-3">
                    <i class="fa fa-plus"></i> {{ __('Create Group') }}
                </a>
                <div class="btn-group mr-2">
                    <form method="get" action="{{ route('group') }}" class="d-flex">
                        <input class="form-control me-2" type="search" name="search" value="{{ request('search') }}"
                            placeholder="Search groups by name..." aria-label="Search" id="search-input">
                        <button class="btn btn-outline-primary" type="submit">Search</button>
                    </form>
                </div>
            </div>
            <div class="col-md-12">
                <div class="float-end mt-3">
                    {{ $groups->links('pagination::bootstrap-4', ['links' => 6]) }}
                </div>
            </div>
        </div>
        @if ($groups->isEmpty())
            <p>No results found for "{{ request('search') }}"</p>
        @else
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Group Name</th>
                            <th>Leader</th>
                            <th>Members</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($groups as $group)
                            <tr>
                                <td>{!! str_ireplace($search, '<span class="text-warning">' . $search . '</span>', $group->group_name) !!}</td>
                                <td>{{ $group->leader_name }}</td>
                                <td>
                                    <ul class="list-group text-center">
                                        @foreach ($group->groupMembers as $groupMember)
                                            <li class="">{{ $groupMember->user_name }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <a href="{{ route('show.group', ['id' => $group->id]) }}" class="btn btn-primary"><i
                                            class="fa fa-eye"></i></a>
                                    <a href="{{ route('add.member', ['id' => $group->id]) }}" class="btn btn-info"><i
                                            class="fa fa-user-plus"></i></a>
                                    @if(Auth::user()->isAdmin())
                                        <form action="{{ route('delete.group', ['id' => $group->id]) }}" method="POST"
                                            style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this group?')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
    <script>
        // Select the search input field
        const searchInput = document.getElementById('search-input');
      
        // Listen for keyup events on the search input field
        searchInput.addEventListener('keyup', function(group) {
          // Check if the input field is empty
          if (event.target.value === '') {
            // Reload the page without the search parameter
            window.location.href = "{{ route('group') }}";
          }
        });
    </script>
@endsection
