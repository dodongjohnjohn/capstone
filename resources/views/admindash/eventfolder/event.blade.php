@extends('admindash.admin')

@section('menu-content')
<div class="card">
  <div class="container">
    <div><h1>Event content</h1></div>

<div class="row mb-3">
  <div class="col-md-12">
    <a href="{{ route('create')}}" class="btn btn-primary float-end"><i class="fa fa-plus"></i></a>
    <div class="btn-group mr-2">
      <form action="{{ route('event.search') }}" method="GET" class="d-flex">
        <input class="form-control me-2" type="search" name="query" placeholder="Search" aria-label="Search" id="search-input">
        <button class="btn btn-outline-primary" type="submit"><i class="fa fa-search"></i></button>
      </form>
    </div>
  </div>
  
</div>

@php
    $noResults = count($events) == 0;
@endphp

@if ($noResults)
    <p>No results found for "{{ request('query') }}"</p>
@else
<div class="table-responsive">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Organizer</th>
        <th>Topic</th>
        <th>Description</th>
        <th>Venue</th>
        <th>Schedule</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($events as $event)
        <tr>
          <td>{!! str_ireplace(request('query'), '<mark>'.request('query').'</mark>', $event['organizer']) !!}</td>
          <td>{!! str_ireplace(request('query'), '<mark>'.request('query').'</mark>', $event['title']) !!}</td>
          <td>{!! str_ireplace(request('query'), '<mark>'.request('query').'</mark>', $event['description']) !!}</td>
          <td>{!! str_ireplace(request('query'), '<mark>'.request('query').'</mark>', $event['address']) !!}</td>
          <td>{{ $event['time'] }} | {{ $event['date'] }}</td>
          <td>
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}" class="btn btn-primary">Share link</a>
            @if(Auth::user()->isAdmin())
              <form action="{{ route('event.destroy', ['id' => $event->id]) }}" method="POST" style="display: inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this event?')">
                  <i class="fa fa-trash"></i>
                </button>
              </form>
            @endif
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <div class="col-md-12">
    <div class="float-end mt-3">
      {{ $events->links('pagination::bootstrap-5', ['links' => 10]) }}
    </div>
  </div>
</div>
@endif
  </div>
</div>

</div>
<script>
  // Select the search input field
  const searchInput = document.getElementById('search-input');

  // Listen for keyup events on the search input field
  searchInput.addEventListener('keyup', function(event) {
    // Check if the input field is empty
    if (event.target.value === '') {
      // Reload the page without the search parameter
      window.location.href = "{{ route('event.search') }}";
    }
  });
</script>
@endsection('menu-content')
