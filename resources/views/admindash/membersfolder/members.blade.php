@extends('admindash.admin')
@section('menu-content')

<div class="container">
  <h1>Members content</h1>
  
  <div class="row mb-3">
    <div class="col-md-12">
        <form method="GET" action="{{ route('members') }}">
          <div class="btn-group mr-2">
            <input type="search" class="form-control me-2" placeholder="Search..." name="search" value="{{ request('search') }}" id="search-input">

            <button class="btn btn-outline-success" type="submit">Search</button>
          </div>
        </form>
    </div>
  </div>
  
  <div class="row mb-3">
    <div class="col-md-12">
        <div class="float-end">
            {{ $members->links('pagination::bootstrap-4', ['links' => 6]) }}
        </div>
    </div>
  </div>
  
  @if ($noResults)
    <p>No results found for "{{ request('search') }}"</p>
  @else
    <div class="row row-cols-1 row-cols-md-3 g-4">
      @foreach ($members as $member)
        <div class="col">
          <div class="card" style="max-width: 300px;">
            <div class="card-body" style="text-align: center;">
                <div class="profile-icon">
                    <i class="fa fa-user-circle fa-3x" aria-hidden="true"></i>
                </div>
                <hr>
                <h5 class="card-title" style="line-height: ;">
                    {!! str_ireplace(request('search'), '<mark>' . request('search') . '</mark>', $member['name']) !!}
                </h5>
                <p class="card-text" style="line-height: 0.9;">
                    {!! str_ireplace(request('search'), '<mark>' . request('search') . '</mark>', $member['address']) !!}
                </p>
                <p class="card-text" style="line-height: 0.9;">
                    {!! str_ireplace(request('search'), '<mark>' . request('search') . '</mark>', $member['phone_number']) !!}
                </p>
                <p class="card-text" style="line-height: 0.9;">
                    {!! str_ireplace(request('search'), '<mark>' . request('search') . '</mark>', $member['role']) !!}
                </p>
                @if (session('user_role') === 'admin')
                  <!-- Show the delete button only if the user's role is 'admin' -->
                  <form action="{{ route('members.delete', $member->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                @endif
                <a href="{{ route('members.edit', $member->id) }}" class="btn btn-primary">View</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @endif
</div>

<script>
  // Select the search input field
  const searchInput = document.getElementById('search-input');

  // Listen for keyup events on the search input field
  searchInput.addEventListener('keyup', function(event) {
    // Check if the input field is empty
    if (event.target.value === '') {
      // Reload the page without the search parameter
      window.location.href = "{{ route('members') }}";
    }
  });
</script>

@endsection('menu-content')
